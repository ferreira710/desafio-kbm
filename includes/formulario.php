<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cadastro de cliente</title>
    <style>
    main {
        margin: 6px 0;
        padding: 3px;
    }

    .center {
        margin: 0 auto;
        width: 100%;
        padding: 6px;
    }
</style>
  </head>
  <body>

</html>
<main>
  <div class="center">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Cadastro de clientes</h2>
          <p>Preencha este formulário para cadastrar um cliente.</p>
          <form class="row g-3" method="post">
            <div class="col-md-10">
              <label>Nome</label>
              <input id="nome" type="text" class="form-control" name="nome" value="<?=$obCliente->nome?>" required>
            </div>
            <div class="col-md-2">
              <label>Data de nascimento</label>
              <input id="nascimento" type="date" class="form-control" name="nascimento"><?=$obCliente->nascimento?>
            </div>
            <div class="col-md-4">
              <label>CPF</label>
              <input id="cpf" type="text" class="form-control" name="cpf" value="<?=$obCliente->cpf?>" required>
            </div>
            <div class="col-md-4">
              <label>RG</label>
              <input id="rg" type="text" class="form-control" name="rg" value="<?=$obCliente->rg?>" required>
            </div>
            <div class="col-md-4">
              <label>Telefone</label>
              <input id="telefone" type="text" class="form-control" name="telefone" value="<?=$obCliente->telefone?>" required>
            </div>
            <div class="col-md-2">
              <label>CEP</label>
              <input id="cep" cep-mask="00000-000" type="text" class="form-control" name="cep" value="<?=$obCliente->cep?>" required>
            </div>
            <div class="col-md-8">
              <label>Logradouro</label>
              <input id="rua" type="text" class="form-control" name="logradouro" value="<?=$obCliente->logradouro?>" required>
            </div>
            <div class="col-md-2">
              <label>Número</label>
              <input type="text" class="form-control" name="numero" value="<?=$obCliente->numero?>" required>
            </div>
            <div class="col-md-6">
              <label>Bairro</label>
              <input id="bairro" type="text" class="form-control" name="bairro" value="<?=$obCliente->bairro?>" required>
            </div>
            <div class="col-md-4">
              <label>Cidade</label>
              <input id="cidade" type="text" class="form-control" name="cidade" value="<?=$obCliente->cidade?>" required>
            </div>
            <div class="col-md-2">
              <label>Estado</label>
              <select class="custom-select" id="estado" name="estado" style="width:155px" value="<?=$obCliente->estado?>" required>
                <div class="dorpdown-menu">
                <option selected="Nenhum">Nenhum</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
                </div>
              </select>
            </div>
            <div class="mb-3">
              <button style="margin-left: 12px; margin-top: 12px" type="submit" class="btn btn-success">Salvar</button>
              <a style="margin-left: 12px; margin-top: 12px" class="btn btn-success" href="index.php" role="button">Voltar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

  </body>
</html>
