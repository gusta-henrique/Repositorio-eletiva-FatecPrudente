<?php
include("cabecalho.php");
?>

<form method="post">
  <?php for ($i = 0; $i < 5; $i++): ?>
    <h4>Produto <?php echo $i+1; ?></h4>
    <div class="mb-3">
      <label for="codigo<?php echo $i; ?>" class="form-label">Informe o código:</label>
      <input type="number" id="codigo<?php echo $i; ?>" name="codigo[]" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="nome<?php echo $i; ?>" class="form-label">Digite o nome:</label>
      <input type="text" id="nome<?php echo $i; ?>" name="nome[]" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="preco<?php echo $i; ?>" class="form-label">Informe o preço:</label>
      <input type="number" step="0.01" id="preco<?php echo $i; ?>" name="preco[]" class="form-control" required>
    </div>
  <?php endfor; ?>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $produtos = [];

    for ($i = 0; $i < 5; $i++) {
        $codigo = intval($_POST["codigo"][$i]);
        $nome = trim($_POST["nome"][$i]);
        $preco = floatval($_POST["preco"][$i]);

        if ($preco > 100) {
            $preco = $preco * 0.90; 
        }

        $produtos[$codigo] = [
            "nome" => $nome,
            "preco" => $preco
        ];
    }

    uasort($produtos, function($a, $b) {
        return strcmp($a["nome"], $b["nome"]);
    });

    echo "<h3>Lista de produtos</h3>";
    foreach ($produtos as $codigo => $info) {
        echo "Código: $codigo - Nome: {$info['nome']} - Preço final: R$ " . number_format($info['preco'], 2, ",", ".") . "<br>";
    }
}
include("rodape.php");
?>
