<?php 
    $id_factura = $_GET['id_factura'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from factura where id_factura='".$id_factura."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/factura.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/factura.php');
        </script>";
    }


?>