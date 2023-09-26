<?php
require_once 'config.php';

// Inicie a sessão para armazenar as informações de login
session_start();

// Verificar se o usuário já está logado, se sim, redirecione para a página de destino
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Verificar se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar as credenciais de login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar o usuário no banco de dados
    $sql = "SELECT id, group_id FROM users WHERE login = '$username' AND senha = '$password'"; // Pode ser alterado na forma que desejar para se comunicar com o DB.
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Autenticação bem-sucedida, defina as variáveis de sessão para indicar que o usuário está logado e seu group_id
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['group_id'] = $row['group_id'];
        header('Location: index.php');
        exit;
    } else {
        $error_message = 'Credenciais inválidas. Tente novamente.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css"/>
  <title>Login Panel</title>
  <link rel="icon" href="favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/31b2f004d5.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container"> 
    <div class="login-panel">
    <h1><i class="fa-solid fa-handshake" style="color: white; font-size: 64px;"></i></h1>
    <br>
    <?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
    <form class="login-form" action="login.php" method="post">
    <div class="input-container">
        <input class="login-input" type="text" id="username" name="username" placeholder="Usuário..." required>
    </div>

    <div class="input-container">
        <input class="login-input" type="password" id="password" name="password" placeholder="Senha..." required>
    </div>
        <button class="submit-button" type="submit">Entrar</button>
    </form>
    <footer class="footer">
        <div class="footer-container">
            <p style="color: white;">© 2023 MiguelH</p>
        
    </footer>
    </div>
    </div>

</body>
</html>
