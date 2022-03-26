<?php

date_default_timezone_set('America/Sao_Paulo');

require __DIR__.'/vendor/autoload.php';
require_once 'app\Db\Conexao.php';

define('TITLE', 'Registro | KBM!');

use App\Entity\Usuario;

require __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/registro.php';
include __DIR__ . '/includes/footer.php';

?>

<!---

// VALIDAÇÃO DO POST
if (isset($_POST['user'],$_POST['senha'],$_POST['confirm_password'])) {
  $obUsuario->user      = $_POST['user'];
  $obUsuario->senha     = md5($_POST['senha']);
  $obUsuario->confirm_password  = md5($_POST['confirm_password']);

  if ($senha == $senhaConfirma) {
  } else {
    $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
  }
  echo "<p id='mensagem'>".$mensagem."</p>";

  $obUsuario->cadastrar();

  header('location: index.php?status=success');
  exit;
}
