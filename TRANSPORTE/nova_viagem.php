<?php
require("cabecalho.php");
require("conexao.php");

try {
    $linhas = $pdo->query("SELECT id, cidade_origem, cidade_destino FROM linha")->fetchAll(PDO::FETCH_ASSOC);
    $passageiros = $pdo->query("SELECT id, nome, cpf FROM passageiro")->fetchAll(PDO::FETCH_ASSOC);
    $estacoes = $pdo->query("SELECT id, nome, endereco FROM estacao")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "<p class='text-danger'>Erro ao carregar dados: " . $e->getMessage() . "</p>";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $linha_id = $_POST['linha_id'];
    $passageiro_id = $_POST['passageiro_id'];
    $estacao_id = $_POST['estacao_id'];
    $data_viagem = $_POST['data_viagem'];
    $registro_hora = date("H:i:s"); 

    try {
        $stmt = $pdo->prepare("INSERT INTO viagem (linha_id, passageiro_id, estacao_id, data_viagem, registro_hora) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$linha_id, $passageiro_id, $estacao_id, $data_viagem, $registro_hora])) {
            echo "<p class='text-success'>VIAGEM REGISTRADA com sucesso!</p>";
        } else {
            echo "<p class='text-danger'>ERRO ao registrar viagem!</p>";
        }
    } catch (\Exception $e) {
        echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Registrar Nova Viagem</h1>
<form method="post">
    <div class="mb-3">
        <label for="linha_id" class="form-label">Linha de Transporte:</label>
        <select id="linha_id" name="linha_id" class="form-select" required="">
            <option value="">Selecione a Linha</option>
            <?php foreach ($linhas as $l): ?>
                <option value="<?= $l['id'] ?>"><?= $l['cidade_origem'] . ' -> ' . $l['cidade_destino'] . ' (' . $l['horario_saida'] . ')' ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="passageiro_id" class="form-label">Passageiro:</label>
        <select id="passageiro_id" name="passageiro_id" class="form-select" required="">
            <option value="">Selecione o Passageiro</option>
            <?php foreach ($passageiros as $p): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nome'] . ' (CPF: ' . $p['cpf'] . ')' ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="estacao_id" class="form-label">Estação de Saída:</label>
        <select id="estacao_id" name="estacao_id" class="form-select" required="">
            <option value="">Selecione a Estação</option>
            <?php foreach ($estacoes as $e): ?>
                <option value="<?= $e['id'] ?>"><?= $e['nome'] . (isset($e['endereco']) ? ' - ' . $e['endereco'] : '') ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="data_viagem" class="form-label">Data da Viagem:</label>
        <input type="date" id="data_viagem" name="data_viagem" class="form-control" value="<?= date('Y-m-d') ?>" required="">
    </div>
    
    <button type="submit" class="btn btn-success">Registrar Viagem</button>
</form>

<?php require("rodape.php") ?>