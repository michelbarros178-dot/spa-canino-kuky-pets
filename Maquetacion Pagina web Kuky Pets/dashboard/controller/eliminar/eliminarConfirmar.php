<?php 
    $confirmacion_id = $_GET['confirmacion_id'];
    include("//l/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from confirmacion_cita where confirmacion_id='".$confirmacion_id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/confirmar_cita.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/confirmar_cita.php');
        </script>";
    }


?>