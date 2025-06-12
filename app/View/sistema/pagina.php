<?php if (!empty($pagina)): ?>
    <h1><?= htmlspecialchars($pagina["titulo"]) ?></h1>
    <div><?= $pagina["conteudo"] ?></div>
<?php else: ?>
    <div class="alert alert-danger">Página não encontrada.</div>
<?php endif; ?>
