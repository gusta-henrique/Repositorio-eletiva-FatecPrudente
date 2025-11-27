<?php 
require("cabecalho.php");
require("conexao.php");

// Lógica de Exclusão (DELETE)
if (isset($_GET['excluir_id'])) {
    $id = $_GET['excluir_id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM viagem WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('location: viagens.php?excluir=true');
            exit;
        }
    } catch (\Exception $e) {
        header('location: viagens.php?excluir=false');
        exit;
    }
}

// Consulta de Dados (SELECT com JOINs para dados legíveis)
$sql = "SELECT 
            v.id, 
            v.data_viagem, 
            v.registro_hora,
            l.cidade_origem, 
            l.cidade_destino,
            p.nome AS nome_passageiro,
            e.nome AS nome_estacao
        FROM viagem v
        INNER JOIN linha l ON v.linha_id = l.id
        INNER JOIN passageiro p ON v.passageiro_id = p.id
        INNER JOIN estacao e ON v.estacao_id = e.id
        ORDER BY v.data_viagem DESC, v.registro_hora DESC";

try {
    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "<p class='text-danger'>Erro ao consultar viagens: " . $e->getMessage() . "</p>";
}

?>

<h2>Registro de Viagens Realizadas</h2>
<a href="nova_viagem.php" class="btn btn-success mb-3 no-print">Registrar Nova Viagem</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Hora Registro</th>
            <th>Linha</th>
            <th>Passageiro</th>
            <th>Estação Saída</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= date('d/m/Y', strtotime($d['data_viagem'])) ?></td>
            <td><?= $d['registro_hora'] ?></td>
            <td><?= $d['cidade_origem'] . ' -> ' . $d['cidade_destino'] ?></td>
            <td><?= $d['nome_passageiro'] ?></td>
            <td><?= $d['nome_estacao'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_viagem.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                <a href="viagens.php?excluir_id=<?= $d['id'] ?>" 
                   onclick="return confirm('Deseja excluir este registro de viagem?')" 
                   class="btn btn-sm btn-danger">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require("rodape.php") ?>