<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Iniciar sesión – Kuky Pets</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
    <!--Stylesheet-->
    <link rel="stylesheet" href="../styles/lg.css">
</head>
<body >
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="formulario" id="formulario" action="inicio.php" method="POST">
        <h3>INCIO DE SESIÓN</h3>

        <div class="inputBx" id="grupo__username">
        <label for="username">Usuario</label>
        <input type="text" id="username"  placeholder="Ej: Juan Pérez" name="username" required>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <div class="inputBx" id="grupo__password">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ej: 123456" name="password" required>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <div class="inputBx">
        <button type="submit">Iniciar Sesión</button>
        </div>
        <div class="social">
        <a href="registrate.php"></a><div class="fb"></i>Registrarse</div>
          <a href="index.html"><div class="fb"></i>volver</div></a>
        </div>
    </form>
    <script src="../js/registrarse_validaciones.js"></script>
</body>
</html>