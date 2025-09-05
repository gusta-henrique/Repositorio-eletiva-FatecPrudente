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

    if ($numero > 0) {
        $soma = 0;
        $i = 1;

        while ($i <= $numero) {
            $soma += $i;
            $i++;
        }
        echo "<p>A soma dos números de 1 até $numero é: $soma</p>";
    } else {
        echo "<p>Por favor, insira um número maior que 0.</p>";
    }
include("rodape.php");
}

?>