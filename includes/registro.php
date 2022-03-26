<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Registrado com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Erro ao registrar!</div>';
      break;
  }
}

// Define variables and initialize with empty values
$user = $senha = $confirm_password = "";
$user_err = $senha_err = $confirm_senha_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["user"]))) {
        $user_err = "Digite um usuário.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))) {
        $user_err = "Nome de usuário só pode conter letras, números e underline.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM usuario WHERE user = ?";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user);

            // Set parameters
            $param_user = trim($_POST["user"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $user_err = "Esse nome de usuário já existe.";
                } else {
                    $user = trim($_POST["user"]);
                }
            } else {
                echo "Oops! Alguma coisa deu errado, tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["senha"]))) {
        $senha_err = "Por favor digite uma senha.";
    } elseif (strlen(trim($_POST["senha"])) < 4) {
        $senha_err = "A senha deve conter pelo menos 4 dígitos.";
    } else {
        $senha = trim($_POST["senha"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_senha_err = "Por favor confirme as senhas.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($senha_err) && ($senha != $confirm_password)) {
            $confirm_senha_err = "As senhas não são iguais.";
        }
    }

    // Check input errors before inserting in database
    if (empty($user_err) && empty($senha_err) && empty($confirm_senha_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO usuario (user, senha) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_user, $param_senha);

            // Set parameters
            $param_user = $user;
            $param_senha = password_hash($senha, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Oops! Alguma coisa deu errado, tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conexao);
}

?>

<main>
  <div class="center">
    <div class="container">
      <div class="row">
        <div class="col">

          <?=$mensagem?>


          <h2 class="mt-3">Registre-se</h2>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">
              <label for="user">Usuário</label>
              <input id="user" type="text" name="user" class="form-control<?php echo (!empty($user_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $user; ?>" required>
              <span class="invalid-feedback"><?php echo $user_err; ?></span>
            </div>

            <div class="form-group">
              <label for="senha">Senha</label>
              <input id="senha"  type="password" name="senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $senha; ?>" required>
              <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            </div>

            <div class="form-group">
              <label for="confirm_password">Confirme a senha</label>
              <input id="confirm_password"  type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_senha_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" required>
              <span class="invalid-feedback"><?php echo $confirm_senha_err; ?></span>
            </div>

            <button class="btn btn-success" type="submit">Registrar</button>

          </form>

          <p>Já possui uma conta? Faça <a class="btn-link" href="login.php">login</a> aqui.</p>
        </div>
      </div>
    </div>
  </div>
</main>
