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

    <div class="container my-5">
        <div class="row row-cols-1 g-4">
            <?php foreach ($dados as $value): ?>
                <div class="col" data-aos="fade-up">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h4 class="card-title mb-3">
                                <?= htmlspecialchars($value['titulo']) ?>, <?= htmlspecialchars($value['isbn']) ?>
                            </h4>
                            <h4 class="card-title mb-3">
                                <?= htmlspecialchars($value['numeroPatrimonio']) ?> 
                            </h4>
                            <h4 class="card-title mb-3">
                                <?= htmlspecialchars($value['estadoConservacao'] == 1 ? 'Novo' : ($value['estadoConservacao'] == 2 ? 'Semi Novo' : 'Velho') ) ?> 
                            </h4>
                             <h4 class="card-title mb-3">
                                <?= htmlspecialchars($value['localizacaoEstante']) ?> 
                            </h4>
                            <h6 class="text-muted mb-3"><?= htmlspecialchars($value['editora']) ?> - EDIÇÃO: <?= htmlspecialchars($value['edicao']) ?></h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>ANO PUBLICAÇÃO:</strong> <?= htmlspecialchars($value['ano_publicacao']) ?></p>
                                </div>
                                 <div class="col-md-6">
                                    <p><strong>CAPA:</strong> <img src="<?= baseUrl() . 'imagem.php?file=livros/' . $value['foto'] ?>" class="img-thumbnail" height="120" width="240" alt="Imagem Curriculo"></p>
                                </div>
                            </div>
                           
                        </div>

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
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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
