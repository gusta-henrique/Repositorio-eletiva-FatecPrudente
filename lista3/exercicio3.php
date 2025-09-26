<?php
include("cabecalho.php");
?>
<form method="post">
<div class="mb-3">
              <label for="palavra1" class="form-label">primeira palavra: </label>
              <input type="text" id="palavra1" name="palavra1" class="form-control" required="">
            </div><div class="mb-3">
              <label for="palavra2" class="form-label">segunda palavra: </label>
              <input type="text" id="palavra2" name="palavra2" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
{   
    if (strpos($palavra1, $palavra2) !== false) {
        echo "<p>A segunda palavra está contida na primeira</p>"
    } else {
        echo "<p>A segunda palavra não está contida na primeira</p>"
    }
    
    include("rodape.php");
}
?>