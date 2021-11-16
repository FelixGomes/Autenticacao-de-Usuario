<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="corpo-form">
        <h1>Autenticação de Usuário</h1>
        <form action="autenticacao.php" method="post">
            <div class="login">
                <label for="login"></label>
                <input type="text" name="login" id="login" placeholder="Digite seu nome">
            </div>
            <div class="senha">
                <label for="senha"></label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            </div>
            <input type="submit" value="Entrar">
        </form>
        <?php
        session_start();
        define("LOGIN", "admin");
        define("SENHA", "123");
        //testar se a requisição está vindo do post:
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (isset($_POST["login"]) && isset($_POST["senha"])) {
                $login = $_POST["login"];
                $senha = $_POST["senha"];
                if ($login == LOGIN && $senha == SENHA) {
                    //logado
                    $_SESSION["USUARIO"] = "$login";
                    header("Location: index.php");
                } else {
                    echo "<h4>Usuário ou Senha incorreto.</h4>";
                    /* usuario = admin - senha = 123 */
                }
            }
        }
        if (isset($_GET["acao"])) {
            $acao = $_GET["acao"];
            if ($acao == "logoff") {
                session_destroy(); //destroi todas as variaveis.
                unset($_SESSION["USUARIO"]);
                //aqui só a variavel session será desfeita.
                echo "<h4>Logoff realizado com sucesso, volte sempre!</h4>";
            }
        }
        ?>
    </div>
</body>

</html>