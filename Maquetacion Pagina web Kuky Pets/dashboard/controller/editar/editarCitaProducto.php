<?php 
    include("../../model/conexion.php");

    // 1. Manejo del envío del formulario (POST)
    if(isset($_POST['enviar'])) {
        $id_cita_producto = $_POST['id_cita_producto'];
        $id_cita = $_POST['id_cita'];
        $id_producto = $_POST['id_producto'];
        $cantidad_usada = $_POST['cantidad_usada'];

        $sql = "UPDATE cita_producto SET 
                id_cita = '$id_cita', 
                id_producto = '$id_producto', 
                cantidad_usada = '$cantidad_usada' 
                WHERE id_cita_producto = '$id_cita_producto'";
        
        try {
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script>alert('Registro actualizado con éxito'); location.assign('../tablas/cita_producto.php');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script>alert('ERROR DE BASE DE DATOS: Verifique que la Cita y el Producto existan.'); window.history.back();</script>";
        }
        mysqli_close($conexion);
        exit;
    } 

    // 2. Carga inicial de datos (GET)
    if(isset($_GET['id_cita_producto'])) {
        $id_cita_producto = $_GET['id_cita_producto'];
        $sql = "SELECT * FROM cita_producto WHERE id_cita_producto = '$id_cita_producto'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        if (!$fila) {
            die("Error: No se encontró el registro con ID: " . htmlspecialchars($id_cita_producto));
        }
    } else {
        die("Error: No se recibió un ID válido.");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EDITAR CITA PRODUCTO</title>
    <link rel="stylesheet" href="../../../styles/EEA.css" />
</head>
<body>
    <div class="ring">
        <i style="--clr:#a8e8e8;"></i>
        <i style="--clr:#e5a774;"></i>
        <i style="--clr:#bef264;"></i>

        <div class="login">
            <h2>Editar Uso de Producto</h2>
            <form action="" method="POST">
                <div class="inputBx">
                    <input type="text" name="id_cita" value="<?php echo $fila['id_cita']; ?>" placeholder="ID de la Cita" required>
                </div>
                
                <div class="inputBx">
                    <input type="text" name="id_producto" value="<?php echo $fila['id_producto']; ?>" placeholder="ID del Producto" required>
                </div>
                
                <div class="inputBx">
                    <input type="number" name="cantidad_usada" value="<?php echo $fila['cantidad_usada']; ?>" placeholder="Cantidad Utilizada" required>
                </div>

                <input type="hidden" name="id_cita_producto" value="<?php echo $id_cita_producto; ?>">
                
                <div class="inputBx">
                    <input type="submit" name="enviar" value="ACTUALIZAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>