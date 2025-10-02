<!-- 5.         Crie um programa em PHP que leia um valor e retorna a raiz quadrada desse número.  -->


<?php
include("cabecalho.php");
?>

<form method="post">
    <div class="mb-3">
        <label for="dia" class="form-label">Informe um valor:</label>
        <input type="number" id="valor" name="valor" class="form-control" required>
    </div>
  
</form>
 
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $valor = $_POST['valor'];

    function RetornaRaiz($valor) {
        if ($valor < 0) {    
            echo "<p>valor inválido</p>";
        }

        return sqrt($valor);
    }
    
    $resultado = RetornaRaiz($valor);
    echo "<p>A raiz quadrada de $valor é $resultado</p>";
}

include("rodape.php");
?>
