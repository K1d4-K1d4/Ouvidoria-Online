<?php
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

$login = "CREATE TABLE IF NOT EXISTS cadastro 
    (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255),
        senha VARCHAR(255),
        cpf VARCHAR(255),
        PRIMARY KEY (id)
    )
";

if (!mysqli_query($conexao, $login)) {
    die("Erro ao criar tabela: " . mysqli_error($conexao));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $cadastro = "INSERT INTO cadastro (nome, email, senha, cpf) 
                VALUES ('$name', '$email','$senha','$cpf')";

    if (!mysqli_query($conexao, $cadastro)) {
        die("Erro ao inserir dados: " . mysqli_error($conexao));
    }
}

mysqli_close($conexao);
?>
