<?php 
    $id_historial = $_GET['id_historial'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from historial_mascota where id_historial='".$id_historial."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/historial_mascota.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/historial_mascota.php');
        </script>";
    }


?>