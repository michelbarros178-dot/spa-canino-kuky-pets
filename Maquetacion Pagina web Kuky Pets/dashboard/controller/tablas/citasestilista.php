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
                    <a href="citas.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Citas</p>
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
                            <a href="../view/index.html">
								<i class="ti-settings"></i>
								<p>Cerrar sesión</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <?php
           include("model/conexion.php");
           $sql="select * from citas";
           $resultado =mysqli_query($conexion,$sql);
             ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Citas</h4><br>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Id_cita</th>
                                    	<th>Fecha</th>
                                        <th>Hora</th>
                                    	<th>Id_mascota</th>
                                        <th>Id_servicio</th>
                                        <th>Id_empleado</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </thead>
                                     <tbody>
                                     <?php 
                                            while($filas=mysqli_fetch_assoc($resultado)){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $filas ['id_cita'] ?></td>
                                            <td><?php echo $filas ['fecha'] ?></td>
                                            <td><?php echo $filas ['hora'] ?></td>
                                            <td><?php echo $filas ['id_mascota'] ?></td>
                                            <td><?php echo $filas ['id_servicio'] ?></td>
                                            <td><?php echo $filas ['id_empleado'] ?></td>
                                            <td><?php echo $filas ['estado'] ?></td>
                                            <td>
                                                <?php echo "<a href = '../eliminar/eliminar_cita.php?id_cita=".$filas['id_cita']."'>ELIMINAR</a>"; ?>
                                                
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
    <script src="../../assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="../../assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/demo.js"></script>

    <!-- JavaScript Libraries -->
       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
     
    </body>
</html>
