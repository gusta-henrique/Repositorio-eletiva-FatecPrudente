<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cadastro de Linhas</h2>
        <form action="cadastroPassageiro.php" method="POST">
            <div class="mb-3">
                <label for="horarioSaida" class="form-label">Informe o horário de saída</label>
                <input type="date" id="horarioSaida" name="horarioSaida" class="form-control" required="">
            </div>
    </div>
    <div class="mb-3">
        <label for="horarioChegada" class="form-label">Informe o horário de chegada</label>
        <input type="date" id="horarioChegada" name="horarioChegada" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="destino" class="form-label">Informe a cidade de destino:</label>
        <select id="destino" name="destino" class="form-select" required="">
            <option value="Presidente Prudente-SP">Presidente Prudente-SP</option>
            <option value="Adamantina-SP">Adamantina-SP</option>
            <option value="Alfredo Marcondes-SP">Alfredo Marcondes-SP</option>
            <option value="Álvares Machado-SP">Álvares Machado-SP</option>
            <option value="Anhumas-SP">Anhumas-SP</option>
            <option value="Caiabú-SP">Caiabú-SP</option>
            <option value="Caiuá-SP">Caiuá-SP</option>
            <option value="Dracena-SP">Dracena-SP</option>
            <option value="Paulicéia-SP">Paulicéia-SP</option>
            <option value="Piquerobi-SP">Piquerobi-SP</option>
            <option value="Pirapozinho-SP">Pirapozinho-SP</option>
            <option value="Pracinha-SP">Pracinha-SP</option>
            <option value="Presidente Bernardes-SP">Presidente Bernardes-SP</option>
            <option value="Presidente Epitácio-SP">Presidente Epitácio-SP</option>
            <option value="Presidente Venceslau-SP">Presidente Venceslau-SP</option>
            <option value="Rancharia-SP">Rancharia-SP</option>
            <option value="Regente Feijó-SP">Regente Feijó-SP</option>
            <option value="Santo Anastácio-SP">Santo Anastácio-SP</option>
            <option value="Santo Expedito-SP">Santo Expedito-SP</option>
            <option value="São João do Pau d’Alho-SP">São João do Pau d’Alho-SP</option>
            <option value="Taciba-SP">Taciba-SP</option>
            <option value="Tarabai-SP">Tarabai-SP</option>
            <option value="Teodoro Sampaio-SP">Teodoro Sampaio-SP</option>
            <option value="Tupi Paulista-SP">Tupi Paulista-SP</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="origem" class="form-label">Informe a cidade de origem:</label>
        <select id="origem" name="origem" class="form-select" required="">
            <option value="Presidente Prudente-SP">Presidente Prudente-SP</option>
            <option value="Adamantina-SP">Adamantina-SP</option>
            <option value="Alfredo Marcondes-SP">Alfredo Marcondes-SP</option>
            <option value="Álvares Machado-SP">Álvares Machado-SP</option>
            <option value="Anhumas-SP">Anhumas-SP</option>
            <option value="Caiabú-SP">Caiabú-SP</option>
            <option value="Caiuá-SP">Caiuá-SP</option>
            <option value="Dracena-SP">Dracena-SP</option>
            <option value="Paulicéia-SP">Paulicéia-SP</option>
            <option value="Piquerobi-SP">Piquerobi-SP</option>
            <option value="Pirapozinho-SP">Pirapozinho-SP</option>
            <option value="Pracinha-SP">Pracinha-SP</option>
            <option value="Presidente Bernardes-SP">Presidente Bernardes-SP</option>
            <option value="Presidente Epitácio-SP">Presidente Epitácio-SP</option>
            <option value="Presidente Venceslau-SP">Presidente Venceslau-SP</option>
            <option value="Rancharia-SP">Rancharia-SP</option>
            <option value="Regente Feijó-SP">Regente Feijó-SP</option>
            <option value="Santo Anastácio-SP">Santo Anastácio-SP</option>
            <option value="Santo Expedito-SP">Santo Expedito-SP</option>
            <option value="São João do Pau d’Alho-SP">São João do Pau d’Alho-SP</option>
            <option value="Taciba-SP">Taciba-SP</option>
            <option value="Tarabai-SP">Tarabai-SP</option>
            <option value="Teodoro Sampaio-SP">Teodoro Sampaio-SP</option>
            <option value="Tupi Paulista-SP">Tupi Paulista-SP</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>

    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require("conexao.php");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
        try {
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
            if ($stmt->execute([$nome, $email, $senha])) {
                header("location: index.php?cadastro=true");
            } else {
                header("location: index.php?cadastro=false");
            }
        } catch (Exception $e) {
            echo "Erro ao executar o comando SQL: " . $e->getMessage();
        }
    }

    ?>
</body>

</html>