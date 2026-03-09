<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_admin = $_POST['id_admin'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $correo = $_POST['correo'];
        $rol_id = $_POST['rol_id'];
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];

        $sql = "UPDATE administradores SET 
                usuario = '$usuario', 
                contraseña = '$contraseña', 
                correo = '$correo', 
                rol_id = '$rol_id', 
                id_usuario = '$id_usuario', 
                nombre = '$nombre' 
                WHERE id_admin = '$id_admin'";
        
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Administrador actualizado con éxito'); location.assign('../tablas/administradores.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: Verifique que el ID de usuario o Rol sean válidos.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)
    if(isset($_GET['id_admin'])) {
        $id_admin = $_GET['id_admin'];
        $sql = "SELECT * FROM administradores WHERE id_admin = '$id_admin'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el administrador con ID: " . htmlspecialchars($id_admin));
        }
    } else {
        die("Error: No se recibió un ID de administrador válido.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EDITAR ADMINISTRADOR</title>
    <link rel="stylesheet" href="../../../styles/EEA.css" />
</head>
<body>
    <div class="ring">
        <i style="--clr:#a8e8e8;"></i>
        <i style="--clr:#e5a774;"></i>
        <i style="--clr:#bef264;"></i>

        <div class="login">
            <h2>Editar Administrador</h2>
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" placeholder="Nombre Completo" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="usuario" value="<?php echo $fila['usuario']; ?>" placeholder="Usuario" required>
                </div>
                
                <div class="inputBx">
                    <input type="password" name="contraseña" value="<?php echo $fila['contraseña']; ?>" placeholder="Contraseña" required>
                </div>

                <div class="inputBx">
                    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>" placeholder="Correo Electrónico" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="rol_id" value="<?php echo $fila['rol_id']; ?>" placeholder="Rol ID" required>
                </div>

                <div class="inputBx">
                    <input type="text" name="id_usuario" value="<?php echo $fila['id_usuario']; ?>" placeholder="ID Usuario Relacionado" required>
                </div>

                <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>