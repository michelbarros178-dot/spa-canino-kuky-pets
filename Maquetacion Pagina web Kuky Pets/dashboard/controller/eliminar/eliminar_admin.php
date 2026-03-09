<?php 
    $id_admin = $_GET['id_admin'];
    include("../../model/conexion.php");

    //delete para poder eliminar registros de la tabla
    $sql="delete from admin where id_admin='".$id_admin."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script languaje='JavaScript'>
        alert('Los datos se eliminaron correctamente de la base de datos');
        location.assign('../tablas/admin.php');
        </script>";
    }
    else{
        echo "<script languaje='JavaScript'>
        alert('Los datos no se eliminaron de la base de datos');
        location.assign('../tablas/admin.php');
        </script>";
    }


?>