<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário Livro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= baseUrl() ?>assets/css/formCurriculo.css" rel="stylesheet">
</head>
<body>

    <div class="container my-5" >
        <?= formTitulo("📄 Livors") ?>

        <div class="m-2">
            <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" maxlength="250" placeholder="Titulo do livro" value="<?= setValor("titulo") ?>" required autofocus>
                        <?= setMsgFilderError("titulo") ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" maxlength="20" placeholder="Código numerico" value="<?= setValor("isbn") ?>" required>
                        <?= setMsgFilderError("isbn") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="editora" class="form-label">Editora</label>
                        <input type="text" class="form-control" id="editora" name="editora" maxlength="20" value="<?= setValor("editora") ?>" required>
                        <?= setMsgFilderError("editora") ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="edicao" class="form-label">Edição</label>
                        <input type="text" class="form-control" id="edicao" name="edicao" maxlength="50" value="<?= setValor("edicao") ?>" required>
                        <?= setMsgFilderError("edicao") ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="ano_publicacao" class="form-label">Ano Publicação</label>
                        <input type="text" class="form-control" id="ano_publicacao" name="ano_publicacao" maxlength="4" value="<?= setValor("ano_publicacao") ?>" required>
                        <?= setMsgFilderError("ano_publicacao") ?>
                    </div>
                </div>

                <div class="row">
                    <div class="row">
                        <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>
                            <div class="mb-3 col-12">
                                <label for="foto" class="form-label">Capa Do Livro</label>
                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Anexar a Imagem" maxlength="250" value="<?= setValor('foto') ?>">
                                <?= setMsgFilderError('foto') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty(setValor("foto"))): ?>
                            <div class="mb-3 col-12">
                                <h5>Imagem</h5>
                                <img src="<?= baseUrl() . 'imagem.php?file=livros/' . setValor("foto") ?>" class="img-thumbnail" height="120" width="240" alt="Imagem foto">
                                <input type="hidden" name="nomeImagem" id="nomeImagem" value="<?= setValor("foto") ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="mt-4">
                    <?= formButton() ?>
                </div>

            </form>
        </div>
    </div>
            
</div>
