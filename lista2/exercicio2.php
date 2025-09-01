<?php

    include("cabecalho.php");
?>

<form method="post">
    <div class="mb-3">
        <label for="numero1" class="form-label">numero1</label>
        <input type="number" id="numero1" name="numero1" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="numero2" class="form-label">numero2</label>
        <input type="number" id="numero2" name="numero2" class="form-control" required="">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        
        if ($numero1 == $numero2 || $numero2 == $numero1){
            $triploSoma = ($numero1 + $numero2) * 3;
            echo "<p>valores iguais. triplo da soma $triploSoma </p>";
        }else {
            $soma = $numero1 + $numero2;
            echo "a soma dos numeros é: $soma";
        }

        $soma = $numero1 + $numero2;


        echo "<p>Você digitou: $numero1 e $numero2</p>";
    }

    include("rodape.php");
?>