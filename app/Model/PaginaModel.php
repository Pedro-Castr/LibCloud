<?php
namespace App\Model;

use Core\Library\ModelMain;

class PaginaModel extends ModelMain
{
    protected $table = "paginas";

    public function getPaginaBySlug($slug)
    {
        $resultado = $this->db->table($this->table)
            ->where("slug", $slug, "=")
            ->select("*")
            ->findAll();

        return !empty($resultado[0]) ? $resultado[0] : null;
    }
}
