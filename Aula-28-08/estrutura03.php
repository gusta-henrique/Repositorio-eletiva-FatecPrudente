<?php
    include("cabecalho.php");
    //1 domingo 2 segunda 3 terca 4 quarta ....
    $diasemana = 3;

    switch($diasemana){
        case 1:
            echo "hoje é domingo";
        case 2:
            echo "hoje é segunda";
        case 3:
            echo "hoje é terça";
        case 4:
            echo "hoje é quarta";
            break;

        default:
            echo "hoje pode ser quinta sexta ou sabado!!";
    }
    
    include("rodape.php");
?>