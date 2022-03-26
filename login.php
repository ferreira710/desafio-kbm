<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Login | KBM!');

use App\Entity\Usuario;

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/login.php';
include __DIR__ . '/includes/footer.php';

?>

<!-- teste

if (isset($_POST['login'])) {
    if ($_POST['user'] != "" || $_POST['senha'] != "") {
        $user = $_POST['user'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM `usuario` WHERE `user`=? AND `senha`=? ";
        $query = $conn->prepare($sql);
        $query->execute(array($user,$senha));
        $row = $query->rowCount();
        $fetch = $query->fetch();
        if ($row > 0) {
            $_SESSION['user'] = $fetch['id'];
            header("location: login.php");
        } else {
            echo "
      <script>alert('Invalid user or senha')</script>
      <script>window.location = 'login.php'</script>
      ";
        }
    } else {
        echo "
      <script>alert('Please complete the required field!')</script>
      <script>window.location = 'login.php'</script>
    ";
    }
}
