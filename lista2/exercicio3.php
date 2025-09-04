<?php

    include("cabecalho.php");
?>

<form method="post">
<div class="mb-3">
              <label for="valorA" class="form-label">Insira o valor de A: </label>
              <input type="number" id="valorA" name="valorA" class="form-control" required="">
            </div><div class="mb-3">
              <label for="valorB" class="form-label">Insira o valor de B: </label>
              <input type="number" id="valorB" name="valorB" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valorA = $_POST["valorA"];
        $valorB = $_POST["valorB"];
        
       //imprimir em ordem crescente

       if ($valorA > $valorB){
            echo "<p>ordem crescente dos valores: $valorB e $valorA</p>";
       }else if ($valorB > $valorA) {
            echo "<p>ordem crescente dos valores: $valorA e $valorB</p>";
       }else if ($valorA == $valorB){
            echo "<p>Números iguais: $valorA </p>";
       }else {
            echo "<p>Valores indisponiveis! tente novamente</p>";
       }
       
    }

    include("rodape.php");
?>
