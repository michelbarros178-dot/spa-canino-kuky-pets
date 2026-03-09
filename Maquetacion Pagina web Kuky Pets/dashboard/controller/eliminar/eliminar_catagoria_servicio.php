<?php 
    $id_categoria = $_GET['id_categoria'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from categoria_servicio where id_categoria='".$id_categoria."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/categoria_servicio.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/categoria_servicio.php');
        </script>";
    }


?>