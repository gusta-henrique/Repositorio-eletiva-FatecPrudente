<!-- Crie um formulário para que o usuário informe um número. Use um loop -->
<!-- for para calcular o fatorial desse número e exibir o resultado. -->

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


    $resultado = 1;
    for ($i = $numero; $i > 1; $i--) {
    $resultado = $resultado * $i;
    }

echo "<p>O fatorial de $numero é: $resultado </p>";

include("rodape.php");
}

?>