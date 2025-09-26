<?php
include("cabecalho.php");
?>

<form method="post">
<div class="mb-3">
    <label for="palavra" class="form-label">Digite uma palavra: </label>
    <input type="text" id="palavra" name="palavra" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $palavra = $_POST['palavra'];

    function retornaMinusculo($texto) {
        return strtolower($texto);
    }

    function retornaMaiusculo($texto) { // Corrigi o nome da função também
        return strtoupper($texto);
    }

    $minuscula = retornaMinusculo($palavra);
    echo "<p>Minúscula: $minuscula</p>";

    $maiuscula = retornaMaiusculo($palavra);
    echo "<p>Maiúscula: $maiuscula</p>";

    include("rodape.php");
}
?>
