<?php
include("cabecalho.php");
?>

<form method="post">
    <div class="mb-3">
        <label for="valor" class="form-label">Informe um valor:</label>
        <input type="number" id="valor" name="valor" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $valor = floatval($_POST['valor']); 

    function RetornaInteiro($valor) {
        if ($valor != intval($valor)) {
            echo "<p>O valor NÃO é inteiro.</p>";
        } else {
            echo "<p>O valor é inteiro.</p>";
        }

        return round($valor);
    }
    
    $resultado = RetornaInteiro($valor);
    echo "<p>O arredondamento de $valor é $resultado</p>";
}

include("rodape.php");
?>
