<?php 
    $id_empleado = $_GET['id_empleado'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from empleados where id_empleado='".$id_empleado."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/empleados.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/empleados.php');
        </script>";
    }


?>