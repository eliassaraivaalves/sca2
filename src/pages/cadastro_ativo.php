<?php
include("layout/header.php");
include("../../config/database.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../public/index.php");
    exit;
}
?>

<div class="main"> <!-- mantém a área da lateral direita -->

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
                    <option value="computador">Computador</option>
                    <option value="impressora">Impressora</option>
                    <option value="telefone">Telefone</option>
                    <option value="switch">Switch</option>
                    <option value="access point">Access Point</option>
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

</div> <!-- fecha .main -->

<?php include("layout/footer.php"); ?>