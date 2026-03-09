<html>
    <head>
        <title> Agregar </title>
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){
            $cancelar_id=$_POST['cancelar_id'];
            $citas_id=$_POST['citas_id'];
            $motivo=$_POST['motivo'];
            $fecha_cancelacion=$_POST['fecha_cancelacion'];


            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into cancelar_cita(cancelar_id,citas_id,motivo,fecha_cancelacion)values('".$cancelar_id."','".$citas_id."','".$motivo."','".$fecha_cancelacion."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('eliminar_cita.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('eliminar_cita.php');
                </script>";
            }
            mysqli_close($conexion);
        }else{

        
        ?>

        <h1>Cancelar cita</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <label for="">Numero</label>
            <input type="text" name="cancelar_id"><br>
            <label for="">Citas_id</label>
            <input type="text" name="citas_id">
            <label for="">Motivo</label>
            <input type="text" name="motivo">
            <label for="">Fecha de la cancelacion</label>
            <input type="datetime-local" name="fecha_cancelacion">
            
            <input type="submit" name="enviar" values="AGREGAR">
            <a href="eliminar_cita.php">Regresar</a>
        </form>

        <?php
            }
        ?>
    </body>
</html>