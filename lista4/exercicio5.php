<!-- Crie um formulário que leia dados de 5 livros: título e quantidade em estoque. Leia os dados e crie um mapa ordenado onde as chaves são os títulos dos livros e os valores são a quantidade em estoque. Verifique se a quantidade em estoque é inferior a 5 e exiba um alerta para os livros com baixa quantidade. Exiba a lista ordenada pelo título dos livros -->
<?php

include("cabecalho.php");
?>

<form method="post">
  <?php for ($i = 0; $i < 5; $i++): ?>
    <h4>Livro <?php echo $i+1; ?></h4>
    Título: <input type="text" name="titulo[]" required><br>
    Quantidade em estoque: <input type="number" name="quantidade[]" required><br><br>
  <?php endfor; ?>
  <button type="submit">Enviar</button>
</form>
 
<<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $livros = [];

    for ($i = 0; $i < 5; $i++) {
        $titulo = trim($_POST["titulo"][$i]);
        $quantidade = intval($_POST["quantidade"][$i]);

        $livros[$titulo] = $quantidade;
    }

    ksort($livros);

    echo "<h3>Lista de Livros</h3>";
    foreach ($livros as $titulo => $quantidade) {
        echo "Título: $titulo - Estoque: $quantidade";
        if ($quantidade < 5) {
            echo " <strong style='color:red;'>(Estoque baixo!)</strong>";
        }
        echo "<br>";
    }
}

include("rodape.php");

?>