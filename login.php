<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js" defer></script>
    <title>Aegis Airlines</title>
</head>

<body>


    <section class="login">
        <h3>
            <i class="bi bi-airplane-fill"></i>
            Aegis Airlines
        </h3>
        <h1>Bem-vindo</h1>
        <h2>Login</h2>

        <form action="functions/usuario/login.php" method="POST">
            <div>
                <p>Email</p>
                <input type="text" name="email" class="input branco">
            </div>
            <div>
                <p>Senha</p>
                <input type="password" name="senha" class="input branco">
            </div>
            <h5>
                <input type="submit" value="Entrar" class="botao azul">
            </h5>
        </form>

        <br>
        <p>
            <a class="cadastro" href="logon.php">Cadastre-se aqui</a>
        </p>

    </section>

</body>