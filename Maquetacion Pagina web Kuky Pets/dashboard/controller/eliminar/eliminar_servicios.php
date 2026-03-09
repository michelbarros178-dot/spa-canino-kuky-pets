<?php 
    $id_servicio = $_GET['id_servicio'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from servicios where id_servicio='".$id_servicio."'";
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