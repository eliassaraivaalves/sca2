<?php
include("layout/header.php");
include("../../config/database.php");

$busca = "";

$sql = "SELECT * FROM ativos ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Erro SQL: " . $conn->error);
}
?>

<div class="card">

    <!-- HEADER DO CARD -->
    <div class="card-header">

        <form method="GET" class="busca-form">
            <input type="text" name="busca" placeholder="Buscar ativo...">
        </form>

        <button class="btn-primary" onclick="abrirModal()">
            + Novo Ativo
        </button>

    </div>

    <!-- TABELA -->
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
                💻<br>Computador
            </div>

            <div class="tipo-item" onclick="selecionarTipo('impressora')">
                🖨️<br>Impressora
            </div>

            <div class="tipo-item" onclick="selecionarTipo('telefone')">
                📱<br>Telefone
            </div>

            <div class="tipo-item" onclick="selecionarTipo('switch')">
                🔌<br>Switch
            </div>

            <div class="tipo-item" onclick="selecionarTipo('access point')">
                📡<br>Access Point
            </div>

        </div>

    </div>
</div>

<script>
function abrirModal() {
    document.getElementById("modal").style.display = "flex";
}

function selecionarTipo(tipo) {
    alert("Você escolheu: " + tipo);

    // Próximo passo: abrir formulário específico
    // exemplo:
    // window.location.href = "cadastro_" + tipo + ".php";
}
</script>

<script>
function abrirModal() {
    document.getElementById("modal").style.display = "flex";
}
</script>

<?php include("layout/footer.php"); ?>