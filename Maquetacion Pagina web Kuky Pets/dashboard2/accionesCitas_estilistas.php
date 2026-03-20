<?php
include 'model/conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    // AGREGAR NUEVA CITA
    if ($accion == 'agregar') {
        $sql = "INSERT INTO citas (fecha, hora, id_mascota, id_servicio, id_empleado, estado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['fecha'], 
            $_POST['hora'], 
            $_POST['id_mascota'], 
            $_POST['id_servicio'], 
            $_POST['id_empleado'],
            $_POST['estado']
        ]);
    } 
    
    // EDITAR CITA EXISTENTE
    elseif ($accion == 'editar') {
        $sql = "UPDATE citas SET fecha = ?, hora = ?, id_mascota = ?, id_servicio = ?, id_empleado = ?, estado = ? WHERE id_cita = ?";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $_POST['fecha'], 
            $_POST['hora'], 
            $_POST['id_mascota'], 
            $_POST['id_servicio'], 
            $_POST['id_empleado'],
            $_POST['estado'],
            $_POST['id_cita'] // El ID de la cita para el WHERE
        ]);
    } 
    
    // ELIMINAR CITA
    elseif ($accion == 'eliminar') {
        try {
            $stmt = $pdo->prepare("DELETE FROM cita WHERE id_cita = ?");
            $stmt->execute([$_POST['id_cita']]);
        } catch (PDOException $e) {
            // Error en caso de que la cita tenga restricciones de llave foránea (ej. en facturas)
            header("Location: index.php?error=no_se_puede_eliminar_cita");
            exit();
        }
    }

    // Redirigir de vuelta a la página principal de citas
    header("Location: index.php"); 
    exit();
}
?>