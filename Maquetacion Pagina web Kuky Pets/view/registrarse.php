<?php 

include("../dashboard/model/conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $id_usuario = $_POST['id_usuario'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $estado =  $_POST['estado'];

    // Verificar conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

$sql = "INSERT INTO usuario(id_usuario, username, password, email, rol_id, estado)
        VALUES ('$id_usuario', '$username', '$password', '$email', 3, 'Activo')";


    if (mysqli_query($conexion, $sql)) {

        echo "<script>
                alert('Los datos se ingresaron exitosamente en la base de datos');
                location.assign('nuevo_login.php');
              </script>";

    } else {

        echo "<script>
                alert('Error al registrar usuario en la base de datos');
                location.assign('registrarse.php');
              </script>";
    }

}

?>
