<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container">
<h1></h1>
<form method="post">
<div class="mb-3">
              <label for="base" class="form-label">digite seu peso: </label>
              <input type="number" id="peso" name="peso" class="form-control" required="">
            </div><div class="mb-3">
              <label for="expoente" class="form-label">digite sua altura em centimetros: (ex: 180 cm) </label>
              <input type="number" id="altura" name="altura" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $peso = $_POST["peso"];
        $altura = $_POST["altura"];
        $IMC = $_POST["IMC"];

        $altura = $altura / 100;
        $IMC = ($peso / $altura**2);
        echo "<p> IMC: $IMC </p>";
    }

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>