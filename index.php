<?php
session_start();

require_once('utils/accounts.php');
require_once('utils/data/connection.php');

$database = new Connection();
$db = $database->getConnection();
$accounts = new Accounts($db);

$username = '';
$error = '';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($accounts->login($username, $password)){
        $_SESSION['username'] = $username;
        header("Location: views/dashboard.php");
        exit();
    }else{
        $error = 'Credenciais Inválidas!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calibri|Georgia">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" href="assets/Logotip.svg" type="image/svg">
    <title>Valmet</title>
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .overlay .loading {
            color: black;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<header> 
    <img id="logo" src="assets/Logotip.png" alt="Logo - Valmet">
    <div class="shadow-line"></div>
</header>

<main>
    <?php if($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form id="login" method="POST">
        <label for="username" id="username">Nome de usuário</label>
        <input type="text" name="username" placeholder="Informe seu nome" value="<?= $username ?>" required>

        <label for="password" id="password">Senha</label>
        <input type="password" name="password" placeholder="Informe sua senha" required>

        <button type="submit" name="login" id="login-button">Login</button>
        <!-- <a href="views/register.php" id="register-link">Não tem uma conta? <span>Cadastre-se aqui!</span></a> -->
        <a href="views/forgot_password.php" id="forgot-password-link">Esqueci minha senha</a>
    </form>

    <div class="overlay" id="loadingOverlay">
        <div class="loading">Carregando...</div>
    </div>
</main>

<!--Footer-->
<!-- <//?php include 'views/components/footer.php'; ?> -->

<script>
    // Validar formulário antes do envio
    $('form').on('submit', function() {
        // Exibir tela de carregamento antes de enviar o formulário
        document.getElementById('loadingOverlay').style.display = 'flex';
        return true;
    });
</script>
</body>
</html>