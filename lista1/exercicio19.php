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
              <label for="base" class="form-label">informe a quantidade de dias: </label>
              <input type="number" id="dias" name="dias" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $dias = $_POST["dias"];
        $convertHoras = $_POST["convertHoras"];
        $convertMinutos = $_POST["convertMinutos"];
        $convertSegundos = $_POST["convertSegundos"];

        $convertHoras = $dias * 24;
        $convertMinutos = $dias * 1440;
        $convertSegundos = $dias * 86.400;

        echo "<p>$dias dia em horas: $convertHoras, em minutos: $convertMinutos, em segundos: $convertSegundos</p>";
    }

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>