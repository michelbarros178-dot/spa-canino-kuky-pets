<?php
include 'model/conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    // AGREGAR NUEVO SERVICIO
    if ($accion == 'agregar') {
        $sql = "INSERT INTO categoria_servicio (id_categoria, categoria, descripcion, nombre_servicio) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['id_categoria'], 
            $_POST['categoria'], 
            $_POST['descripcion'], 
            $_POST['nombre_servicio']
        ]);
    } 
    
    // EDITAR SERVICIO EXISTENTE
    elseif ($accion == 'editar') {
        $sql = "UPDATE categoria_servicio SET id_categoria = ?, categoria = ?, descripcion = ?, nombre_servicio = ? WHERE id_servicio = ?";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $_POST['id_categoria'], 
            $_POST['categoria'], 
            $_POST['descripcion'], 
            $_POST['nombre_servicio'], 
            $_POST['id_servicio'] // El ID del servicio para el WHERE
        ]);
    } 
    
    // ELIMINAR SERVICIO
    elseif ($accion == 'eliminar') {
        try {
            $stmt = $pdo->prepare("DELETE FROM categoria_servicio WHERE id_servicio = ?");
            $stmt->execute([$_POST['id_servicio']]);
        } catch (PDOException $e) {
            // Error por si el servicio está siendo usado en otra tabla (ej. citas o ventas)
            header("Location: index.php?error=no_se_puede_eliminar_servicio");
            exit();
        }
    }

    // Redirigir de vuelta a la página principal
    header("Location: categoriaServicio.php");
    exit();
}
?>