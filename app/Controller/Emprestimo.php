<?php

namespace App\Controller;

use App\Model\EmprestimoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;
use Core\Library\Session;

class Emprestimo extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    /**
     * Lista todos os empréstimos
     */
    public function index()
    {
        $userId = Session::get("userId");
        $userNivel = Session::get("userNivel");

        if ((int)$userNivel === 1) {
            // Admin vê todos os empréstimos
            $dados = $this->model->listaCompleta();
        } else {
            // Usuário comum vê só os dele
            $dados = $this->model->listaPorUsuario($userId);
        }

        return $this->loadView("sistema/listaEmprestimo", $dados);
    }



    /**
     * Exibe o formulário de empréstimo
     */
    public function form($action, $id)
    {
        $dados = [
            "data" => $this->model->getById($id),
        ];
        return $this->loadView("sistema/formEmprestimo", $dados);
    }

    /**
     * Realiza um novo empréstimo
     */
    public function insert()
{
    $post = $this->request->getPost();

    if (Validator::make($post, $this->model->validationRules)) {
        return Redirect::page("Livro/form/view/" . $post["livro_id"], ["msgErro" => "Dados inválidos."]);
    }

    // Pegar usuário
    $usuario = $this->model->db->table("usuario")->where("id", $post['usuario_id'])->first();
    if (!$usuario) {
        return Redirect::page("Livro/form/view/" . $post["livro_id"], ["msgErro" => "Usuário não encontrado."]);
    }

    // Lógica de regra por tipo
    $tipo = $usuario['tipo'];
    $limite = $tipo == 1 ? 3 : 5;
    $prazo = $tipo == 1 ? 7 : 15;

    // Verificar empréstimos em aberto
    $this->model->db->dbClear();
    $lista = $this->model->db->table("emprestimos")
    ->where("usuario_id", (int)$post['usuario_id'] , "=")
    ->select("*")
    ->findAll();

    $emAberto = 0;
    $livroDuplicado = false;

    foreach ($lista as $linha) {
    
        $dataDev = $linha["data_devolucao"];
        
        
        $estaEmAberto = is_null($dataDev) || $dataDev === '0000-00-00' || $dataDev === '';

        if ($estaEmAberto) {
            $emAberto++;

            if ((int)$linha["livro_id"] === (int)$post["livro_id"]) {
                $livroDuplicado = true;
            }
        }
    }
  

    if ($livroDuplicado) {
    return Redirect::page("Livro/form/view/" . $post["livro_id"], ["msgErro" => "Você já possui esse livro emprestado e ainda não devolveu."]);
    }

    if ($emAberto >= $limite) {
        return Redirect::page("Livro/form/view/" . $post["livro_id"], ["msgErro" => "Limite de empréstimos excedido."]);
    }

    // Datas
    $data_emprestimo = date('Y-m-d');
    $data_prevista = (new \DateTime())->modify("+{$prazo} days")->format('Y-m-d');



    // Inserção
    $insert = $this->model->db->table("emprestimos")->insert([
        "usuario_id" => $post["usuario_id"],
        "livro_id" => $post["livro_id"],
        "data_emprestimo" => $data_emprestimo,
        "data_prevista_devolucao" => $data_prevista
    ]);

    if (!$insert) {
        return Redirect::page("Livro/form/view/" . $post["livro_id"], ["msgErro" => "Erro ao registrar empréstimo."]);
    }

    return Redirect::page($this->controller, ["msgSucesso" => "Empréstimo registrado com sucesso!"]);
}



    /**
     * Registra a devolução de um livro
     */
    public function devolver()
    {
        $post = $this->request->getPost();

        if (!isset($post['id'])) {
            return Redirect::page($this->controller, ["msgErro" => "ID do empréstimo não informado."]);
        }

        $resultado = $this->model->registrarDevolucao($post['id']);
        return Redirect::page($this->controller, ["msgSucesso" => $resultado]);
    }

    /**
     * Exclui um empréstimo
     */
    public function delete()
    {
        $post = $this->request->getPost();

        if ($this->model->delete($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Empréstimo excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
