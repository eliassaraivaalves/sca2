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
        <h2>Ativos</h2>
        <button onclick="abrirModal()" style="padding:10px 15px; cursor:pointer;">
            + Novo Ativo
        </button>
    </div>

    <table border="1" width="100%" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Patrimônio</th>
            <th>Status</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nome']; ?></td>
            <td><?= $row['tipo']; ?></td>
            <td><?= $row['patrimonio']; ?></td>
            <td><?= $row['status']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

<!-- MODAL -->
<div id="modal" style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    text-align:center;
">

    <div style="
        display:inline-block;
        margin-top:100px;
        background:#fff;
        padding:20px;
        width:600px;
        border-radius:8px;
    ">

        <h3>Selecionar Tipo de Ativo</h3>

        <div style="margin-top:20px;">

            <div onclick="selecionarTipo('computador')" style="display:inline-block;width:30%;margin:1%;padding:20px;background:#eee;cursor:pointer;">
                💻<br>Computador
            </div>

            <div onclick="selecionarTipo('impressora')" style="display:inline-block;width:30%;margin:1%;padding:20px;background:#eee;cursor:pointer;">
                🖨️<br>Impressora
            </div>

            <div onclick="selecionarTipo('telefone')" style="display:inline-block;width:30%;margin:1%;padding:20px;background:#eee;cursor:pointer;">
                📱<br>Telefone
            </div>

            <div onclick="selecionarTipo('switch')" style="display:inline-block;width:30%;margin:1%;padding:20px;background:#eee;cursor:pointer;">
                🔌<br>Switch
            </div>

            <div onclick="selecionarTipo('access point')" style="display:inline-block;width:30%;margin:1%;padding:20px;background:#eee;cursor:pointer;">
                📡<br>Access Point
            </div>

        </div>

    </div>
</div>

<script>
function abrirModal() {
    document.getElementById("modal").style.display = "block";
}

function selecionarTipo(tipo) {
    alert("Selecionado: " + tipo);
}

window.onclick = function(event) {
    const modal = document.getElementById("modal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
</script>

<?php include("layout/footer.php"); ?>