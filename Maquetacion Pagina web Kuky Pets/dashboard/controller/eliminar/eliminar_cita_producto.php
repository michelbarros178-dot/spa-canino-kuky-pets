<?php 
    $id_cita_producto = $_GET['id_cita_producto'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from cita_producto where id_cita_producto='".$id_cita_producto."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/cita_producto.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/cita_producto.php');
        </script>";
    }


?>