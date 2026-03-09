<html>
    <head>
        <title> Agregar </title>
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){
            $cedula_cli=$_POST['cedula_cli'];
            $nombre_completo=$_POST['nombre_completo'];
            $telefono=$_POST['telefono'];
            $correo=$_POST['correo'];
            $direccion=$_POST['direccion'];
            $password=$_POST['password'];


            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into clientes(cedula_cli,nombre_completo,telefono,correo,direccion,password)values('".$cedula_cli."','".$nombre_completo."','".$telefono."','".$correo."','".$direccion."','".$password."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('clientes.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('clientes.php');
                </script>";
            }
            mysqli_close($conexion);
        }else{

        
        ?>

        <h1>Agregar Cliente</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <label for="">cedula_cli</label>
            <input type="text" name="cedula_cli"><br>
            <label for="">Nombre completo</label>
            <input type="text" name="nombre_completo">
            <label for="">Telefono</label>
            <input type="text" name="telefono">
            <label for="">Correo</label>
            <input type="text" name="correo">
            <label for="">Direccion</label>
            <input type="text" name="direccion">
            <label for="">password</label>
            <input type="text" neme="password">
            <label for="">n</label>
            <input type="text" neme="n">
            
            <input type="submit" name="enviar" values="AGREGAR">
            <a href="clientes.php">Regresar</a>
        </form>

        <?php
            }
        ?>
    </body>
</html>