<!DOCTYPE html>
<html lang="pt-BR">
<?php
session_start(); 

$conexao = mysqli_connect("localhost", "root", "", "banquinho");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

$aut = isset($_SESSION['usuario_login']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria Online</title>
    <script src="../scripts/script.js" defer></script>
    <link rel="stylesheet" href="../statics/style.css">
</head>
<body>
<header>
    <nav>
        <a href="#" class="nav-logo">
            <img src="https://fundacao193.org.br/wp-content/uploads/2023/05/ouvidoria.png" alt="Ouvidoria">
        </a>
        <div class="nav-links">
            <a href="../templts/reclamaçoes.php">RECLAMAÇOES</a>
            <?php if (!$aut): ?>
                <a href="../templts/login.php">ENTRAR</a>
                <a href="register.php">CADASTRAR</a>
            <?php else: ?>
            <div class="welcome-box">
                Bem-vindo, <strong><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></strong>! <br>
                Email: <strong><?php echo htmlspecialchars($_SESSION['usuario_email']); ?></strong><br>
                ID: <strong><?php echo htmlspecialchars($_SESSION['usuario_id']); ?></strong>
            </div>
            <div class="nav-links">
            <a href="../templts/logout.php">Sair</a>
            </div>
            <?php endif; ?>
            
        </div>
        
    </nav>
</header>

<main>
    <div class="interface">
        <fieldset>
            <legend></legend>
            <form action="../scripts/dados.php" method="POST">

                <label for="reclamation">Diga-nos Sua mensagem</label>
                <textarea name="reclamation" id="reclamation" required></textarea>

                <label for="opcao">Opção</label>
                <select name="opcao" id="opcao">
                    <option value="1">Reclamação</option>
                    <option value="2">Validação</option>
                    <option value="3">Viadation</option>
                    <option value="4">Graduation</option>
                </select>

                <label for="situacao">Situação</label>
                <select name="situacao" id="situacao">
                    <option value="1">Pendente</option>
                    <option value="2">Não Resolvido</option>
                    <option value="3">Parcialmente Resolvido</option>
                    <option value="4">Resolvido</option>
                </select>

                <button type="submit">Enviar</button>
            </form>
        </fieldset>
    </div>
</main>
</body>
</html>
