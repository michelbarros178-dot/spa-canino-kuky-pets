<?php
include 'model/conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    // AGREGAR NUEVA MASCOTA
    if ($accion == 'agregar') {
        // Usamos los nombres de columnas de la tabla mascotas
        $sql = "INSERT INTO mascotas (id_cliente, nombre, raza, edad, peso) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['id_cliente'], 
            $_POST['nombre'], 
            $_POST['raza'],
            $_POST['edad'],
            $_POST['peso']
        ]);
    } 
    
    // EDITAR MASCOTA EXISTENTE
    elseif ($accion == 'editar') {
        // Se actualiza basándose en el id_mascota
        $sql = "UPDATE mascotas SET id_cliente = ?, nombre = ?, raza = ?, edad = ?, peso = ? WHERE id_mascota = ?";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $_POST['id_cliente'], 
            $_POST['nombre'], 
            $_POST['raza'], 
            $_POST['edad'],
            $_POST['peso'],
            $_POST['id_mascota'] // ID principal para el WHERE
        ]);
    } 
    
    // ELIMINAR REGISTRO DE MASCOTA
    elseif ($accion == 'eliminar') {
        try {
            $stmt = $pdo->prepare("DELETE FROM mascotas WHERE id_mascota = ?");
            $stmt->execute([$_POST['id_mascota']]);
        } catch (PDOException $e) {
            // Error común: la mascota tiene citas o historias clínicas vinculadas
            header("Location: mascotas.php?error=restringido_por_vinculos");
            exit();
        }
    }

    // Redirigir de vuelta a la página principal de mascotas
    header("Location: mascotas.php");
    exit();
}
?>