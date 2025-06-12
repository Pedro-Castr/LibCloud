<form method="POST" action="<?= baseUrl() ?>Pagina/salvar">
    <input type="hidden" name="slug" value="<?= $pagina['slug'] ?>">
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="<?= $pagina['titulo'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Conteúdo</label>
        <textarea name="conteudo" rows="8" class="form-control"><?= $pagina['conteudo'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
