<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] ?></title>
    <link rel="stylesheet" href="<?= media() ?>/css/login.css">
</head>

<body>

    <div class="login-container">
        <div class="login-box">
            <h2>Iniciar sesión</h2>
            <form id="loginForm">
                <div class="textbox">
                    <input type="text" id="username" name="username" placeholder="Usuario" required>
                </div>
                <div class="textbox">
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>
        </div>
    </div>

    <script src="<?= media() ?>/js/login.js"></script>
</body>

</html>