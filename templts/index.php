<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouvidoria Online | bom dia Aqui!</title>
    <link rel="stylesheet" href="../statics/style.css">
    <script src="../templts/script.js" defer></script>
</head>
<body>
    <div class="header" id="header">
        <button onclick="toggleSidebar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
            </svg>
        </button>
        <div class="header-title">Ouvidoria Online</div>
        <div id="navigation_header" class="navigation_header">
            <button onclick="toggleSidebar()" class="btn_icon_header">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
            <a href="#" class="active">Home</a>
            <a href="#">Login</a>
            <a href="#">Sobre nós</a>
            <a href="#">Contato</a>
        </div>
        <div class="logo_header">
            <img src="" class="img_logo_header" alt="Logo">
        </div>
    </div>

    <fieldset>
        <legend>Receba</legend>
        <form action="../scripts/script.php" method="POST">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="reclamation">Desktop</label>
            <textarea name="reclamation" id="reclamation" required></textarea>
            <label for="oq">Ablubleble</label>
            <select name="oq" id="opcao">
                <option value="1">Reclamation</option>
                <option value="2">Validation</option>
                <option value="3">Viadation</option>
                <option value="4">Graduation</option>
            </select>
            <button type="submit">Botão :3</button>
        </form>
    </fieldset>
</body>
</html>
