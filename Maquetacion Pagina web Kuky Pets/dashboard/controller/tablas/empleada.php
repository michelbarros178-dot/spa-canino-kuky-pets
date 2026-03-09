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
                    <li class="active">
                    <a href="empleada.php">
                        <i class="ti-user"></i>
                        <p>Administrador</p>
                    </a>
                </li>
                <li>
                    <a href="clientes.php">
                        <i class="ti-user"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>      
                    <a href="citas.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Citas</p>
                    </a>
                </li>
                <li>
                    <a href="mascotas.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Mascotas</p>
                    </a>
                </li>
                <li>
                    <a href="confirmar_cita.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Confirmar citas</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_cita.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Cancelar citas</p>
                    </a>
                </li>
                <li>
                    <a href="servicios.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li>
                    <a href="pagos.php">
                         <i class="ti-view-list-alt"></i>
                        <p>Pagos</p>
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
           $sql="select * from empleados";
           $resultado =mysqli_query($conexion,$sql);
             ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Empleado</h4><br>

                                <a href="agregarempleado.php">Agregar +</a><br><br>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Cedula</th>
                                    	<th>Nombre completo</th>
                                    	<th>Telefono</th>
                                    	<th>Correo</th>
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($filas=mysqli_fetch_assoc($resultado)){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $filas ['cedula_em'] ?></td>
                                            <td><?php echo $filas ['nombre_completo'] ?></td>
                                            <td><?php echo $filas ['telefono'] ?></td>
                                            <td><?php echo $filas ['correo'] ?></td>
                                            <td>
                                                <?php echo "<a href = '../eliminar/eliminarempleado.php?cedula_em=".$filas['cedula_em']."'>ELIMINAR</a>"; ?>
                                                             
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
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../../assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="../../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../..//js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="../../assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/demo.js"></script>

    <?php 
    mysqli_close($conexion);
    ?>
    </body>
</html>
