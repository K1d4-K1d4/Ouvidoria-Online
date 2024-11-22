<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../statics/style.css">
    <script src="../scripts/script.js" defer></script>
</head>
<body style="padding: 20px;">
        <form action="../scripts/login.php" method="POST">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required>
        <label for="CPF">CPF</label>
        <input type="text" name="cpf" id="cpf">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
        <button type="submit">Botão :3</button>
    </form>
    <?php 
    
    ?>
</body>
</html>