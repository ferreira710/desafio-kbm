<?php

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

  $mensagem = '';
  if (isset($_GET['status'])) {
      switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Erro!</div>';
        break;
    }
  }

  $resultados = '';
  foreach ($clientes as $cliente) {
      $resultados .= '<tr>
                      <td>'.$cliente->id.'</td>
                      <td>'.$cliente->nome.'</td>
                      <td>'.$cliente->nascimento.'</td>
                      <td>'.$cliente->cpf.'</td>
                      <td>'.$cliente->rg.'</td>
                      <td>'.$cliente->telefone.'</td>
                      <td>'.$cliente->cep.'</td>
                      <td>'.$cliente->logradouro.'</td>
                      <td>'.$cliente->numero.'</td>
                      <td>'.$cliente->bairro.'</td>
                      <td>'.$cliente->cidade.'</td>
                      <td>'.$cliente->estado.'</td>
                      <td>'.date('d/m/Y à\s H:i:s', strtotime($cliente->data)).'</td>
                      <td>
                        <a href="editar.php?id='.$cliente->id.'">
                          <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$cliente->id.'">
                          <button type="button" class="btn btn-danger btn-sm">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="18" class="text-center">
                                                              Nenhum cliente encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success">Novo cliente</button>
    </a>
    <?php  if (isset($_SESSION['loggedin'])) : ?>
        <a class="btn btn-danger right" href="logout.php" role="button">Logout</a>
    <?php endif ?>

    <form method="get">
      <div class="input-group justify-content-end">
        <div class="form-outline">
        <input type="text" name="busca" class="form-control" placeholder="Buscar CPF">
        </div>
        <button style="height:38px" type="submit" class="btn btn-success">
        <i class="fa fa-search"></i>
        </button>
        </div>
    </form>

  </section>


  <section style="text-align: center">
    <div class="table-responsive text-nowrap">
    <table class="table table-light">
      <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de nasc.</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>
  </div>
  </section>


</main>
