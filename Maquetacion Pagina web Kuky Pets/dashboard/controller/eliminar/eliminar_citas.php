<?php 
    $id_cita = $_GET['id_cita'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from citas where id_cita='".$id_cita."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/citas.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/citas.php');
        </script>";
    }


?>