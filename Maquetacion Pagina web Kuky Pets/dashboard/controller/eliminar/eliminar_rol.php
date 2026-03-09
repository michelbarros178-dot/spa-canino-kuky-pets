<?php 
    $id_rol = $_GET['id_rol'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from rol where id_rol='".$id_rol."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/rol.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/rol.php');
        </script>";
    }


?>