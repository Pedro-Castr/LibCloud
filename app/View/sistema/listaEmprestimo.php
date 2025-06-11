<?php use Core\Library\Session; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empréstimos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <?= formTitulo("📚 Empréstimos Realizados") ?>

    <?php if (!empty($dados)): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <?php if ((int)Session::get("userNivel") == 1): ?>
                    <th>Usuário</th>
                    <?php endif; ?>
                    <th>Livro</th>
                    <th>Data Empréstimo</th>
                    <th>Data Prevista</th>
                    <th>Data Devolução</th>
                    <th>Multa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $item): ?>
                    <tr>
                        <?php if ((int)Session::get("userNivel") == 1): ?>
                        <td><?= htmlspecialchars($item['usuario_nome']) ?></td>
                        <?php endif; ?>
                        <td><?= htmlspecialchars($item['livro_titulo']) ?></td>
                        <td><?= date('d/m/Y', strtotime($item['data_emprestimo'])) ?></td>
                        <td><?= date('d/m/Y', strtotime($item['data_prevista_devolucao'])) ?></td>
                        <td>
                            <?= $item['data_devolucao'] ? date('d/m/Y', strtotime($item['data_devolucao'])) : '<span class="text-danger">Em aberto</span>' ?>
                        </td>
                        <td>R$ <?= number_format($item['multa'], 2, ',', '.') ?></td>
                        <td>
                            <?php if (!$item['data_devolucao']): ?>
                                <a href="<?= baseUrl() ?>Emprestimo/devolver/<?= $item['id'] ?>" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i> Devolver
                                </a>
                            <?php else: ?>
                                <span class="text-muted">Finalizado</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Nenhum empréstimo encontrado.</div>
    <?php endif; ?>
</div>

</body>
</html>
