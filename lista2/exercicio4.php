<?php

    include("cabecalho.php");
?>

<form method="post">
<div class="mb-3">
              <label for="valor" class="form-label">Informe o valor do produto:</label>
              <input type="number" id="valor" name="valor" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $valor = $_POST["valor"];
       $desconto = $valor * 0.15;

       if ($valor > 100){
            $desconto = $valor - $desconto;
            echo "<p>valor do produto com 15% de desconto é: $desconto</p>";
       }else {
            echo "<p>valor do produto é: $valor</p>";
       }
    }

    include("rodape.php");
?>
