<?php 
    $id_servicio_producto = $_GET['id_servicio_producto'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from servicio_producto where id_servicio_producto='".$id_servicio_producto."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/servicio_producto.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/servicio_producto.php');
        </script>";
    }


?>