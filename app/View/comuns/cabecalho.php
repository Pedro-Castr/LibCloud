<?php

use Core\Library\Session;

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= baseUrl() ?>assets/img/libcloud.png" rel="icon" type="image/png">
        <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>LibCloud</title>
        <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg border-bottom py-3">
                <a class="navbar-brand d-flex align-items-center" href="<?= baseUrl() ?>">
                    <img class="login-img" src="/assets/img/libcloud-logo.png" alt="" height="75">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                    <ul class="navbar-nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= baseUrl() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= baseUrl() ?>Livro" class="nav-link">Cadastrar Um Livro</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Sobre</a>
                        </li>

                        <?php if (Session::get("userId")): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuário
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                                    <?php if ((int)Session::get("userNivel") <= 20): ?>
                                        <li><a class="dropdown-item" href="<?= baseUrl() ?>usuario">Usuário</a></li>
                                    <?php endif; ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar a Senha</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>uf">UF's</a></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>cidade">Cidade</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= baseUrl() ?>Login">Área restrita</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
</div>
        <main class="container">