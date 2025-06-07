<?php

namespace App\Model;

use Core\Library\ModelMain;

class LivroModel extends ModelMain
{
    protected $table = "livros";

    public $validationRules = [
        "titulo"  => [
            "label" => 'Titulo',
            "rules" => 'required|min:3|max:255'
        ],
        "editora"  => [
            "label" => 'Editora',
            "rules" => 'required|min:5|max:100'
        ],
        "ano_publicacao" => [
            "label" => 'Ano publicação',
            "rules" => 'required|min:4|max:4'
        ],
    ];
}