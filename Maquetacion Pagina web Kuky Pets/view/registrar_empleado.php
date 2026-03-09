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
<form action="registrarse.php" method="POST">
<div class="ring">
  <i style="--clr:#ff9900;"></i>
  <i style="--clr:#00fffb;"></i>
  </i>
  <div class="login">
    <h2>Registro empleados</h2><br>
    <div class="inputBx">
      <input type="text" placeholder="Usuario" name="username" required>
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Contraseña" name="password_hash" required>
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Correo" name="email" required>
    </div>
    <div class="inputBx">


   
    <input type="submit" value="Registrarse">
  </div>
</div>

</form>
<!--ring div ends here-->
</body>
</html>