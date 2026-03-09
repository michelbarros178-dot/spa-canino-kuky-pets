<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_cliente = $_POST['id_cliente'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $id_usuario = $_POST['id_usuario'];
        $username = $_POST['username'];
        $rol_id = $_POST['rol_id'];

        $sql = "UPDATE clientes SET 
                nombre = '$nombre', 
                telefono = '$telefono', 
                email = '$email', 
                direccion = '$direccion', 
                id_usuario = '$id_usuario', 
                username = '$username', 
                rol_id = '$rol_id' 
                WHERE id_cliente = '$id_cliente'";
        
        // Usamos un try-catch para capturar el error de la clave externa
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Actualizado con éxito'); location.assign('../tablas/clientes.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: El username o ID de usuario no existe en el sistema.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)

    if(isset($_GET['id_cliente'])) {
        $id_cliente = $_GET['id_cliente'];
        $sql = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el cliente con ID: " . htmlspecialchars($id_cliente));
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
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" placeholder="Nombre completo">
                </div>
                <div class="inputBx">
                    <input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>" placeholder="Teléfono">
                </div>
                <div class="inputBx">
                    <input type="text" name="email" value="<?php echo $fila['email']; ?>" placeholder="Correo">
                </div>
                <div class="inputBx">
                    <input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>" placeholder="Dirección">
                </div>
                <div class="inputBx">
                    <input type="text" name="id_usuario" value="<?php echo $fila['id_usuario']; ?>" placeholder="ID Usuario">
                </div>
                <div class="inputBx">
                    <input type="text" name="username" value="<?php echo $fila['username']; ?>" placeholder="Username">
                </div>
                <div class="inputBx">
                    <input type="text" name="rol_id" value="<?php echo $fila['rol_id']; ?>" placeholder="Rol ID">
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