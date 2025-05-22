<?php
require_once('../utils/accounts.php');
require_once('../utils/data/connection.php');

$database = new Connection();
$db = $database->getConnection();
$accounts = new Accounts($db);

$username = '';
$email = '';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    if($accounts->register($username, $email, $password, $confpassword)){
        header("Location: firstAccess.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calibri|Georgia">
    <link rel="stylesheet" href="../CSS/normalize.css">
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="icon" href="../assets/Logotip.svg" type="image/svg">
    <title>Valmet</title>
</head>
<body>

<header> 
    <img id="logo" src="../assets/Logotip2.svg" alt="Logo - Valmet">
    <div class="rainbow-line"></div>
</header>

<main>
    <h1>Crie sua Conta</h1>

    <form id="register" method="POST">
        <label for="username" id="username">Nome de usuário</label>
        <input type="text" name="username" placeholder="Informe seu nome" value="<?= $username ?>" required>

        <label for="email" id="email">E-mail</label>
        <input type="email" name="email" placeholder="Informe seu e-mail" value="<?= $email ?>" required>

        <label for="password" id="password">Senha</label>
        <input type="password" id="passwordfield" name="password" placeholder="Informe sua senha" required>

        <label for="confpassword" id="confpassword">Confirmar Senha</label>
        <input type="password" id="confpasswordfield" name="confpassword" placeholder="Confirme sua senha" required>

        <button type="submit" id="register-button" name="register">CADASTRAR</button>
        <a href="../index.php" id="login-link">Voltar para o login</a>
    </form>
</main>

<!--Footer-->
<!-- <//?php include 'components/footer.php'; ?> -->

</body>
</html>