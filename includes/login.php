<?php

require_once 'app\Db\Conexao.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: listar.php");
    exit;
}

// Define variables and initialize with empty values
$user = $senha = "";
$user_err = $senha_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["user"]))) {
        $user_err = "Please enter username.";
    } else {
        $user = trim($_POST["user"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["senha"]))) {
        $senha_err = "Please enter your senha.";
    } else {
        $senha = trim($_POST["senha"]);
    }

    // Validate credentials
    if (empty($user_err) && empty($senha_err)) {
        // Prepare a select statement
        $sql = "SELECT id, user, senha FROM usuario WHERE user = ?";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user);

            // Set parameters
            $param_user = $user;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $user, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($senha, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["user"] = $user;

                            // Redirect user to welcome page
                            header("location: listar.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Senha inválida.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Usuário não existe.";
                }
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
          <h2 class="mt-3">Login</h2>

          <form method="post">

            <div class="form-group">
              <label>Usuário</label>
              <input type="text" class="form-control <?php echo (!empty($user_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $user; ?>" name="user" required/>
              <span class="invalid-feedback"><?php echo $user_err; ?></span>
            </div>

            <div class="form-group">
              <label>Senha</label>
              <input type="password" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" name="senha" required/>
              <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            </div>

            <button name="welcome" class="btn btn-success" type="submit">Login</button>

          </form>

          <p>Não possui uma conta?<a class="btn-link" href="register.php"> Registre-se</a> aqui.</p>
        </div>
      </div>
    </div>
  </div>
</main>
