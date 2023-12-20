<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/script.js" defer></script>
    <title>Aegis Airlines</title>
</head>

<body>

    <section class="logon">
        <h3>
            <i class="bi bi-airplane-fill"></i>
            Aegis Airlines
        </h3>
        <h1>Bem-vindo</h1>
        <h2>Logon</h2>

        <form action="functions/usuario/logon.php" method="POST">
            <div>
                <p>Nome</p>
                <input type="text" name="nome" class="input branco" required>
            </div>
            <div>
                <p>Email</p>
                <input type="text" name="email" class="input branco" required>
            </div>
            <div>
                <p>Senha</p>
                <input type="password" name="senha" class="input branco" required>
            </div>
            <h5>
                <input type="submit" value="Entrar" class="botao azul">
            </h5>
        </form>

        <br>
        <p>
            <a class="cadastro" href="login.php">Já possui login? Clique aqui</a>
        </p>

    </section>

</body>