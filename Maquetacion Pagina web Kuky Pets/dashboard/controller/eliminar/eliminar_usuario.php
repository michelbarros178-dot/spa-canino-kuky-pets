<?php 
    $id_usuario = $_GET['id_usuario'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from usuario where id_usuario='".$id_usuario."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/usuario.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/usuario.php');
        </script>";
    }


?>