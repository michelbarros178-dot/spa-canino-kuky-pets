<?php 
    $id_cliente = $_GET['id_cliente'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from clientes where id_cliente='".$id_cliente."'";
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