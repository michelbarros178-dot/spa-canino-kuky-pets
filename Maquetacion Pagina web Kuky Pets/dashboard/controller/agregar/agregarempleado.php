<html>
    <head>
        <title> Agregar </title>
          <link rel="stylesheet" href="tablas.css" />
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){
            $cedula_em=$_POST['cedula_em'];
            $nombre_completo=$_POST['nombre_completo'];
            $telefono=$_POST['telefono'];
            $correo=$_POST['correo'];


            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into empleados(cedula_em,nombre_completo,telefono,correo)values('".$cedula_em."','".$nombre_completo."','".$telefono."','".$correo."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('empleada.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('empleada.php');
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
    <h2>Agregar empleado</h2>
    <div class="inputBx">
      <input type="text" placeholder="Cedula"  name="cedula_em">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Nombre completo" name="nombre_completo">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Celular" name="telefono">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Correo" name="correo">
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