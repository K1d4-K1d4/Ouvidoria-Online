
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/login.css">
    <title>Login</title>
</head>
<?php
$erro='';
$conexao = mysqli_connect("localhost", "root", "", "");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    $conexao = mysqli_connect("localhost", "root", "", "banquinho");
    if (!$conexao) {
        die("Erro ao conectar ao banco de dados 'banquinho': " . mysqli_connect_error());
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = $_POST['email'];
    $senha = $_POST['senha'];


$sql = "SELECT * FROM cadastro WHERE email = '$login'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1) {
  $usuario = mysqli_fetch_assoc($resultado);

  (password_verify($senha, $email['senha']));

    $_SESSION['usuario_id'] = $email['id'];
    $_SESSION['usuario_login'] = $email['email'];

    // Redireciona para a página principal (index.php)
    header("Location: ../templts/index.php");
    exit;  // Para garantir que o código abaixo não seja executado
  
 
} else {
  // Usuário não encontrado
  $erro = "E-mail ou senha incorretos.";
}
}

?>
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
                    <label for="remember-me">
                        <input type="checkbox" id="remember-me" name="remember-me">
                        Lembrar-me
                    </label>

                    <a href="#" class="forgot-password">Esqueceu a senha?</a>
                    <a href="../templts/registro.php" class="forgot-password">Cadastrar-se</a>
                </div>
                <?php if ($erro): ?>
            <p style="color: red; aligm-itens: center;"><?php echo $erro; ?></p>
            <?php endif; ?>

                <button type="submit" id="login">Entrar</button>
            </form>
            <?php
    if (isset($_SESSION['erro'])) {
    if ($_SESSION['erro'] == 1) {
      echo "<p>Usuário ou senha inválidos.</p>";
    } elseif ($_SESSION['erro'] == 2) {
      echo "<p>Por favor, faça login para acessar o conteúdo.</p>";
    } else {
      echo "<p>Erro desconhecido.</p>";
    }
  }
  ?>

        </div>
    </div>

    <?php 
    
    ?>
</body>
</html>