<html>
    <head>
        <title> Agregar </title>
        <link rel="stylesheet" href="tablas.css" />
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){
            $id=$_POST['id'];
            $monto=$_POST['monto'];
            $metodo_pago=$_POST['metodo_pago'];
            $fecha_pago=$_POST['fecha_pago'];


            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into pagos(id,monto,metodo_pago,fecha_pago)values('".$id."','".$monto."','".$metodo_pago."','".$fecha_pago."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('pagos.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('pagos.php');
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
    <h2>Agregar pago</h2>
    <div class="inputBx">
      <input type="text" placeholder="Nomumero de cita" name="id">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Monto a pagar" name="monto">
    </div>
    <div class="inputBx">
      <input type="text" placeholder="Metodo de pago" name="metodo_pago">
    </div>
    <div class="inputBx">
      <input type="datetime-local" placeholder="Fecha de pago" name="fecha_pago">
    </div>
    <div class="inputBx">
    <input type="submit" name="enviar" values="AGREGAR">
    </div>
    <div class="links">
            <a href="pagos.php">Regresar</a>
    </div>
  </div>
</div>
</form>

        <?php
            }
        ?>
    </body>
</html>