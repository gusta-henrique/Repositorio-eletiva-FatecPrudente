<?php
require("cabecalho.php");
require("conexao.php");

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['id'])){
    try{
        $stmt = $pdo->prepare("SELECT * FROM passageiro WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $passageiro = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e){
        echo "Erro ao consultar passageiro: ".$e->getMessage();
    }
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $id = $_POST['id'];

    try{
        $stmt = $pdo->prepare("UPDATE passageiro SET nome = ?, cpf = ?, email = ?, telefone = ? WHERE id = ?");
        if($stmt->execute([$nome, $cpf, $email, $telefone, $id])){
            header('location: passageiros.php?editar=true');
        }else{
            header('location: passageiros.php?editar=false');
        }
    }catch(\Exception $e){
        echo "<p class='text-danger'>Erro ao editar: CPF ou Email duplicado. " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Editar Passageiro</h1>
<form method="post">
    <input type="hidden" name='id' value='<?= $passageiro['id']?>'>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome Completo:</label>
        <input value='<?= $passageiro['nome']?>' type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input value='<?= $passageiro['cpf']?>' type="text" id="cpf" name="cpf" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input value='<?= $passageiro['email']?>' type="email" id="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input value='<?= $passageiro['telefone']?>' type="text" id="telefone" name="telefone" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php require("rodape.php") ?>