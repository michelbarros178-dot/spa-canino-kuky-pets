<?php
include 'model/conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if ($accion == 'agregar') {
        // Agregamos 'password' que es obligatorio para nuevos usuarios
        $sql = "INSERT INTO usuario (username, email, password, rol_id, estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['username'], 
            $_POST['email'], 
            $_POST['password'], 
            $_POST['rol_id'], 
            $_POST['estado']
        ]);
    } 
    
    elseif ($accion == 'editar') {
        $sql = "UPDATE usuario SET username = ?, email = ?, rol_id = ?, estado = ? WHERE id_usuario = ?";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $_POST['username'], 
            $_POST['email'], 
            $_POST['rol_id'], 
            $_POST['estado'], 
            $_POST['id_usuario'] // Este va de último porque es el WHERE
        ]);
    } 
    
    elseif ($accion == 'eliminar') {
        try {
            $stmt = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");
            $stmt->execute([$_POST['id_usuario']]);
        } catch (PDOException $e) {
            // Si hay error por llave foránea (empleados), redirigimos con aviso
            header("Location: index.php?error=no_se_puede_eliminar");
            exit();
        }
    }

    header("Location: index.php");
    exit();
}
?>