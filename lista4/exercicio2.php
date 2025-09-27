<!-- 2-Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos alunos e os valores são as médias das notas. Exiba a lista de alunos ordenada pela média das notas (do maior para o menor). -->
<?php

include("cabecalho.php");
?>

<form method="post">
<div class="mb-3">
              <label for="nome" class="form-label">Digite seu nome</label>
              <input type="text" id="nome" name="nome" class="form-control" required="">
            </div><div class="mb-3">
              <label for="telefone" class="form-label">nota 1</label>
              <input type="number" id="nota1" name="nota1" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">nota 2</label>
              <input type="number" id="nota2" name="nota2" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">nota 3</label>
              <input type="number" id="nota3" name="nota3" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
$alunos = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 0; $i < 5; $i++) {
        $nome = trim($_POST["nome"][$i]); 
        $n1 = floatval($_POST["nota1"][$i]); 
        $n2 = floatval($_POST["nota2"][$i]);
        $n3 = floatval($_POST["nota3"][$i]);

        if ($nome) { 
            $media = ($n1 + $n2 + $n3) / 3; 
            $alunos[$nome] = $media;       
        }
    }

    arsort($alunos);

    // exibe a lista
    echo "<h3>Lista de Alunos e Médias</h3>";
    foreach ($alunos as $nome => $media) {
        echo "$nome - Média: " . number_format($media, 2, ",", ".") . "<br>";
    }
}

include("rodape.php");

?>

