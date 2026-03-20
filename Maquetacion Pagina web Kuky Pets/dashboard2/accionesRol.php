<?php
include 'model/conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    // AGREGAR NUEVO ROL
    if ($accion == 'agregar') {
        // Usamos los nombres de columnas de la tabla rol
        $sql = "INSERT INTO rol (nombre, descripcion) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['nombre'], 
            $_POST['descripcion']
        ]);
    } 
    
    // EDITAR ROL EXISTENTE
    elseif ($accion == 'editar') {
        // Se actualiza basándose en el id_rol
        $sql = "UPDATE rol SET nombre = ?, descripcion = ? WHERE id_rol = ?";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $_POST['nombre'], 
            $_POST['descripcion'], 
            $_POST['id_rol'] // ID principal para el WHERE
        ]);
    } 
    
    // ELIMINAR ROL
    elseif ($accion == 'eliminar') {
        try {
            $stmt = $pdo->prepare("DELETE FROM rol WHERE id_rol = ?");
            $stmt->execute([$_POST['id_rol']]);
        } catch (PDOException $e) {
            // Error común: el rol está asignado a un usuario activo
            header("Location: roles.php?error=rol_en_uso");
            exit();
        }
    }

    // Redirigir de vuelta a la página de gestión de roles
    header("Location: roles.php");
    exit();
}
?>