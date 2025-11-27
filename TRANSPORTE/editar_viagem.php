<?php
require("cabecalho.php");
require("conexao.php");

try {
    $linhas = $pdo->query("SELECT id, cidade_origem, cidade_destino, horario_saida FROM linha")->fetchAll(PDO::FETCH_ASSOC);
    $passageiros = $pdo->query("SELECT id, nome, cpf FROM passageiro")->fetchAll(PDO::FETCH_ASSOC);
    $estacoes = $pdo->query("SELECT id, nome FROM estacao")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Erro ao carregar listas de seleção: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM viagem WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $viagem = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erro ao consultar viagem: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $linha_id = $_POST['linha_id'];
    $passageiro_id = $_POST['passageiro_id'];
    $estacao_id = $_POST['estacao_id'];
    $data_viagem = $_POST['data_viagem'];
    $id = $_POST['id'];
    

    try {
        $stmt = $pdo->prepare("UPDATE viagem SET linha_id = ?, passageiro_id = ?, estacao_id = ?, data_viagem = ? WHERE id = ?");
        
        if ($stmt->execute([$linha_id, $passageiro_id, $estacao_id, $data_viagem, $id])) {
            header('location: viagens.php?editar=true');
        } else {
            header('location: viagens.php?editar=false');
        }
    } catch (\Exception $e) {
        echo "<p class='text-danger'>Erro ao editar registro de viagem: " . $e->getMessage() . "</p>";
    }
}
?>

<h1>Editar Registro de Viagem</h1>
<form method="post">
    <input type="hidden" name='id' value='<?= $viagem['id']?>'>
    
    <div class="mb-3">
        <label for="linha_id" class="form-label">Linha de Transporte:</label>
        <select id="linha_id" name="linha_id" class="form-select" required="">
            <?php foreach ($linhas as $l): ?>
                <option value="<?= $l['id'] ?>" <?= $l['id'] == $viagem['linha_id'] ? 'selected' : '' ?>>
                    <?= $l['cidade_origem'] . ' -> ' . $l['cidade_destino'] . ' (' . $l['horario_saida'] . ')' ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="passageiro_id" class="form-label">Passageiro:</label>
        <select id="passageiro_id" name="passageiro_id" class="form-select" required="">
            <?php foreach ($passageiros as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $viagem['passageiro_id'] ? 'selected' : '' ?>>
                    <?= $p['nome'] . ' (CPF: ' . $p['cpf'] . ')' ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="estacao_id" class="form-label">Estação de Saída:</label>
        <select id="estacao_id" name="estacao_id" class="form-select" required="">
            <?php foreach ($estacoes as $e): ?>
                <option value="<?= $e['id'] ?>" <?= $e['id'] == $viagem['estacao_id'] ? 'selected' : '' ?>>
                    <?= $e['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="data_viagem" class="form-label">Data da Viagem:</label>
        <input type="date" id="data_viagem" name="data_viagem" class="form-control" value="<?= $viagem['data_viagem'] ?>" required="">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php require("rodape.php") ?>