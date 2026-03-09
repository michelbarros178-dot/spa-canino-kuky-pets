<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_cancelacion = $_POST['id_cancelacion'];
        $id_cita = $_POST['id_cita'];
        $motivo = $_POST['motivo'];
        $fecha_cancelacion = $_POST['fecha_cancelacion'];

        $sql = "UPDATE cancelar_cita SET 
                id_cita = '$id_cita', 
                motivo = '$motivo', 
                fecha_cancelacion = '$fecha_cancelacion', 
                WHERE id_cancelacion = '$id_cancelacion'";
        
        // Usamos un try-catch para capturar el error de la clave externa
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Actualizado con éxito'); location.assign('../tablas/cancelar_cita.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: El username o ID de usuario no existe en el sistema.'); window.history.back();</script>";

        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)

    if(isset($_GET['id_cancelacion'])) {
        $id_cancelacion = $_GET['id_cancelacion'];
        $sql = "SELECT * FROM cancelar_cita WHERE id_cancelacion = '$id_cancelacion'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el cliente con ID: " . htmlspecialchars($id_cancelacion));
        }
    } else {
        die("Error: No se recibió un ID de cliente válido.");
    }
?>

<html>
<head><title>EDITANDO CANCELAR CITAS</title></head>
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
                    <input type="text" name="id_cita" value="<?php echo $fila['id_cita']; ?>" placeholder="ID cita">
                </div>
                <div class="inputBx">
                    <input type="text" name="motivo" value="<?php echo $fila['motivo']; ?>" placeholder="Motivo">
                </div>
                <div class="inputBx">
                    <input type="text" name="fecha_cancelacion" value="<?php echo $fila['fecha_cancelacion']; ?>" placeholder="Fecha de la cancelación">
                </div>
                <input type="hidden" name="id_cancelacion" value="<?php echo $id_cancelacion; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>