<!-- 2-Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos alunos e os valores são as médias das notas. Exiba a lista de alunos ordenada pela média das notas (do maior para o menor). -->
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1></h1>
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
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Notas dos Alunos</title>
</head>
<body>
    <h2>Cadastro de 5 Alunos</h2>
    <form method="post">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <fieldset style="margin-bottom:15px;">
                <legend>Aluno <?php echo $i + 1; ?></legend>
                Nome: <input type="text" name="nome[]"><br><br>
                Nota 1: <input type="number" step="0.01" name="nota1[]"><br>
                Nota 2: <input type="number" step="0.01" name="nota2[]"><br>
                Nota 3: <input type="number" step="0.01" name="nota3[]"><br>
            </fieldset>
        <?php endfor; ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
