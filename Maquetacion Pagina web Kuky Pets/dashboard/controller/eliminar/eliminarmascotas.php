<?php 
    $mascotas_id = $_GET['mascotas_id'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from mascotas where mascotas_id='".$mascotas_id."'";
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