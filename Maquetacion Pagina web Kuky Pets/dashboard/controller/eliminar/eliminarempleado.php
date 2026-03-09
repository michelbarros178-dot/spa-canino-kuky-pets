<?php 
    $cedula_em = $_GET['cedula_em'];
    include("../../conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from empleados where cedula_em='".$cedula_em."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/empleada.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/empleada.php');
        </script>";
    }


?>