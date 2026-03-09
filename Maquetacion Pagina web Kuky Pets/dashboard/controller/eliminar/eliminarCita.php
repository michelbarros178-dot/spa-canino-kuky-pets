<?php 
    $cancelar_id = $_GET['cancelar_id'];
    include("//l/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from cancelar_cita where cancelar_id='".$cancelar_id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/clientes.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/clientes.php');
        </script>";
    }


?>