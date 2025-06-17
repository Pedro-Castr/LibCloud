<?php

use Core\Library\Session;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/listaCurriculo.css" rel="stylesheet">
</head>
<body>
    <?= formTitulo("📄 Lista De Livros", (int)Session::get("userNivel") <= 20 ? true : false) ?>

    <div class="d-flex flex-wrap gap-3 my-5">
        <?php foreach ($dados as $value): ?>
            <div class="card" style="width: 100%; max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= baseUrl() . 'imagem.php?file=livros/' . $value['foto'] ?>" class="img-fluid rounded-start" alt="Capa do Livro">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($value['titulo']) ?></h5>
                            <p class="card-text"><strong>Autor(a)</strong>: <?= htmlspecialchars($value['autor']) ?> | <strong>Editora:</strong> <?= htmlspecialchars($value['editora']) ?></p>
                            <p class="card-text"><small><strong>Ano de Publicação:</strong> <?= htmlspecialchars($value['ano_publicacao']) ?></small></p>

                            <?php if ((int)Session::get("userNivel") <= 20): ?>
                                <div class="mt-3 text-end">
                                    <a href="<?= baseUrl() ?>Livro/form/view/<?= $value['id'] ?>" class="btn btn-outline-primary btn-sm me-2">
                                        <i class="bi bi-eye"></i> Visualizar
                                    </a>
                                    <a href="<?= baseUrl() ?>Livro/form/update/<?= $value['id'] ?>" class="btn btn-outline-warning btn-sm me-2">
                                        <i class="bi bi-pencil-square"></i> Alterar
                                    </a>
                                    <a href="<?= baseUrl() ?>Livro/form/delete/<?= $value['id'] ?>" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Excluir
                                    </a>
                                </div>
                            <?php else: ?>
                                <a href="<?= baseUrl() ?>Livro/form/view/<?= $value['id'] ?>" class="btn btn-outline-primary btn-sm me-2">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
