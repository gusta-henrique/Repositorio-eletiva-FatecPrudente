<?php 
require("cabecalho.php");
require("conexao.php");

// Lógica de Exclusão (DELETE)
if (isset($_GET['excluir_id'])) {
    $id = $_GET['excluir_id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM passageiro WHERE id = ?");
        if ($stmt->execute([$id])) {
            header('location: passageiros.php?excluir=true');
            exit;
        }
    } catch (\Exception $e) {
        // Erro: geralmente Foreign Key, se o passageiro estiver em alguma Viagem
        header('location: passageiros.php?excluir=false&erro_fk=true');
        exit;
    }
}

// Consulta de Dados (SELECT)
try {
    $stmt = $pdo->query("SELECT * FROM passageiro");
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "<p class='text-danger'>Erro ao consultar passageiros: " . $e->getMessage() . "</p>";
}


if (isset($_GET['excluir_id'])) {
    $id = $_GET['excluir_id'];
    $pdo->beginTransaction();
    
    try {
        $stmt = $pdo->prepare("DELETE FROM passageiro WHERE id = ?");
        
        if ($stmt->execute([$id])) {
            $pdo->commit();
            header('location: passageiros.php?excluir=true');
        } else {
            $pdo->rollBack();
            header('location: passageiros.php?excluir=false&nao_encontrado=true');
        }
        exit;
    } catch (\Exception $e) {
        $pdo->rollBack();
        // Erro de Chave Estrangeira
        if ($e->getCode() == '23000') {
            header('location: passageiros.php?excluir=false&erro_fk=true');
        } else {
            header('location: passageiros.php?excluir=false');
        }
        exit;
    }
}
// ... (Lógica de mensagens de feedback omitida para brevidade, mas segue o padrão do categorias.php)
?>

<h2>Gerenciamento de Passageiros</h2>
<a href="novo_passageiro.php" class="btn btn-success mb-3 no-print">Novo Passageiro</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['nome'] ?></td>
            <td><?= $d['cpf'] ?></td>
            <td><?= $d['email'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_passageiro.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                <a href="passageiros.php?excluir_id=<?= $d['id'] ?>" 
                   onclick="return confirm('Tem certeza que deseja excluir este passageiro?')" 
                   class="btn btn-sm btn-danger">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require("rodape.php") ?>