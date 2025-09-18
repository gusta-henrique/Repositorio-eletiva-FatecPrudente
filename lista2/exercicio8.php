<?php

include("cabecalho.php");
?>

<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Informe um número:</label>
        <input type="number" id="numero" name="numero" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numero = $_POST['numero'];

    $contador = 0;

    do {
        if($numero > 1){
            echo "<p>Contagem regressiva: </p>";
            break;
        }
    }
include("rodape.php");
}

?>