<?php
include("layout/header.php");
include("../../config/database.php");

$sql = "SELECT * FROM ativos ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Erro SQL: " . $conn->error);
}
?>

<div class="card">

    <div class="card-header">

        <form method="GET" class="busca-form">
            <input type="text" name="busca" placeholder="Buscar ativo...">
        </form>

        <button class="btn-primary" onclick="abrirModal()">
            + Novo Ativo
        </button>

    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Patrimônio</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['patrimonio']; ?></td>

                <td>
                    <span class="status <?php echo strtolower($row['status']); ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </td>

                <td>
                    <button class="btn-acao">✏️</button>
                    <button class="btn-acao delete">🗑️</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

<!-- MODAL -->
<div id="modal" class="modal">
    <div class="modal-box">

        <h3>Selecionar Tipo de Ativo</h3>

        <div class="tipo-grid">

            <div class="tipo-item" onclick="selecionarTipo('computador')">
                💻
                <span>Computador</span>
            </div>

            <div class="tipo-item" onclick="selecionarTipo('impressora')">
                🖨️
                <span>Impressora</span>
            </div>

            <div class="tipo-item" onclick="selecionarTipo('telefone')">
                📱
                <span>Telefone</span>
            </div>

            <div class="tipo-item" onclick="selecionarTipo('switch')">
                🔌
                <span>Switch</span>
            </div>

            <div class="tipo-item" onclick="selecionarTipo('access point')">
                📡
                <span>Access Point</span>
            </div>

        </div>

    </div>
</div>

<script>
function abrirModal() {
    document.getElementById("modal").style.display = "flex";
}

function selecionarTipo(tipo) {
    alert("Selecionado: " + tipo);
}

window.onclick = function(event) {
    const modal = document.getElementById("modal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php include("layout/footer.php"); ?>