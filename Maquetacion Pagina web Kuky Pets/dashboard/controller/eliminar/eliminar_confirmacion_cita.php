<?php 
    $id_confirmacion = $_GET['id_confirmacion'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from confirmacion_cita where id_confirmacion='".$id_confirmacion."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/confirmacion_cita.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/confirmacion_cita.php');
        </script>";
    }


?>