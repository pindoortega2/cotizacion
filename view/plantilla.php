<?php

	require_once("config/conexion.php");

	if(isset($_POST["enviar"]) && $_POST["enviar"] == "si"){

		require_once("models/Usuarios.php");
		$usuario = new Usuario();
		$usuario -> login();

	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Color Admin | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets\css\default\app.min.css" rel="stylesheet">
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
		
	<!-- begin login-cover -->
	<div class="login-cover">
		<div class="login-cover-image" style="background-image: url(assets/img/login-bg/login-bg-17.jpeg)" data-id="login-cover-image"></div>
		<div class="login-cover-bg"></div>
	</div>
	<!-- end login-cover -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-v2" data-pageload-addclass="animated fadeIn">
			<!-- begin brand -->
			<div class="login-header">
				<div class="brand">
					<span class="logo"></span> <b>Iniciar</b> Sesión
					
				</div>
				<div class="icon">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<!-- end brand -->
			<!-- begin login-content -->
			<div class="login-content">

				<form action="" method="post" class="margin-bottom-0">

				<?php
						if(isset($_GET["m"])){
							switch($_GET["m"]){
								case "1":
									?>
										<div class="alert alert-danger fade show">
											<span class="close" data-dismiss="alert">×</span>
											<strong>Error:</strong> Datos Incorrectos</a>.
											</div>
									<?php
								break;

								case "2":
									?>
										<div class="alert alert-danger fade show">
											<span class="close" data-dismiss="alert">×</span>
											<strong>Error:</strong> Campos Vacios</a>.
											</div>
									<?php
								break;

								case "3":
									?>
										<div class="alert alert-danger fade show">
											<span class="close" data-dismiss="alert">×</span>
											<strong>Error:</strong> El formato es incorrecto</a>.
											</div>
									<?php
								break;

								case "4":
									?>
										<div class="alert alert-danger fade show">
											<span class="close" data-dismiss="alert">×</span>
											<strong>Advertencia:</strong> Se cerro la sesión</a>.
											</div>
									<?php
								break;
							}
						}
					?>


					<div class="form-group m-b-20">
						<input type="text" id="use_correo" name="use_correo" class="form-control form-control-lg" placeholder="Usuario" required="">
					</div>

					<div class="form-group m-b-20" style="position: relative;">
						<input type="password" id="use_password" name="use_password" class="form-control form-control-lg" placeholder="Password" required="">
						<div class="input-group-append">
							<button type="button" class="btn btn-outline-secondary" id="togglePassword">
								<i class="fa fa-eye"></i>
							</button>
						</div>
					</div>

					<div class="checkbox checkbox-css m-b-20">
						<input type="checkbox" id="remember_checkbox"> 
						<label for="remember_checkbox">
							Recordarme
						</label>
					</div>

					<div class="login-buttons">
						<input type="hidden" name="enviar" value="si">
						<button type="submit" class="btn btn-success btn-block btn-lg">Iniciar Sesión</button>
					</div>
					
				</form>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end login -->
		
		<!-- begin login-bg -->
		<ul class="login-bg-list clearfix">
			<li class="active"><a href="javascript:;" data-click="change-bg" data-img="assets/img/login-bg/login-bg-17.jpg" style="background-image: url(assets/img/login-bg/login-bg-17.jpeg)"></a></li>
			
		</ul>
		<!-- end login-bg -->
		
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets\js\app.min.js"></script>
	<script src="assets\js\theme\default.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets\js\demo\login-v2.demo.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		
		document.getElementById('togglePassword').addEventListener('click', function () {
			const passwordField = document.getElementById('use_password');
			const icon = this.querySelector('i');
			if (passwordField.type === 'password') {
				passwordField.type = 'text';
				icon.classList.remove('fa-eye');
				icon.classList.add('fa-eye-slash');
			} else {
				passwordField.type = 'password';
				icon.classList.remove('fa-eye-slash');
				icon.classList.add('fa-eye');
			}
		});

	</script>

</body>
</html>
