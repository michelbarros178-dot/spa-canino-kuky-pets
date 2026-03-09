<?php 
    $id_movimiento = $_GET['id_movimiento'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from inventario_movimientos where id_movimiento='".$id_movimiento."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/inventario_movimientos.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/inventario_movimientos.php');
        </script>";
    }


?>