<?php 
require("cabecalho.php");
require("conexao.php");

if (isset($_GET['excluir_id'])) {
    $id = $_GET['excluir_id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM estacao WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('location: estacoes.php?excluir=true');
            exit;
        }
    } catch (\Exception $e) {
        header('location: estacoes.php?excluir=false&erro_fk=true');
        exit;
    }
}

try {
    $stmt = $pdo->query("SELECT * FROM estacao");
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "<p class='text-danger'>Erro ao consultar estações: " . $e->getMessage() . "</p>";
}
?>

<h2>Gerenciamento de Estações de Saída</h2>
<a href="nova_estacao.php" class="btn btn-success mb-3 no-print">Nova Estação</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome da Estação</th>
            <th>Endereço</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['nome'] ?></td>
            <td><?= $d['endereco'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_estacao.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                <a href="estacoes.php?excluir_id=<?= $d['id'] ?>" 
                   onclick="return confirm('Tem certeza que deseja excluir esta estação?')" 
                   class="btn btn-sm btn-danger">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require("rodape.php") ?>