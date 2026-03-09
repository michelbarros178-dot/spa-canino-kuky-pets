<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_cancelacion = $_POST['id_cancelacion'];
        $id_cita = $_POST['id_cita'];
        $motivo = $_POST['motivo'];
        $fecha_cancelacion = $_POST['fecha_cancelacion'];

        $sql = "UPDATE cancelaciones SET 
                id_cita = '$id_cita', 
                motivo = '$motivo', 
                fecha_cancelacion = '$fecha_cancelacion' 
                WHERE id_cancelacion = '$id_cancelacion'";
        
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Cancelación actualizada con éxito'); location.assign('../tablas/cancelaciones.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: Verifique los datos ingresados.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)
    if(isset($_GET['id_cancelacion'])) {
        $id_cancelacion = $_GET['id_cancelacion'];
        $sql = "SELECT * FROM cancelaciones WHERE id_cancelacion = '$id_cancelacion'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró la cancelación con ID: " . htmlspecialchars($id_cancelacion));
        }
    } else {
        die("Error: No se recibió un ID de cancelación válido.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EDITAR CANCELACIÓN</title>
    <link rel="stylesheet" href="../../../styles/EEA.css" />
</head>
<body>
    <div class="ring">
        <i style="--clr:#a8e8e8;"></i>
        <i style="--clr:#e5a774;"></i>
        <i style="--clr:#bef264;"></i>

        <div class="login">
            <h2>Editar Cancelación</h2>
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="id_cita" value="<?php echo $fila['id_cita']; ?>" placeholder="ID de la Cita" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="motivo" value="<?php echo $fila['motivo']; ?>" placeholder="Motivo de cancelación" required>
                </div>
                
                <div class="inputBx">
                    <input type="datetime-local" name="fecha_cancelacion" value="<?php echo date('Y-m-d\TH:i', strtotime($fila['fecha_cancelacion'])); ?>" required>
                </div>

                <input type="hidden" name="id_cancelacion" value="<?php echo $id_cancelacion; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>