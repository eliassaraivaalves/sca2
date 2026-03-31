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