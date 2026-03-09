<?php 
    $servicio_id = $_GET['servicio_id'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from servicios where servicio_id='".$servicio_id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/servicios.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/servicios.php');
        </script>";
    }


?>