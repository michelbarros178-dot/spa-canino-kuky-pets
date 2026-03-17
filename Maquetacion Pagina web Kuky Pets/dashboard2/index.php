<?php
    include_once 'model/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT id_usuario, username, password, rol_id, estado, ultimo_login, fecha_creacion FROM usuario";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>KukyPets</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <head>
    <link href="../dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <link href="../dashboard/assets/css/animate.min.css" rel="stylesheet"/>
    <link href="../dashboard/assets/css/paper-dashboard.css" rel="stylesheet"/>

    <link href="../dashboard/assets/css/demo.css" rel="stylesheet" />
</head>
<body>
    <header>
        <h3 class="text-center text-light">Prueba CRUD</h3>
        <h4 class="text-center text-light">Gestión de Usuarios </h4>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btNuevo" type="button" class="btn btn-success">Nuevo U</button>
            </div>
        </div>
    </div>
<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                <table id="usuario" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Contraseña</th>
                            <th>Rol ID</th>
                            <th>Estado</th>
                            <th>Ultimo login</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($data as $dat) { 
                        ?>
                        <tr>
                            <th><?php echo $dat['id_usuario']; ?></th>
                            <th><?php echo $dat['username']; ?></th>
                            <th><?php echo $dat['password']; ?></th>
                            <th><?php echo $dat['rol_id']; ?></th>
                            <th><?php echo $dat['estado']; ?></th>
                            <th><?php echo $dat['ultimo_login']; ?></th>
                            <th><?php echo $dat['fecha_creacion']; ?></th>
                            <th></th>
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>        
                </table> 
                </div>                   
            </div>
        </div>

 <!--modal agregar-->
        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formUsuarios">    
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id" class="col-form-label">ID:</label>
                                <input type="text" class="form-control" id="id" disabled>
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre">
                                <label for="apellido" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" id="email">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <input type="text" class="form-control" id="telefono">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                <button type="submit" id="btnGuardar" class="btn btn-danger">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!--   Core JS Files   -->


   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="../dashboard/assets/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <script src="main.js"></script>

</body>
</html>