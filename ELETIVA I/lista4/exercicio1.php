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
              <label for="telefone" class="form-label">digite o telefone</label>
              <input type="number" id="telefone" name="telefone" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>

 <?php
$contatos = []; // cria o array (mapa) para guardar os contatos

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  for ($i = 0; $i < 5; $i++) {
        $nome = trim($_POST["nome"][$i]);      
        $telefone = trim($_POST["telefone"][$i]); 

        // se o nome já existe no array, pula
        if (array_key_exists($nome, $contatos)) {
            continue;
        }

        if (in_array($telefone, $contatos)) {
            continue;
        }

        if ($nome && $telefone) {
            $contatos[$nome] = $telefone;
        }
    }

    ksort($contatos);

    echo "<h3>Lista de Contatos</h3>";
    foreach ($contatos as $nome => $telefone) {
        echo "$nome - $telefone<br>";
    }
}
?>

</body>
</html>

</body>
</html>