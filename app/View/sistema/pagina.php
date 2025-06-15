<?php if (!empty($dados)): ?>
    <h1><?= htmlspecialchars($dados["titulo"]) ?></h1>
    <div><?= $dados["conteudo"] ?></div>
<?php else: ?>
    <div class="alert alert-danger">Página não encontrada.</div>
<?php endif; ?>
