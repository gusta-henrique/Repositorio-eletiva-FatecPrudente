<?php
require("cabecalho.php");
require("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $hr_saida = $_POST['horario_saida'];
    $hr_chegada = $_POST['horario_chegada'];
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];

    try {
        $stmt = $pdo->prepare("INSERT INTO linha (horario_saida, horario_chegada, cidade_origem, cidade_destino) VALUES (?, ?, ?, ?)");
        
        if ($stmt->execute([$hr_saida, $hr_chegada, $origem, $destino])) {
            header('location: linhas.php?cadastro=true');
        } else {
            header('location: linhas.php?cadastro=false');
        }
    } catch (\Exception $e) {
        echo "<p class='text-danger'>Erro ao cadastrar: " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Nova Linha de Transporte</h1>
<form method="post">
    <div class="mb-3">
        <label for="origem" class="form-label">Cidade de Origem:</label>
        <input type="text" id="origem" name="origem" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="destino" class="form-label">Cidade de Destino:</label>
        <input type="text" id="destino" name="destino" class="form-control" required="">
    </div>
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="horario_saida" class="form-label">Horário de Saída:</label>
            <input type="time" id="horario_saida" name="horario_saida" class="form-control" required="">
        </div>
        <div class="mb-3 col-md-6">
            <label for="horario_chegada" class="form-label">Horário de Chegada:</label>
            <input type="time" id="horario_chegada" name="horario_chegada" class="form-control" required="">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Cadastrar Linha</button>
</form>

<?php require("rodape.php") ?>