<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrate – Kuky Pets</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/lg.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="formulario" id="formulario" action="registrarse.php" method="POST">
        <h3>REGÍSTRATE</h3>

        <div class="inputBx" id="grupo__username">
            <label for="username">Usuario</label>
            <input type="text" id="username" placeholder="Usuario" name="username" required>
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>

        <div class="inputBx" id="grupo__password">
            <label for="password">Contraseña</label>
            <input type="password" id="password" placeholder="Mínimo 4 caracteres" name="password" required>
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>

        <div class="inputBx" id="grupo__email">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" placeholder="ejemplo@correo.com" name="email" required>
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>

        <div class="inputBx">
            <span class="button-name">¿Ya tienes una cuenta? <a href="nuevo_login.php">Inicia sesión aquí</a></span>
            <button type="submit">Crear Cuenta</button>
        </div>

        <div class="social">
            <a href="login.php" style="text-decoration: none;">
                <a href="nuevo_login.php"><div class="fb">Volver</div></a>
            </a>
        </div>
    </form>

    <script src="../js/registrarse_validaciones.js"></script>
</body>
</html>