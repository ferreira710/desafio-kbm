<?php

session_start();

?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public\img\favicon.ico">

    <style>""
        main {
            margin: 6px 0;
            padding: 3px;
        }

        .center {
            margin: 0 auto;
            width: 420px;
            padding: 6px;
        }
    </style>

    <title>KBM!</title>

  </head>
  <body class="bg-dark text-light">

    <div class="container">

      <div class="jumbotron bg-danger">
        <h1>KBM! - Dashboard</h1>
        <p>Sistema de cadastro de clientes</p>
        <hr/>
        <?php if (!isset($_SESSION['loggedin'])) : ?>
  <p>Você precisa estar logado para acessar o sistema.</p>
  <a class="btn btn-success" href="register.php" role="button">Registre-se</a>
  <a class="btn btn-success" href="login.php" role="button">Login</a>
<?php endif ?>
      </div>
