<?php 
    $id_producto = $_GET['id_producto'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from productos where id_producto='".$id_producto."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/productos.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/productos.php');
        </script>";
    }


?>