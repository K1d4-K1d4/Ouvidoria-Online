<?php
$conexao = mysqli_connect("localhost", "root", "", "");
if (!$conexao) {
    die("Erro :( " . mysqli_connect_error());
}

/*
    ECHO NAO NECESSARIO, CODIGO APENAS PARA PROCESSAMENTO DE DADOS, DEVE ENVIAR O CLIENTE PARA A PRÓXIMA PÁGINA ANTES DE APARECER
*/
if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    echo 'Banco de dados "banquinho" criado com sucesso.<br>';
    $conexao = mysqli_connect("localhost", "root", "", "banquinho");
    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }


$login = "
    CREATE TABLE IF NO EXISTS cadastro (
        id INT NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255),
        cpf VACHAR(255),
        PRIMARY KEY (id)
    )
";

$sql = "
    CREATE TABLE IF NOT EXISTS dados (
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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    
    $reclamation = $_POST["reclamation"];
    $opcao = (int) $_POST["opcao"];
    $situacao = (int) $_POST["situacao"];

    $cadastro = "INSERT INTO dados (nome, email, cpf) 
                 VALUES ('$name', '$email','$cpf')
    ";
    $sql = "INSERT INTO dados (reclamation, opcao, situacao) 
            VALUES ('$reclamation', '$opcao','$situacao')
    ";
}
/* TESTE PARA SABER SE O CÓDIGO ESTÁ FUNCIONANDO CORRETAMENTE
    if (mysqli_query($conexao, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro :( " . mysqli_error($conexao);
    }
}
*/
}
mysqli_close($conexao);
?>