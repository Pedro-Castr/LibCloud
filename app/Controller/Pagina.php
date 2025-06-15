<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use App\Model\PaginaModel;
use Core\Library\Validator;
use Core\Library\Session;

class Pagina extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarconstruct();
    }

    /**
     * Exibe página pública (como sobre-nos, contato)
     */
    public function exibir($slug)
    {
        $dados = $this->model->getPaginaBySlug($slug);

        if (!$dados) {
            return Redirect::page("Home", "index", [], ["msgErro" => "Página não encontrada."]);
        }

        return $this->loadView("sistema/pagina", $dados);
    }

    /**
     * Formulário administrativo para editar página
     */
    public function form($slug)
    {
        $dados = $this->model->getPaginaBySlug($slug);

        if (!$dados) {
            return Redirect::page("Home", "index", [], ["msgErro" => "Página não encontrada."]);
        }

        return $this->loadView("sistema/formPagina", $dados);
    }

    /**
     * Salva alterações da página institucional
     */
    public function salvar()
{
    $post = $this->request->getPost();

    // Validação básica dos campos obrigatórios
    if (empty($post["slug"]) || empty($post["titulo"]) || empty($post["conteudo"])) {
        return Redirect::page("Pagina/form/" . $post["slug"], ["msgErro" => "Todos os campos são obrigatórios."]);
    }

    // Verifica se a página existe
    $pagina = $this->model->db->table("paginas")
        ->where("slug", $post["slug"], "=")
        ->first();

    if (!$pagina) {
        return Redirect::page("Pagina/form/" . $post["slug"], ["msgErro" => "Página não encontrada para atualizar."]);
    }

    // Atualiza o conteúdo da página
    $this->model->db->table("paginas")
        ->where("slug", $post["slug"], "=")
        ->update([
            "titulo" => $post["titulo"],
            "conteudo" => $post["conteudo"],
            "ultima_atualizacao" => date("Y-m-d H:i:s")
        ]);

    return Redirect::page("Pagina/form/" . $post["slug"], ["msgSucesso" => "Página atualizada com sucesso!"]);
}

}
