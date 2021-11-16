<?php
session_start();

if (!isset($_SESSION["USUARIO"])) {
    //caso usuario não esteja logado, redireciona para o login
    header("Location: autenticacao.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bem Vindo!</title>
</head>

<body>
    <div class="bemvindo">
        <h1>Seja Bem-Vindo(a) <?php echo $_SESSION["USUARIO"]; ?>!</h1>
        <div class="sair">
            <a href="autenticacao.php?acao=logoff">Logout</a>
        </div>
    </div>


</body>

</html>