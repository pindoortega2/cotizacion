<?php

	require_once("../../config/conexion.php");
	if(isset($_SESSION["id"])){
		

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php
        require_once("../Html/head.php");
    ?>

</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		
        <?php
            require_once("../Html/header.php");

            // begin #sidebar menu
            require_once("../Html/sidebar.php");
        ?>
		
		
		

		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Blank Page</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Servicios <small>lista de los servicios</small></h1>
			<!-- end page-header -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Tabla de servicios</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						
					</div>
				</div>
				<div class="panel-body">
					
				<button type="button" id="btnnuevo" class="btn btn-primary">Nuevo Registro</button>

				<br><br>

                <table id="lista_data" class="table table-striped table-bordered table-td-valign-middle">
					<thead>
						<tr>
							<th width="60%">Nombre</th>
							<th width="20%" class="text-nowrap">Editar</th>		
							<th width="20%" class="text-nowrap">Eliminar</th>							
						</tr>
					</thead>
					<tbody>

						
					</tbody>
				</table>




				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->
		
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<?php
		require_once("../Html/modalcarga.php");
		require_once("modal.php");
        require_once("../Html/js.php");
    ?>

	<script src="../MntServicios/servicios.js"></script>

</body>
</html>

<?php
	}else {
		// Si el usuario no existe, redirigir a la página de inicio de sesión con un mensaje de error
		header("Location:".conectar::ruta()."index.php?m=4");
		exit();
	}
?>