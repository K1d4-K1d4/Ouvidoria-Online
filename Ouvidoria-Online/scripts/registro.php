<?php
$conexao = mysqli_connect("localhost", "root", "", "");

if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

// Criando o banco de dados, se não existir
if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    $conexao = mysqli_connect("localhost", "root", "", "banquinho");
    if (!$conexao) {
        die("Erro ao conectar ao banco de dados 'banquinho': " . mysqli_connect_error());
    }
}

// Criando a tabela, se não existir
$login = "CREATE TABLE IF NOT EXISTS cadastro 
    (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255) UNIQUE,
        senha VARCHAR(255),
        PRIMARY KEY (id)
    )
";

if (!mysqli_query($conexao, $login)) {
    die("Erro ao criar tabela: " . mysqli_error($conexao));
}

// Cadastro de usuários
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conexao, $_POST["name"]);
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

    $cadastro = "INSERT INTO cadastro (nome, email, senha) VALUES ('$name', '$email', '$senha')";

    if (!mysqli_query($conexao, $cadastro)) {
        die("Erro ao inserir dados: " . mysqli_error($conexao));
    } else {
        echo "Usuário cadastrado com sucesso!";
    }

    // Redireciona para a página de login
    header("Location: ../templts/login.php");
    exit;
}

mysqli_close($conexao);
?>
