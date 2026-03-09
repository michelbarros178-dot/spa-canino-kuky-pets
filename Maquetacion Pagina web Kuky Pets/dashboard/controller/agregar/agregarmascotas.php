<html>
    <head>
        <title> Agregar </title>
        <link rel="stylesheet" href="tablas.css" />
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){
            $nombre=$_POST['nombre'];
            $raza=$_POST['raza'];
            $especie=$_POST['especie'];
            $cedula_cli=$_POST['cedula_cli'];


            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into mascotas(nombre,raza,especie,cedula_cli)values('".$nombre."','".$raza."','".$especie."','".$cedula_cli."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('mascotas.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('mascotas.php');
                </script>";
            }
            mysqli_close($conexion);
        }else{

        
        ?>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">

        <div class="ring">
  <i style="--clr:#ff9900;"></i>
  <i style="--clr:#00fffb;"></i>
  </i>
  <div class="login">
    <h2>Agregar mascota</h2>
    <div class="inputBx">
      <input type="text" placeholder="Nombre de la mascota" name="nombre">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Raza" name="raza">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Especie" name="especie">
    </div>
    <div class="inputBx">
      <input type="number" placeholder="Cedula del propietario" name="cedula_cli">
    </div>
    <div class="inputBx">
   
    <input type="submit" name="enviar" values="AGREGAR">
    </div>
    <div class="links">
            <a href="clientes.php">Regresar</a>
    </div>
  </div>
</div>
</form>

        <?php
            }
        ?>
    </body>
</html>