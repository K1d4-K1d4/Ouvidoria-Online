<?php
// Inicia a sessão para salvar informações do usuário logado
session_start();

// Conexão com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "banquinho");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

// Variável para exibir mensagens de erro no formulário
$erro = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém e escapa os dados enviados no formulário
    $login = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = $_POST['senha'];

    // Consulta o usuário pelo email
    $sql = "SELECT * FROM cadastro WHERE email = '$login'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // Obtém os dados do usuário
        $usuario = mysqli_fetch_assoc($resultado);

        // Verifica se a senha está correta
        if (password_verify($senha, $usuario['senha'])) {
            // Armazena as informações do usuário na sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_login'] = $usuario['email'];

            // Redireciona para a página inicial
            header("Location: ../templts/index.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
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
            <form method="post">
                <label for="email">E-mail ou CPF:</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <div class="login-options">
                    <label>
                        <input type="checkbox" id="lembrar" name="lembrar">
                        Lembrar-me
                    </label>
                    <a href="../templts/login.php" class="esqueci">Esqueceu a senha?</a>
                    <a href="../templts/registro.php" class="esqueci">Cadastrar-se</a>
                </div>

                <!-- Mensagem de erro -->
                <?php if (!empty($erro)): ?>
                    <p style="color: red; text-align: center;"><?php echo htmlspecialchars($erro); ?></p>
                <?php endif; ?>

                <button type="submit" id="login">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>

