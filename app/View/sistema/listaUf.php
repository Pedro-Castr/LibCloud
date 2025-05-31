<?= formTitulo("Lista UF", true) ?>

<?php if (count($aDados) > 0): ?>

    <div class="m-2">

        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aDados as $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id'] ?></th>
                        <td><?= $value['sigla'] ?></td>
                        <td><?= $value['descricao'] ?></td>
                        <td>
                            <a href="<?= baseUrl() ?>Uf/form/view/<?= $value['id'] ?>" title="Visualizar" class="btn btn-sm btn-primary text-white">Visualizar</a>
                            <a href="<?= baseUrl() ?>Uf/form/update/<?= $value['id'] ?>" title="Alterar" class="btn btn-sm btn-warning text-white">Alterar</a>
                            <a href="<?= baseUrl() ?>Uf/form/delete/<?= $value['id'] ?>" title="Excluir" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

<?php else: ?>

    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>

<?php endif; ?>