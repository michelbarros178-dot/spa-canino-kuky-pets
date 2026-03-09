<html>
    <head>
        <title> Agregar </title>

    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){

            $nombre_completo=$_POST['nombre_completo'];
            $telefono=$_POST['telefono'];
            $correo=$_POST['correo'];
            $direccion=$_POST['direccion'];
            $password=$_POST['password'];
            $roles_id=$_POST['roles_id'];


            include("model/conexion.php");
            //insertar datos de la base de datos
            $sql="insert into usuarios(nombre_completo,telefono,correo,direccion,password,roles_id)values('".$nombre_completo."','".$telefono."','".$correo."','".$direccion."','".$password."','".$roles_id."')";


            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                //mensaje de alerta que los datos se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('usuarios.php');
                </script>";
            }else {
                //mensaje de alerta que los datos no se ingresaron exitosamente
                echo "<script lenguague='JavaScript'>
                alert('Los datos no se pudieron ingresar correctamente');
                location.assign('usuarios.php');
                </script>";
            }
            mysqli_close($conexion);
        }else{

        
        ?>

        <h1>Agregar Cliente</h1>
       <form method="POST">

    <label>Nombre completo</label>
    <input type="text" name="nombre_completo"><br><br>

    <label>Telefono</label>
    <input type="text" name="telefono"><br><br>

    <label>Correo</label>
    <input type="text" name="correo"><br><br>

    <label>Direccion</label>
    <input type="text" name="direccion"><br><br>

    <label>PASSWORD</label>
    <input type="text" name="password"><br><br>

    <label>ROL ID</label>
    <input type="number" name="roles_id"><br><br>

    <button type="submit" name="enviar">Enviar</button>

</form>


        <?php
            }
        ?>
    </body>
</html>