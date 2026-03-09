<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_confirmacion = $_POST['id_confirmacion'];
        $id_cita = $_POST['id_cita'];
        $fecha = $_POST['fecha'];

        $sql = "UPDATE confirmaciones SET 
                id_cita = '$id_cita', 
                fecha = '$fecha' 
                WHERE id_confirmacion = '$id_confirmacion'";
        
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Confirmación actualizada con éxito'); location.assign('../tablas/confirmaciones.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: Verifique que el ID de cita sea válido.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)
    if(isset($_GET['id_confirmacion'])) {
        $id_confirmacion = $_GET['id_confirmacion'];
        $sql = "SELECT * FROM confirmaciones WHERE id_confirmacion = '$id_confirmacion'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró la confirmación con ID: " . htmlspecialchars($id_confirmacion));
        }
    } else {
        die("Error: No se recibió un ID de confirmación válido.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EDITAR CONFIRMACIÓN</title>
    <link rel="stylesheet" href="../../../styles/EEA.css" />
</head>
<body>
    <div class="ring">
        <i style="--clr:#a8e8e8;"></i>
        <i style="--clr:#e5a774;"></i>
        <i style="--clr:#bef264;"></i>

        <div class="login">
            <h2>Editar Confirmación</h2>
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="id_cita" value="<?php echo $fila['id_cita']; ?>" placeholder="ID de la Cita" required>
                </div>
                
                <div class="inputBx">
                    <input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($fila['fecha'])); ?>" required>
                </div>

                <input type="hidden" name="id_confirmacion" value="<?php echo $id_confirmacion; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>