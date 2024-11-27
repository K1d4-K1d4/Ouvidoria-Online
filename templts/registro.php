
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>Cadastre-se</h2>
            <form method="post" action="../scripts/registro.php">
                <label for="Nome">Nome:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Senha:</label>

                <input type="password" id="senha" name="senha" required>

                <button type="submit" id="login">Entrar</button>
            </form>

        </div>
    </div>

    <?php 
    
    ?>
</body>
</html>