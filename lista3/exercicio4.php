<?php
include("cabecalho.php");
?>

<form method="post">
    <div class="mb-3">
        <label for="dia" class="form-label">Informe dia:</label>
        <input type="number" id="dia" name="dia" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="mes" class="form-label">Informe mês:</label>
        <input type="number" id="mes" name="mes" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">Informe ano:</label>
        <input type="number" id="ano" name="ano" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];

    if ($dia < 1 || $dia > 31 || $mes < 1 || $mes > 12 || $ano < 1) {
        echo "<p>Data inválida</p>";
    } else {
        echo "<p>$dia/$mes/$ano</p>";
    }
}

include("rodape.php");
?>
