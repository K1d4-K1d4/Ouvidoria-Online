<?php
$conexao = mysqli_connect("localhost", "root", "", "");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    echo 'Banco de dados "banquinho" criado com sucesso.<br>';
    $conexao = mysqli_connect("localhost", "root", "", "banquinho");
    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

$sql = "
    CREATE TABLE IF NOT EXISTS dados (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255),
        reclamation VARCHAR(255),
        opcao INT,
        PRIMARY KEY (id)
    )
";
if (!mysqli_query($conexao, $sql)) {
    die("Erro ao criar tabela: " . mysqli_error($conexao));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reclamation = $_POST["reclamation"];
    $opcao = (int) $_POST["opcao"];

    $sql = "
        INSERT INTO dados (nome, email, reclamation, opcao) 
        VALUES ('$name', '$email', '$reclamation', $opcao)
    ";
    if (mysqli_query($conexao, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro :( " . mysqli_error($conexao);
    }
}
}
mysqli_close($conexao);
?>