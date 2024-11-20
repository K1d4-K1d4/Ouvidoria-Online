<?php
$conexao = mysqli_connect("localhost", "root", "", "");

if (mysqli_query($conexao, "CREATE DATABASE IF NOT EXISTS banquinho")) {
    $conexao = mysqli_connect("localhost", "root", "", "banquinho");
} else {
    echo "banquinho quebrou<br>";
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

    $dento = "INSERT INTO dados(nome, email, remedio) 
                VALUES ('$name', '$email', '$reclamation',)";

    if (mysqli_query($conexao, $dento)) {
        echo "Deu Certo!";
    } else {
        echo "Falhou :(" . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>



