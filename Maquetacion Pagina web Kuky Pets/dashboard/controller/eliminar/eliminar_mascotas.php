<?php 
    $id_mascota = $_GET['id_mascota'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from mascotas where id_mascota='".$id_mascota."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/mascotas.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/mascotas.php');
        </script>";
    }


?>