<?php
include 'model/conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    // AGREGAR NUEVA CANCELACIÓN
    if ($accion == 'agregar') {
        // Usamos los nombres de columnas: citas_id, motivo, fecha_cancelacion
        $sql = "INSERT INTO cancelar_cita (citas_id, motivo, fecha_cancelacion) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['citas_id'], 
            $_POST['motivo'], 
            $_POST['fecha_cancelacion']
        ]);
    } 
    
    // EDITAR CANCELACIÓN EXISTENTE
    elseif ($accion == 'editar') {
        // Se actualiza basándose en el ID del registro de cancelación
        $sql = "UPDATE cancelar_cita SET id_cita = ?, motivo = ?, fecha_cancelacion = ? WHERE id_cancelacion = ?";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $_POST['id_cita'], 
            $_POST['motivo'], 
            $_POST['fecha_cancelacion'], 
            $_POST['id_cancelacion'] // ID principal para el WHERE
        ]);
    } 
    
    // ELIMINAR REGISTRO DE CANCELACIÓN
    elseif ($accion == 'eliminar') {
        try {
            $stmt = $pdo->prepare("DELETE FROM cancelar_cita WHERE id_cancelacion = ?");
            $stmt->execute([$_POST['id_cancelacion']]);
        } catch (PDOException $e) {
            // Manejo de error por si el registro está vinculado a otra tabla
            header("Location: eliminar_cita.php?error=no_se_puede_eliminar");
            exit();
        }
    }

    // Redirigir de vuelta a la página de cancelaciones
    header("Location: eliminar_cita.php");
    exit();
}
?>