<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<?= formTitulo('Usuário') ?>

<form method="POST" action="<?= $this->request->formAction() ?>">

    <input type="hidden" name="id" id="id" value="<?= setValor('id') ?>">

    <div class="row m-2">

        <div class="mb-3 col-8">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Usuário" value="<?= setValor('nome') ?>" required autofocus>
            <?= setMsgFilderError('nome') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF do Usuário" value="<?= setValor('cpf') ?>" required autofocus>
            <?= setMsgFilderError('cpf') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="nivel" class="form-label">Nível</label>
            <select class="form-select" name="nivel" id="nivel" aria-label="Large select nivel" required>
                <option value="1"  <?= (setValor('nivel') == "1"  ? 'selected': "") ?>>Super Administrador</option>
                <option value="11" <?= (setValor('nivel') == "11" ? 'selected': "") ?>>Administrador</option>
                <option value="21" <?= (setValor('nivel') == "21" ? 'selected': "") ?>>Usuário</option>
            </select>
            <?= setMsgFilderError('tipo') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="email" class="form-label">Email Institucional</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email do Usuário" value="<?= setValor('email') ?>" required>
            <?= setMsgFilderError('email') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="curso" class="form-label">Curso ou Departamento</label>
            <input type="curso" class="form-control" id="curso" name="curso" placeholder="Curso do Usuário" value="<?= setValor('curso') ?>" required>
            <?= setMsgFilderError('curso') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matrícula do Usuário" value="<?= setValor('matricula') ?>" required>
            <?= setMsgFilderError('matricula') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select" name="tipo" id="tipo" aria-label="Large select tipo" required>
                <option value="0" <?= (setValor('tipo') == ""  ? 'selected': "") ?>>...</option>
                <option value="1" <?= (setValor('tipo') == "1" ? 'selected': "") ?>>Aluno</option>
                <option value="2" <?= (setValor('tipo') == "2" ? 'selected': "") ?>>Professor</option>
            </select>
            <?= setMsgFilderError('tipo') ?>
        </div>

        <div class="mb-3 col-4">
            <label for="statusRegistro" class="form-label">Status</label>
            <select class="form-select" name="statusRegistro" id="statusRegistro" aria-label="Large select statusRegistro" required>
                <option value="0" <?= (setValor('statusRegistro') == ""  ? 'selected': "") ?>>...</option>
                <option value="1" <?= (setValor('statusRegistro') == "1" ? 'selected': "") ?>>Ativo</option>
                <option value="2" <?= (setValor('statusRegistro') == "2" ? 'selected': "") ?>>Inativo</option>
            </select>
            <?= setMsgFilderError('statusRegistro') ?>
        </div>

        <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>

            <div class="mb-3 col-6">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" 
                    placeholder="Crie uma Nova Senha"
                    onkeyup="checa_segur_senha('senha', 'msgSenha', 'btEnviar');"
                    <?= ($this->request->getAction() == "insert" ? 'required' : '') ?>>
                <div id="msgSenha" class="mt-3"></div>
                <?= setMsgFilderError('senha') ?>
            </div>

            <div class="mb-3 col-6">
                <label for="confSenha" class="form-label">Confirma a Senha</label>
                <input type="password" class="form-control" id="confSenha" name="confSenha" 
                    placeholder="Repita a Nova Senha"
                    onkeyup="checa_segur_senha('confSenha', 'msgConfSenha', 'btEnviar');"
                    <?= ($this->request->getAction() == "insert" ? 'required' : '') ?>>
                <div id="msgConfSenha" class="mt-3"></div>
                <?= setMsgFilderError('confSenha') ?>
            </div>
        <?php endif; ?>

    </div>

    <div class="m-3">
        <?= formButton() ?>
    </div>

</form>
