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
			<h1 class="page-header">Cotización <small>Lista de cotizaciones</small></h1>
			<!-- end page-header -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Tabla</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						
					</div>
				</div>
				<div class="panel-body">
					
					<form>

						<input type="hidden" id="nombre_user" name="nombre_user" value="<?php echo $_SESSION["use_nombre"] ." ". $_SESSION["use_apellido"] ?>" class="form-control" disabled>

						<div class="form-group">
							<label for="exampleFormControlSelect1">Elegir Cliente</label>
							<select class="form-control" id="cli_id" name="cli_id">
								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Nombre de la empresa</label>
							<input type="text" class="form-control" id="cli_empresa" name="cli_empresa" placeholder="Digital World" disabled>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Ruc</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1724589001" disabled>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Contacto</label>
							<input type="text" class="form-control" id="cli_contacto" name="cli_contacto" placeholder="0997785425" disabled>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Correo</label>
							<input type="email" class="form-control" id="cli_correo" name="cli_correo" placeholder="name@example.com" disabled>
						</div>

						<div class="form-group">
							<label for="exampleFormControlTextarea1">Descripción</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						</div>

					</form>

				</div>
			</div>

			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Tabla</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						
					</div>
				</div>
				<div class="panel-body">
					
				

				</div>
			</div>

			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Tabla</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						
					</div>
				</div>
				<div class="panel-body">
					
				

				</div>
			</div>

			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Tabla</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						
					</div>
				</div>
				<div class="panel-body">
					
				

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
		// require_once("../Html/modalcarga.php");
		// require_once("modal.php");
        require_once("../Html/js.php");
    ?>


	<script src="..\..\assets\plugins\select2\dist\js\select2.min.js"></script>
	<script src="../MntCotizacion/cotizacion.js"></script>
	
	

</body>
</html>

<?php
	}else {
		// Si el usuario no existe, redirigir a la página de inicio de sesión con un mensaje de error
		header("Location:".conectar::ruta()."index.php?m=4");
		exit();
	}
?>