<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id = $_POST['id'];
        $id_cita = $_POST['id_cita'];
        $id_servicio = $_POST['id_servicio'];

        $sql = "UPDATE cita_servicio SET 
                id_cita = '$id_cita', 
                id_servicio = '$id_servicio' 
                WHERE id = '$id'";
        
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Relación cita-servicio actualizada'); location.assign('../tablas/cita_servicio.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: Verifique que la cita y el servicio existan.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM cita_servicio WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el registro con ID: " . htmlspecialchars($id));
        }
    } else {
        die("Error: No se recibió un ID válido.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EDITAR CITA SERVICIO</title>
    <link rel="stylesheet" href="../../../styles/EEA.css" />
</head>
<body>
    <div class="ring">
        <i style="--clr:#a8e8e8;"></i>
        <i style="--clr:#e5a774;"></i>
        <i style="--clr:#bef264;"></i>

        <div class="login">
            <h2>Editar Servicio de Cita</h2>
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="id_cita" value="<?php echo $fila['id_cita']; ?>" placeholder="ID de la Cita" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="id_servicio" value="<?php echo $fila['id_servicio']; ?>" placeholder="ID del Servicio" required>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>