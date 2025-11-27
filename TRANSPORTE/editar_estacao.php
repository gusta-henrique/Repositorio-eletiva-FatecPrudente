<?php
require("cabecalho.php");
require("conexao.php");

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id'])){
    try{
        $stmt = $pdo->prepare("SELECT * FROM estacao WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $estacao = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e){
        echo "Erro ao consultar estação: ".$e->getMessage();
    }
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $id = $_POST['id'];

    try{
        $stmt = $pdo->prepare("UPDATE estacao SET nome = ?, endereco = ? WHERE id = ?");
        if($stmt->execute([$nome, $endereco, $id])){
            header('location: estacoes.php?editar=true');
        }else{
            header('location: estacoes.php?editar=false');
        }
    }catch(\Exception $e){
        echo "Erro ao editar: ".$e->getMessage();
    }
}
?>

<h1>Editar Estação de Saída</h1>
<form method="post">
    <input type="hidden" name='id' value='<?= $estacao['id']?>'>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Estação:</label>
        <input value='<?= $estacao['nome']?>' type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input value='<?= $estacao['endereco']?>' type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php require("rodape.php") ?>