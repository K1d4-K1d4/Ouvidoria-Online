<!DOCTYPE html>
<html lang="pt-BR">
    <?php
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria Online</title>
    <link rel="stylesheet" href="../statics/style.css">
    <script src="../scripts/script.js" defer></script>
</head>

<body>

<header>
    <nav>
        <a href="login.php">login</a>
        <a href>HOME</a>
        <a href>HOME</a>
        <a href>HOME</a>
        <a href>HOME</a>

    </nav>
</header>

    <fieldset style="margin: 10px;">
        <legend>Receba</legend>
        <form action="../scripts/dados.php" method="POST" >
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="reclamation">Desktop</label>
            <textarea name="reclamation" id="reclamation" required></textarea>
            <label for="opcao">Ablubleble</label>
            <select name="opcao" id="opcao">
                <option value="1">Reclamation</option>
                <option value="2">Validation</option>
                <option value="3">Viadation</option>
                <option value="4">Graduation</option>
            </select>

            <label for="situacao">Situação</label>
            <select name="situacao" id="situacao">
                <option value="1">Pendente</option>
                <option value="2">Não Resolvido</option>
                <option value="3">Parcialmente Resolvido</option>
                <option value="4">Resolvido</option>
            </select>
            <br>
            <button type="submit">Botão :3</button>
        </form>
    </fieldset>
</body>
</html>
