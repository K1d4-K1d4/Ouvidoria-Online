<?php
$conexao = mysqli_connect("localhost", "root", "", "");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    if (!$conexao){
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
}
$conexao = mysqli_connect("localhost", "root", "", "banquinho");
if (!$conexao) {
    die("Erro ao conectar ao banco de dados 'banquinho': " . mysqli_connect_error());
}


$sql = "CREATE TABLE IF NOT EXISTS dados 
    (
        id INT NOT NULL AUTO_INCREMENT,
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
    $reclamation = mysqli_real_escape_string($conexao, $_POST["reclamation"]);
    $opcao = (int) $_POST["opcao"];
    $situacao = (int) $_POST["situacao"];

    $sql = "INSERT INTO dados (reclamation, opcao, situacao) 
            VALUES ('$reclamation', '$opcao','$situacao')
    ";

    if (!mysqli_query($conexao, $sql)) {
        die("Erro ao inserir dados: " . mysqli_error($conexao));
    }
}

mysqli_close($conexao);
?>