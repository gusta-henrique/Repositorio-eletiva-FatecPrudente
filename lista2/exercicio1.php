<?php

    include("cabecalho.php");

        $numeros = array(1, 2, 3, 0, 5, 6, 7);
        $menorNumero = min($numeros);
        $indiceMenor = array_search($menorNumero, $numeros);

        echo"<p>o menor numero da lista é $menorNumero e se encontra no $indiceMenor indice</p>";

    include("rodape.php");
?>


