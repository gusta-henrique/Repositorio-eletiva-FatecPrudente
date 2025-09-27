<?php

include("cabecalho.php");
?>
<form method="post">
      <label for="nome<?php echo $i; ?>" class="form-label">Digite o nome:</label>
      <input type="text" id="nome<?php echo $i; ?>" name="nome[]" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="preco<?php echo $i; ?>" class="form-label">Informe o preço:</label>
      <input type="number" step="0.01" id="preco<?php echo $i; ?>" name="preco[]" class="form-control" required>
    </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $itens = [];

    for ($i = 0; $i < 5; $i++) {
        $nome = trim($_POST["nome"][$i]);
        $preco = floatval($_POST["preco"][$i]);

        $preco_final = $preco * 1.15;

        $itens[$nome] = $preco_final;
    }

    asort($itens);

    echo "<h3>Lista de Itens com imposto</h3>";
    foreach ($itens as $nome => $preco) {
        echo "Item: $nome - Preço final: R$ " . number_format($preco, 2, ",", ".") . "<br>";
    }
}

include("rodape.php");

?>