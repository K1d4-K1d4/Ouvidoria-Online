<!DOCTYPE html>
<html lang="pt-BR">
<?php
session_start();
$conexao = mysqli_connect("localhost", "root", "", "banquinho");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

// Verificar se o usuário está logado
$aut = isset($_SESSION['usuario_login']);
if (!$aut) {
    header("Location: login.php");
    exit();
}

// Verificar se a tabela dados existe
$sqlCheckTable = "SHOW TABLES LIKE 'dados'";
$tableExists = mysqli_query($conexao, $sqlCheckTable);

if (mysqli_num_rows($tableExists) > 0) {
    // Se a tabela existir, buscar os dados
    $sql = "SELECT * FROM dados";
    $sql = "SELECT * FROM dados ORDER BY id DESC";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        die("Erro ao consultar mensagens: " . mysqli_error($conexao));
    }
} else {
    $resultado = false;
}
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
                <img src="/Ouvidoria-Online/statics/ouvidoria.png" alt="Ouvidoria">
            </a>
            <div class="nav-links">
                <a href="../templts/reclamaçoes.php">RECLAMAÇÕES</a>
                <?php if (!$aut): ?>
                    <a href="../templts/login.php">ENTRAR</a>
                    <a href="registro.php">CADASTRAR</a>
                <?php else: ?>
                    <div class="welcome-box">
                        Bem-vindo, <strong><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></strong>! <br>
                        Email: <strong><?php echo htmlspecialchars($_SESSION['usuario_email']); ?></strong><br>
                    </div>
                    <div class="nav-links">
                        <a href="../templts/logout.php">Sair</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <div class="messages-container">
            <h2>Reclamações Enviadas</h2>
            <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($resultado)): ?>


                    <div class="message">
  
                        <div class="situacao">
                            <p><strong><ins>Opção:</ins></strong>
                                <?php
                                switch ($row['opcao']) {
                                    case 1:
                                        echo 'Reclamação';
                                        break;
                                    case 2:
                                        echo 'Elogio';
                                        break;
                                    case 3:
                                        echo 'Sugestão';
                                        break;
                                    case 4:
                                        echo 'Denuncia';
                                        break;
                                    default:
                                        echo 'Não especificado';
                                        break;
                                }
                                ?>
                            </p>
                            <p><strong>ㅤㅤ<ins>Situação:</ins></strong>
                                <?php
                                switch ($row['situacao']) {
                                    case 1:
                                        echo 'Pendente';
                                        break;
                                    case 2:
                                        echo 'Não Resolvido';
                                        break;
                                    case 3:
                                        echo 'Parcialmente Resolvido';
                                        break;
                                    case 4:
                                        echo 'Resolvido';
                                        break;
                                    default:
                                        echo 'Não especificado';
                                        break;
                                }
                                ?>
                            </p>
                        </div>
                        <p><strong> <ins><?php echo htmlspecialchars($row['nome']); ?></ins>:
                            </strong><?php echo htmlspecialchars($row['reclamation']); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p><?php echo $resultado === false ? "A tabela 'dados' não existe no banco de dados." : "Nenhuma mensagem encontrada."; ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="interface">
            <form class="mandar" action="../scripts/dados.php" method="POST">
                <div class="container2">
                    <label for="opcao">Opção</label>
                    <select class="op" name="opcao" id="opcao">
                        <option value="1">Reclamação</option>
                        <option value="2">Elogio</option>
                        <option value="3">Sugestão</option>
                        <option value="4">Denuncia</option>
                    </select>

                    <label for="situacao">Situação</label>
                    <select class="op" name="situacao" id="situacao">
                        <option value="1">Pendente</option>
                        <option value="2">Não Resolvido</option>
                        <option value="3">Parcialmente Resolvido</option>
                        <option value="4">Resolvido</option>
                    </select>
                </div>

                <label for="reclamation">Diga-nos sua mensagem</label>
                <textarea name="reclamation" id="reclamation" required></textarea>

                <!-- Checkbox para envio anônimo -->
                <div>
                    <input type="checkbox" name="anonimo" id="anonimo">
                    <label for="anonimo">Enviar como anônimo</label>
                </div>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>

<footer>
    <p>i know your secrets ng</p>
</footer>

</body>

</html>