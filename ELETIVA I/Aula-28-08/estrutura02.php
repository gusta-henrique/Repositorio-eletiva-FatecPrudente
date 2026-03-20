<?php
    include("cabecalho.php");

    $valor =10;

    if($valor > 10){
        echo"valor maior que 10";
    } else if ($valor < 10) {
        echo"valor menor que 10";
    }else {
        echo "valor igual a 10";
    }
    
    include("rodape.php");
?>