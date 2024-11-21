<?php
$conexao = mysqli_connect("localhost", "root", "");

// Criando o banco de dados "banquinho" se não existir
if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    // Selecionando o banco de dados
    mysqli_select_db($conexao, "banquinho");

    // Criando a tabela 'dados' se não existir
    $sql = "CREATE TABLE IF NOT EXISTS dados (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255),
        reclamacao VARCHAR(255),
        PRIMARY KEY (id)
    )";

    if (!mysqli_query($conexao, $sql)) {
        echo "Erro ao criar a tabela: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao criar o banco de dados: " . mysqli_error($conexao);
    exit; // Se não conseguir criar o banco, pare a execução do script
}


mysqli_select_db($conexao, "banquinho");

mysqli_query($conexao, 
    "CREATE TABLE IF NOT EXISTS dados (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255),
        reclamation VARCHAR(255),
        PRIMARY KEY (id)
    )"
);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reclamation = $_POST["reclamation"];

    $dento = "INSERT INTO dados(nome, email, reclamation) 
                VALUES ('$name', '$email', '$reclamation',)";

    if (mysqli_query($conexao, $dento)) {
        echo "Deu Certo!";
    } else {
        echo "Falhou :(" . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>



