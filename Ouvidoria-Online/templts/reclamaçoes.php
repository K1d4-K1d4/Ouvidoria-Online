<?php
session_start();

$conexao = mysqli_connect("localhost", "root", "", "banquinho");
if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

if (!isset($_SESSION['usuario_login'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM dados WHERE nome = (SELECT nome FROM cadastro WHERE id = $usuario_id)";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro ao consultar mensagens: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens</title>
    <link rel="stylesheet" href="../statics/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="#" class="nav-logo">
                <img src="https://fundacao193.org.br/wp-content/uploads/2023/05/ouvidoria.png" alt="Ouvidoria">
            </a>
            <div class="nav-links">
                <a href="index.php">HOME</a>
                <a href="reclamaçoes.php">RECLAMAÇOES</a>
                <a href="logout.php">SAIR</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="messages-container">
            <h2>Reclamaçao Enviadas</h2>
            <?php if (mysqli_num_rows($resultado) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Reclamação</th>
                            <th>Opção</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($resultado)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['reclamation']); ?></td>
                                <td>
                                    <?php
                                        switch ($row['opcao']) {
                                            case 1: echo 'Reclamação'; break;
                                            case 2: echo 'Validação'; break;
                                            case 3: echo 'Viadation'; break;
                                            case 4: echo 'Graduação'; break;
                                            default: echo 'Não especificado'; break;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        switch ($row['situacao']) {
                                            case 1: echo 'Pendente'; break;
                                            case 2: echo 'Não Resolvido'; break;
                                            case 3: echo 'Parcialmente Resolvido'; break;
                                            case 4: echo 'Resolvido'; break;
                                            default: echo 'Não especificado'; break;
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhuma mensagem encontrada.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>

<?php
mysqli_close($conexao);
?>
