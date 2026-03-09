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

        $sql = "UPDATE clientes SET 
                usuario = '$usuario', 
                contraseña = '$contraseña', 
                correo = '$correo', 
                rol_id = '$rol_id', 
                id_usuario = '$id_usuario', 
                nombre = '$nombre', 
                WHERE id_admin = '$id_admin'";
        
        // Usamos un try-catch para capturar el error de la clave externa
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Actualizado con éxito'); location.assign('../tablas/admin.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: El username o ID de usuario no existe en el sistema.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)

    if(isset($_GET['id_admin'])) {
        $id_admin = $_GET['id_admin'];
        $sql = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el cliente con ID: " . htmlspecialchars($id_admin));
        }
    } else {
        die("Error: No se recibió un ID de cliente válido.");
    }
?>

<html>
<head><title>EDITAR CLIENTE</title></head>
<link rel="stylesheet" href="../../../styles/EEA.css" />
<body>
    <div class="ring">
  <i style="--clr:#a8e8e8;"></i>
  <i style="--clr:#e5a774;"></i>
  </i>

  <div class="login">
            <h2>Editar cliente</h2>
            <form method="post">
                <div class="inputBx">
                    <input type="text" name="usuario" value="<?php echo $fila['usuario']; ?>" placeholder="Usuario">
                </div>
                <div class="inputBx">
                    <input type="text" name="contraseña" value="<?php echo $fila['contraseña']; ?>" placeholder="Contraseña">
                </div>
                <div class="inputBx">
                    <input type="text" name="correo" value="<?php echo $fila['correo']; ?>" placeholder="Correo">
                </div>
                <div class="inputBx">
                    <input type="text" name="rol_id" value="<?php echo $fila['rol_id']; ?>" placeholder="Rol id">
                </div>
                <div class="inputBx">
                    <input type="text" name="id_usuario" value="<?php echo $fila['id_usuario']; ?>" placeholder="ID Usuario">
                </div>
                <div class="inputBx">
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" placeholder="Nombre">
                </div>

                <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>