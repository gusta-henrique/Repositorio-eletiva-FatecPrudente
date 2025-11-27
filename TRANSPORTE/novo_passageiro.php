<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    try {
        $stmt = $pdo->prepare("INSERT INTO passageiro (nome, cpf, email, telefone) VALUES (?, ?, ?, ?)");
        
        if ($stmt->execute([$nome, $cpf, $email, $telefone])) {
            header('location: passageiros.php?cadastro=true');
        } else {
            header('location: passageiros.php?cadastro=false');
        }
    } catch (\Exception $e) {
        echo "<p class='text-danger'>Erro ao cadastrar: CPF ou Email duplicado. " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Novo Passageiro</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome Completo:</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" id="cpf" name="cpf" class="form-control" required="" placeholder="Ex: 000.000.000-00">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Ex: (18) 99999-9999">
    </div>
    
    <button type="submit" class="btn btn-primary">Cadastrar Passageiro</button>
</form>

<?php require("rodape.php") ?>