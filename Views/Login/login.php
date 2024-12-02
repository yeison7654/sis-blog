<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= media() ?>/css/login.css">
</head>

<body>

    <main>

        <div class="contenedor-todo">
            <div class="caja-trasera">
                <div class="caja-trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja-trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor-login-register">
                <!--Login-->
                <form action="" class="formulario-login">
                    <h2>Iniciar Sesión</h2>
                    <label for="txtUserName">User</label>
                    <input type="text" name="txtUserName" id="txtUserName">
                    <label for="txtPassword">Password</label>
                    <input type="password" name="txtPassword" id="txtPassword">
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="php/registro_usuario.php" method="post" class="formulario-register">
                    <h2>Regístrarse</h2>
                    <label for="txtUser">User</label>
                    <input type="text" name="txtUser" id="txtUser">
                     <label for="txtMail">E-Mail</label>
                    <input type="email" name="txtMail" id="txtMail">
                    <label for="txtPassword1">Password</label>
                    <input type="password" name="txtPassword1" id="txtPassword1">
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>

    </main>

    <script src="<?= media() ?>/js/login.js"></script>
</body>

</html>