<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <form class="p-4 bg-white shadow rounded">
    <div class="row mb-3">
      <div class="col-md-2">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" value="32" readonly>
      </div>
      <div class="col-md-5">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Nome Completo do Cliente">
      </div>
      <div class="col-md-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="cliente@dominio.com">
      </div>
      <div class="col-md-2">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" placeholder="Só números">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3">
        <label for="celular" class="form-label">Nº Celular</label>
        <input type="text" class="form-control" id="celular" placeholder="Nº do celular">
      </div>
      <div class="col-md-3">
        <label for="fixo" class="form-label">Nº Telefone fixo</label>
        <input type="text" class="form-control" id="fixo" placeholder="Nº telefone">
      </div>
      <div class="col-md-2">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" placeholder="ex: 88308070">
      </div>
      <div class="col-md-4">
        <label for="logradouro" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouro" placeholder="ex: Rua 1400">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-1">
        <label for="numero" class="form-label">Nº</label>
        <input type="text" class="form-control" id="numero">
      </div>
      <div class="col-md-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro">
      </div>
      <div class="col-md-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade">
      </div>
      <div class="col-md-1">
        <label for="uf" class="form-label">UF</label>
        <input type="text" class="form-control" id="uf" maxlength="2">
      </div>
      <div class="col-md-4">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status">
          <option selected>Selecione</option>
          <option value="ativo">Ativo</option>
          <option value="inativo">Inativo</option>
        </select>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      <button type="reset" class="btn btn-danger me-2">Resetar</button>
      <button type="submit" class="btn btn-success">Próximo</button>
    </div>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
