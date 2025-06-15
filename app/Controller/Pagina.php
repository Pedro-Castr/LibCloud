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
     * Exibe a página pública (como sobre-nos, contato)
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
        $pagina = $this->model->db->table("paginas")
            ->where("slug", $slug, "=")
            ->select("*")
            ->findAll();

        if (empty($pagina[0])) {
            return Redirect::page("Home", "index", [], ["msgErro" => "Página não encontrada."]);
        }

        return $this->loadView("sistema/formPagina", ["pagina" => $pagina[0]]);
    }

    /**
     * Salva alterações da página institucional
     */
    public function salvar()
    {
        $post = $this->request->getPost();

        $this->model->db->table("paginas")
            ->where("slug", $post["slug"], "=")
            ->update([
                "titulo" => $post["titulo"],
                "conteudo" => $post["conteudo"],
                "ultima_atualizacao" => date("Y-m-d H:i:s")
            ]);

        return Redirect::page("Pagina", "form", [$post["slug"]], ["msgSucesso" => "Página atualizada com sucesso!"]);
    }
}
