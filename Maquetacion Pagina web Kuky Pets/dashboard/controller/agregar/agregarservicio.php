<html>
    <head>
        <title> Agregar </title>
        <link rel="stylesheet" href="tablas.css" />
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){
            $nombre_servicio=$_POST['nombre_servicio'];
            $descripcion=$_POST['descripcion'];



            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into servicios(nombre_servicio,descripcion)values('".$nombre_servicio."','".$descripcion."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('servicios.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('servicios.php');
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
    <h2>Agregar servicio</h2>
    <div class="inputBx">
      <input type="text" placeholder="Nombre del servicio" name="nombre_servicio">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Descripción" name="descripcion">
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