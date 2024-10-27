<?php
include '../layout/head.php';
?>
<?php
include '../layout/cabecalho.php';
?>
<h1>Solicitação da Sala de Estudos</h1>
<form class="formulario" action="../bd/processar_reserva.php" method="POST">
    <label for="selecionar_sala">Escolha uma sala:</label>
    <select id="selecionar_sala" name="selecionar_sala" required>
        <option value="">Selecione...</option>
        <option value="1">Sala 01</option>
        <option value="2">Sala 02</option>
    </select>

    <label for="matricula">Matrícula do responsável:</label>
    <input type="text" name="matricula" required>

    <label for="participantes">Número total de pessoas:</label>
    <select id="numeroPessoas" name="numeroPessoas" onchange="gerarCampos()" required>
        <option value="">Selecione</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>

    <div id="camposIntegrantes"></div>

    <label for="data_reserva">Data da Reserva:</label>
    <input type="date" name="data_reserva" required>

    <label for="hora_inicio">Hora de Início:</label>
    <input type="time" name="horario_inicio" required>


    <button type="submit">Reservar</button>
</form>
<script>
    function gerarCampos() {
        const numeroPessoas = document.getElementById('numeroPessoas').value;
        const camposIntegrantes = document.getElementById('camposIntegrantes');
        camposIntegrantes.innerHTML = '';
        if (numeroPessoas >= 3 && numeroPessoas <= 6) {
            for (let i = 2; i <= numeroPessoas; i++) {
                const label = document.createElement('label');
                label.textContent = `Matrícula do integrante ${i}: `;
                const input = document.createElement('input');
                input.type = 'text';
                input.name = `matricula_integrante_${i}`;
                input.placeholder = `Digite a matrícula do integrante ${i}`;
                input.required = true;
                camposIntegrantes.appendChild(label);
                camposIntegrantes.appendChild(input);
                camposIntegrantes.appendChild(document.createElement('br'));
            }
        } else {
            alert('O número de pessoas deve ser entre 3 e 6.');
        }
    }
</script>
<?php
include '../layout/footer.php';
?>
</body>

</html>