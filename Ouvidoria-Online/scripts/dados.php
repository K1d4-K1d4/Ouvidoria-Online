<?php
session_start();

if (!isset($_SESSION['usuario_login'])) {
    header("Location: ../templts/login.php");
    exit();
}

$conexao = mysqli_connect("localhost", "root", "", "banquinho");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS dados 
    (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        reclamation VARCHAR(255),
        opcao INT,
        situacao INT,
        PRIMARY KEY (id)
    )
";

if (!mysqli_query($conexao, $sql)) {
    die("Erro ao criar tabela: " . mysqli_error($conexao));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reclamation = $_POST["reclamation"];
    $opcao = (int) $_POST["opcao"];
    $situacao = (int) $_POST["situacao"];
    $usuario_nome = $_SESSION['usuario_nome'];

    $sql = "INSERT INTO dados (nome, reclamation, opcao, situacao) 
            VALUES ('$usuario_nome', '$reclamation', '$opcao', '$situacao')";

    if (!mysqli_query($conexao, $sql)) {
        die("Erro ao inserir dados: " . mysqli_error($conexao));
    }

    header("Location: ../templts/index.php");
    exit();
}

mysqli_close($conexao);
?>
