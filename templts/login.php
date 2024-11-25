
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="post" action="../scripts/cadastro.php">
                <label for="email">E-mail ou CPF:</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <div class="login-options">
                    <label for="remember-me">
                        <input type="checkbox" id="remember-me" name="remember-me">
                        Lembrar-me
                    </label>

                    <a href="#" class="forgot-password">Esqueceu a senha?</a>
                </div>

                <button type="submit" id="login">Entrar</button>
            </form>

        </div>
    </div>

    <script src="../scripts/login.js"></script>

    <?php 
    
    ?>
</body>
</html>