<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_empleado = $_POST['id_empleado'];
        $nombre_completo = $_POST['nombre_completo'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $id_usuario = $_POST['id_usuario'];
        $username = $_POST['username'];
        $rol_id = $_POST['rol_id'];

        $sql = "UPDATE empleados SET 
                nombre_completo = '$nombre_completo', 
                telefono = '$telefono', 
                correo = '$correo', 
                id_usuario = '$id_usuario', 
                username = '$username', 
                rol_id = '$rol_id' 
                WHERE id_empleado = '$id_empleado'";
        
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Empleado actualizado con éxito'); location.assign('../tablas/empleados.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: Verifique que el ID de usuario o Rol sean válidos.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)
    if(isset($_GET['id_empleado'])) {
        $id_empleado = $_GET['id_empleado'];
        $sql = "SELECT * FROM empleados WHERE id_empleado = '$id_empleado'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el empleado con ID: " . htmlspecialchars($id_empleado));
        }
    } else {
        die("Error: No se recibió un ID de empleado válido.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EDITAR EMPLEADO</title>
    <link rel="stylesheet" href="../../../styles/EEA.css" />
</head>
<body>
    <div class="ring">
        <i style="--clr:#a8e8e8;"></i>
        <i style="--clr:#e5a774;"></i>
        <i style="--clr:#bef264;"></i>

        <div class="login">
            <h2>Editar Empleado</h2>
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="nombre_completo" value="<?php echo $fila['nombre_completo']; ?>" placeholder="Nombre Completo" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>" placeholder="Teléfono" required>
                </div>
                
                <div class="inputBx">
                    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>" placeholder="Correo Electrónico" required>
                </div>

                <div class="inputBx">
                    <input type="text" name="id_usuario" value="<?php echo $fila['id_usuario']; ?>" placeholder="ID Usuario" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="username" value="<?php echo $fila['username']; ?>" placeholder="Nombre de Usuario" required>
                </div>

                <div class="inputBx">
                    <input type="text" name="rol_id" value="<?php echo $fila['rol_id']; ?>" placeholder="ID de Rol" required>
                </div>

                <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>