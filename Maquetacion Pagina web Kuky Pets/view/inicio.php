<?php
require_once "../dashboard/model/conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['nombre_completo'];
    $password_hash = $_POST['password'];

    // Consulta para buscar usuario
    $sql = "SELECT * FROM usuario WHERE username = '$username'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $user = mysqli_fetch_assoc($resultado);

        // Validar contraseña
        if ($password_hash == $user['password_hash']) {

            $_SESSION['usuario_id'] = $user['usuario_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['rol_id'] = $user['rol_id'];
            

            // Redirecciones por rol
            if ($user['rol_id'] == 1) {
                echo "<script>
                    alert('Inicio de sesión exitoso');
                    location.assign('../dashboard/clientes.php');
                </script>";
            } elseif ($user['rol_id'] == 2) {
                header("Location: ../dashboard/citasestilista.php");
            } elseif ($user['rol_id'] == 3) {
                header("Location: bienvenida.html");
            } else {
                echo "Acceso denegado";
            }
            exit();
        } else {
            echo "Credenciales incorrectas";
        }

    } else {
        echo "Usuario no encontrado";
    }
}
?>
