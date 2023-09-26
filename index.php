<?php
require_once 'config.php';
?>

<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Redirecionar para a página de login
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css"/>
  <title>MediaKore</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/31b2f004d5.js" crossorigin="anonymous"></script>
</head>
<body>
        <div class="login-panel">
            <h1>Você logou com sucesso!</h2>
            
             <button onclick="window.location.href = 'logout.php';" id="logout" class="submit-button">Sair</button>
                
            <p>© 2023 MiguelH</p>
        </div>
</body>
</html>
