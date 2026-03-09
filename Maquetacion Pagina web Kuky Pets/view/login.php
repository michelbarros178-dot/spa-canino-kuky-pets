<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar sesión – Kuky Pets</title>
   <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="../styles/login.css" />
  <!-- Íconos Font Awesome -->
</head>
<body>

<!--ring div starts here-->
<form action="inicio.php" method="POST">
<div class="ring">
  <i style="--clr:#a8e8e8;"></i>
  <i style="--clr:#e5a774;"></i>
  </i>

  <div class="login">
    <h2>Iniciar Sesión</h2>
    <div class="inputBx">
      <input type="text" placeholder="Usuario" name="nombre_completo" required>
    </div>
    <div class="inputBx">
      <input type="password" placeholder="Contraseña" name="password" required>
    </div>
    <div class="inputBx">
   
    <input type="submit" value="Iniciar">
    </div>
    <div class="links">
    <a href="registrate.php" class="btn-gradiente">Registrarse</a>
    <a href="index.html" class="btn-gradiente-volver">Volver</a>
    </div>
  </div>
</div>
</form>
<!--ring div ends here-->
</body>
</html>