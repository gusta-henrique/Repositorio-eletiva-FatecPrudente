<?php 
require("cabecalho.php");
require("conexao.php");

if (isset($_GET['excluir_id'])) {
    $id = $_GET['excluir_id'];
    $pdo->beginTransaction();
    
    try {
        $stmt = $pdo->prepare("DELETE FROM linha WHERE id = ?");
        
        if ($stmt->execute([$id])) {
            $pdo->commit();
            header('location: linhas.php?excluir=true');
        } else {
            $pdo->rollBack();
            header('location: linhas.php?excluir=false&nao_encontrado=true');
        }
        exit;
    } catch (\Exception $e) {
        $pdo->rollBack();
        if ($e->getCode() == '23000') {
            header('location: linhas.php?excluir=false&erro_fk=true');
        } else {
            header('location: linhas.php?excluir=false');
        }
        exit;
    }
}

try {

    $stmt = $pdo->query("SELECT * FROM linha"); 
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "<p class='text-danger'>Erro ao consultar linhas: " . $e->getMessage() . "</p>";
}

if(isset($_GET['cadastro']) && $_GET['cadastro']){
    echo "<p class='text-success no-print'>CADASTRO REALIZADO COM SUCESSO!</p>";
} else if(isset($_GET['cadastro']) && !$_GET['cadastro']){
    echo "<p class='text-danger no-print'>ERRO AO CADASTRAR LINHA!</p>";
}
if(isset($_GET['editar']) && $_GET['editar']){
    echo "<p class='text-success no-print'>CADASTRO EDITADO COM SUCESSO!</p>";
} else if(isset($_GET['editar']) && !$_GET['editar']){
    echo "<p class='text-danger no-print'>ERRO AO EDITAR LINHA!</p>";
}
if(isset($_GET['excluir']) && $_GET['excluir']){
    echo "<p class='text-success no-print'>LINHA EXCLUÍDA COM SUCESSO!</p>";
} else if(isset($_GET['excluir']) && !$_GET['excluir']){
    if (isset($_GET['erro_fk']) && $_GET['erro_fk']) {
         echo "<p class='text-danger no-print'>ERRO AO EXCLUIR! Esta Linha já está sendo usada em um Registro de Viagem. Exclua a Viagem primeiro.</p>";
    } else {
        echo "<p class='text-danger no-print'>ERRO AO EXCLUIR LINHA!</p>";
    }
}
?>

<h2>Gerenciamento de Linhas de Transporte</h2>
<a href="nova_linha.php" class="btn btn-success mb-3 no-print">Nova Linha</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Saída</th>
            <th>Chegada</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($dados as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['cidade_origem'] ?></td>
            <td><?= $d['cidade_destino'] ?></td>
            <td><?= $d['horario_saida'] ?></td>
            <td><?= $d['horario_chegada'] ?></td>
            <td>
                <a href="editar_linha.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                
                <a href="linhas.php?excluir_id=<?= $d['id'] ?>" 
                   onclick="return confirm('Tem certeza que deseja excluir esta Linha?')" 
                   class="btn btn-sm btn-danger">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require("rodape.php") ?>