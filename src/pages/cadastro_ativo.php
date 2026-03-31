<?php
include("layout/header.php");
include("../../config/database.php");

$tipoSelecionado = isset($_GET['tipo']) ? $_GET['tipo'] : '';
?>

<div class="card">
    <h2>Cadastro de Ativo</h2>

    <form action="../actions/salvar_ativo.php" method="POST" class="form-cadastro" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

        <div style="grid-column: span 2;">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do ativo" required>
        </div>

        <div>
            <label>Tipo:</label>
            <select name="tipo" required>
                <option value="">Selecione</option>
                <option value="computador" <?php if($tipoSelecionado=='computador') echo 'selected'; ?>>Computador</option>
                <option value="impressora" <?php if($tipoSelecionado=='impressora') echo 'selected'; ?>>Impressora</option>
                <option value="telefone" <?php if($tipoSelecionado=='telefone') echo 'selected'; ?>>Telefone</option>
                <option value="switch" <?php if($tipoSelecionado=='switch') echo 'selected'; ?>>Switch</option>
                <option value="access point" <?php if($tipoSelecionado=='access point') echo 'selected'; ?>>Access Point</option>
            </select>
        </div>

        <div>
            <label>Status:</label>
            <select name="status" required>
                <option value="">Selecione</option>
                <option value="ativo">Ativo</option>
                <option value="manutenção">Manutenção</option>
                <option value="baixado">Baixado</option>
            </select>
        </div>

        <div style="grid-column: span 2;">
            <label>Patrimônio:</label>
            <input type="text" name="patrimonio" placeholder="Digite o patrimônio" required>
        </div>

        <div style="grid-column: span 2; display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn-primary">Salvar</button>
            <a href="ativos.php" class="btn-acao">Cancelar</a>
        </div>

    </form>
</div>

<?php include("layout/footer.php"); ?>