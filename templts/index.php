<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria Online</title>
    <link rel="stylesheet" href="/Ouvidoria-Online/statics/style.css">
    <script src="../scripts/script.js" defer></script>
</head>

<body>

<header>
    <nav>
        <a href>HOME</a>
        <a href>HOME</a>
        <a href>HOME</a>
        <a href>HOME</a>
        <a href>HOME</a>
    
    </nav>
</header>

    <fieldset>
        <legend>Receba</legend>
        <form action="../scripts/script.php" method="POST">
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
            <br>
            <button type="submit">Botão :3</button>

        </form>
    </fieldset>
</body>
</html>
