<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];

    try {
        $stmt = $pdo->prepare("INSERT INTO estacao (nome, endereco) VALUES (?, ?)");
        
        if ($stmt->execute([$nome, $endereco])) {
            header('location: estacoes.php?cadastro=true');
        } else {
            header('location: estacoes.php?cadastro=false');
        }
    } catch (\Exception $e) {
        echo "<p class='text-danger'>Erro ao cadastrar: " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Nova Estação de Saída</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Estação:</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required="">
    </div>
    
    <button type="submit" class="btn btn-primary">Cadastrar Estação</button>
</form>

<?php require("rodape.php") ?>