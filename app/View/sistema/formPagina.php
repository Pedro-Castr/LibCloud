<?php

use Core\Library\Session;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário Página</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <?php if ($erro = Session::get("msgErro")): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $erro ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
        <?php Session::destroy("msgErro"); ?>
    <?php endif; ?>

    <?php if ($sucesso = Session::get("msgSucesso")): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $sucesso ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
        <?php Session::destroy("msgSucesso"); ?>
    <?php endif; ?>

    <form method="POST" action="<?= baseUrl() ?>Pagina/salvar">
        <input type="hidden" name="slug" value="<?= $_POST['slug'] ?? '' ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $_POST['titulo'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" rows="8" class="form-control"><?= $_POST['conteudo'] ?? '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
