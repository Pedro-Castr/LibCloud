<?php

namespace App\Model;

use Core\Library\ModelMain;
use DateTime;
use DateInterval;
use DatePeriod;

class EmprestimoModel extends ModelMain
{
    protected $table = "emprestimos";

    public $validationRules = [
        "usuario_id" => [
            "label" => 'Usuário',
            "rules" => 'required|int'
        ],
        "livro_id" => [
            "label" => 'Livro',
            "rules" => 'required|int'
        ]
    ];

    public function criarEmprestimo($post)
    {
        $usuario = $this->db->table("usuario")->where("id", $post['usuario_id'])->first();
        if (!$usuario) {
            return ["success" => false, "msg" => "Usuário não encontrado."];
        }

        $tipo = $usuario['tipo'];
        $limite = $tipo == 1 ? 3 : 5;
        $prazo = $tipo == 1 ? 7 : 15;

        $emAberto = $this->db->table("emprestimos")
            ->where("usuario_id", $post['usuario_id'])
            ->whereNull("data_devolucao")
            ->count();

        if ($emAberto >= $limite) {
            return ["success" => false, "msg" => "Limite de empréstimos excedido."];
        }

        $data_emprestimo = date('Y-m-d');
        $data_prevista = date('Y-m-d', strtotime("+$prazo weekdays"));

        $insert = $this->db->table($this->table)->insert([
            "usuario_id" => $post['usuario_id'],
            "livro_id" => $post['livro_id'],
            "data_emprestimo" => $data_emprestimo,
            "data_prevista_devolucao" => $data_prevista
        ]);

        if (!$insert) {
            return ["success" => false, "msg" => "Erro ao registrar no banco de dados."];
        }

        return ["success" => true, "msg" => "Empréstimo registrado com sucesso!"];
    }


    public function registrarDevolucao($id)
    {
        $emprestimo = $this->db->table($this->table)->where("id", $id)->first();
        if (!$emprestimo) return "Empréstimo não encontrado.";

        $hoje = date('Y-m-d');
        $multa = $this->calcularMulta($emprestimo['data_prevista_devolucao'], $hoje);

        $this->db->table($this->table)->where("id", $id)->update([
            "data_devolucao" => $hoje,
            "multa" => $multa
        ]);

        return "Devolução registrada com multa de R$" . number_format($multa, 2, ',', '.');
    }

    private function calcularMulta($dataPrevista, $dataReal)
    {
        $start = new DateTime($dataPrevista);
        $end = new DateTime($dataReal);
        if ($end <= $start) return 0.00;

        $interval = new DateInterval('P1D');
        $period = new DatePeriod($start, $interval, $end->modify('+1 day'));

        $diasUteis = 0;
        foreach ($period as $data) {
            if (!in_array($data->format('N'), [6, 7])) {
                $diasUteis++;
            }
        }

        return $diasUteis > 0 ? $diasUteis * 1.00 : 0.00;
    }

    public function listaCompleta()
    {
        return $this->db
            ->table("emprestimos e")
            ->select("e.*, u.nome as usuario_nome, l.titulo as livro_titulo")
            ->join("usuario u", "u.id = e.usuario_id")
            ->join("livros l", "l.id = e.livro_id")
            ->orderBy("e.data_emprestimo", "desc")
            ->findAll();
    }

    public function getById($id)
    {
        return $this->db->table($this->table)->where("id", $id)->first();
    }
}
