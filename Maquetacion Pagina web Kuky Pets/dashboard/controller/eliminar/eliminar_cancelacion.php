<?php 
    $id_cancelacion = $_GET['id_cancelacion'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from cancelar_cita where id_cancelacion='".$id_cancelacion."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/cancelar_cita.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/cancelar_cita.php');
        </script>";
    }


?>