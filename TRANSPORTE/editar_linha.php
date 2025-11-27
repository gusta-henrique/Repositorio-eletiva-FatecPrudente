<?php
require("cabecalho.php");
require("conexao.php");

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id'])){
    try{
        $stmt = $pdo->prepare("SELECT * FROM linha WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e){
        echo "Erro ao consultar linha: ".$e->getMessage();
    }
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $hr_saida = $_POST['horario_saida'];
    $hr_chegada = $_POST['horario_chegada'];
    $id = $_POST['id'];

    try{
        $stmt = $pdo->prepare("UPDATE linha SET horario_saida = ?, horario_chegada = ?, cidade_origem = ?, cidade_destino = ? WHERE id = ?");
        
        if($stmt->execute([$hr_saida, $hr_chegada, $origem, $destino, $id])){
            header('location: linhas.php?editar=true');
        }else{
            header('location: linhas.php?editar=false');
        }
    }catch(\Exception $e){
        echo "<p class='text-danger'>Erro ao editar: ".$e->getMessage()."</p>";
    }
}
?>

<h1>Editar Linha de Transporte</h1>
<form method="post">
    <input type="hidden" name='id' value='<?= $linha['id']?>'>
    <div class="mb-3">
        <label for="origem" class="form-label">Cidade de Origem:</label>
        <input value='<?= $linha['cidade_origem']?>' type="text" id="origem" name="origem" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="destino" class="form-label">Cidade de Destino:</label>
        <input value='<?= $linha['cidade_destino']?>' type="text" id="destino" name="destino" class="form-control" required="">
    </div>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="horario_saida" class="form-label">Horário de Saída:</label>
            <input value='<?= $linha['horario_saida']?>' type="time" id="horario_saida" name="horario_saida" class="form-control" required="">
        </div>
        <div class="mb-3 col-md-6">
            <label for="horario_chegada" class="form-label">Horário de Chegada:</label>
            <input value='<?= $linha['horario_chegada']?>' type="time" id="horario_chegada" name="horario_chegada" class="form-control" required="">
        </div>
        </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php require("rodape.php") ?>