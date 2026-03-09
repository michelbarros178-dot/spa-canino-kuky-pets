<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_cita = $_POST['id_cita'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $id_mascota = $_POST['id_mascota'];
        $id_servicio = $_POST['id_servicio'];
        $id_empleado = $_POST['id_empleado'];
        $estado = $_POST['estado'];
        $nombre_cliente = $_POST['nombre_cliente'];

        $sql = "UPDATE citas SET 
                fecha = '$fecha', 
                hora = '$hora', 
                id_mascota = '$id_mascota', 
                id_servicio = '$id_servicio', 
                id_empleado = '$id_empleado', 
                estado = '$estado', 
                nombre_cliente = '$nombre_cliente' 
                WHERE id_cita = '$id_cita'";
        
        // Usamos un try-catch para capturar el error de la clave externa
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Actualizado con éxito'); location.assign('../tablas/citas.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: El username o ID de usuario no existe en el sistema.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)

    if(isset($_GET['id_cita'])) {
        $id_cita = $_GET['id_cita'];
        $sql = "SELECT * FROM citas WHERE id_cita = '$id_cita'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el cliente con ID: " . htmlspecialchars($id_cita));
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
                    <input type="text" name="fecha" value="<?php echo $fila['fecha']; ?>" placeholder="Fecha">
                </div>
                <div class="inputBx">
                    <input type="text" name="hora" value="<?php echo $fila['hora']; ?>" placeholder="hora">
                </div>
                <div class="inputBx">
                    <input type="text" name="id_mascota" value="<?php echo $fila['id_mascota']; ?>" placeholder="ID mascota">
                </div>
                <div class="inputBx">
                    <input type="text" name="id_servicio" value="<?php echo $fila['id_servicio']; ?>" placeholder="ID servicio">
                </div>
                <div class="inputBx">
                    <input type="text" name="id_empleado" value="<?php echo $fila['id_empleado']; ?>" placeholder="ID empleado">
                </div>
                <div class="inputBx">
                    <input type="text" name="estado" value="<?php echo $fila['estado']; ?>" placeholder="Estado">
                </div>
                <div class="inputBx">
                    <input type="text" name="nombre_cliente" value="<?php echo $fila['nombre_cliente']; ?>" placeholder="Nombre cliente">
                </div>

                <input type="hidden" name="id_cita" value="<?php echo $id_cita; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>