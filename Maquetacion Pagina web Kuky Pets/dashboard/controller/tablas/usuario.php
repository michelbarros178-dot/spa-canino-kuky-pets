<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>KukyPets</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../../assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../../assets/css/themify-icons.css" rel="stylesheet">
    

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                 <center><img class="logos" src="../../../images/favicon.ico" alt="logo kuky pets"></center>
            </div>

  
                <ul class="nav">
                   <li>
                    <a href="admin.php">
                        <i class="ti-user"></i>
                        <p>Administrador(a)</p>
                    </a>
                </li>
                <li>
                    <a href="cancelar_cita.php">
                        <i class="ti-user"></i>
                        <p>Cancelar cita</p>
                    </a>
                </li>
                <li>
                    <a href="categoria_servicio.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Categoria servicio</p>
                    </a>
                </li>
                <li>
                    <a href="citas.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Citas</p>
                    </a>
                </li>
                <li>
                    <a href="cita_producto.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Cita producto</p>
                    </a>
                </li>
                 <li>
                    <a href="cita_servicio.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Cita servicio</p>
                    </a>
                </li>
                    <li>
                    <a href="clientes.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="confirmacion_cita.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Confirmacion cita</p>
                    </a>
                </li>
                <li>
                    <a href="empleados.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Empleados</p>
                    </a>
                </li>
                <li>
                    <a href="factura.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Factura</p>
                    </a>
                </li>
                <li>
                    <a href="historial_mascota.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Historial mascota</p>
                    </a>
                </li>
                <li>
                    <a href="inventario_movimientos.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Inventario movimientos</p>
                    </a>
                </li>
                <li>
                    <a href="mascotas.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Mascotas</p>
                    </a>
                </li>
                <li>
                    <a href="pagos.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Pagos</p>
                    </a>
                </li>
                <li>
                    <a href="productos.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li>
                    <a href="rol.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li>
                    <a href="servicios.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li>
                    <a href="servicio_producto.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Servicio producto</p>
                    </a>
                </li>
                <li class="active">
                    <a href="usuario.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Usuario</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

        <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">

                    <a class="navbar-brand" href="#">Kuky pets spa canino</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="../../../view/index.html">
								<i class="ti-settings"></i>
								<p>Cerrar sesión</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

           <?php
           include("../../model/conexion.php");
           $sql="select * from usuario";
           $resultado =mysqli_query($conexion,$sql);
             ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Usuario</h4><br>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Id_usuario</th>
                                    	<th>Username</th>
                                    	<th>Password_hash</th>
                                    	<th>Email</th>
                                        <th>Rol_id</th>
                                        <th>Estado</th>
                                        <th>Ultimo_login</th>
                                        <th>Fecha_creacion</th>
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($filas=mysqli_fetch_assoc($resultado)){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $filas ['id_usuario'] ?></td>
                                            <td><?php echo $filas ['username'] ?></td>
                                            <td><?php echo $filas ['password'] ?></td>
                                            <td><?php echo $filas ['email'] ?></td>
                                            <td><?php echo $filas ['rol_id'] ?></td>
                                            <td><?php echo $filas ['estado'] ?></td>
                                            <td><?php echo $filas ['ultimo_login'] ?></td>
                                            <td><?php echo $filas ['fecha_creacion'] ?></td>
                                            <td>
                                                <?php echo "<a href = '../eliminar/eliminar_usuario.php?id_usuario=".$filas['id_usuario']."'>ELIMINAR</a>"; ?>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        
                                      </tbody>                                
                                </table>
                            </div>
                        </div>
                    </div>

    </div>
</div>


    <!--   Core JS Files   -->
    <script src="../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../../assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="../../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../../assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="../../assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/demo.js"></script>

    <?php 
    mysqli_close($conexion);
    ?>
    </body>
</html>
