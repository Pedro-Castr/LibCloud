<?php

namespace App\Model;

use Core\Library\ModelMain;

class LivroModel extends ModelMain
{
    protected $table = "livros";

    public $validationRules = [
        "titulo"  => [
            "label" => 'Título',
            "rules" => 'required|min:3|max:255'
        ],
        "editora"  => [
            "label" => 'Editora',
            "rules" => 'required|min:5|max:100'
        ],
        "ano_publicacao" => [
            "label" => 'Ano de publicação',
            "rules" => 'required|min:4|max:4|int'
        ],
        "isbn"  => [
            "label" => 'ISBN',
            "rules" => 'required|min:3|max:20|int'
        ],
        "edicao"  => [
            "label" => 'Edição',
            "rules" => 'required|min:5|max:100'
        ],
        "autor" => [
            "label" => 'Autor',
            "rules" => 'required|min:4|max:100'
        ],
        "numeroPatrimonio" => [
            "label" => 'Número de Patrimônio',
            "rules" => 'required|min:4|max:10|int'
        ],
        "localizacaoEstante" => [
            "label" => 'Localização na Estante',
            "rules" => 'required|min:4|max:100'
        ],
    ];
}