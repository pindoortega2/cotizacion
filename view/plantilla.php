<?php

	require_once("config/conexion.php");

	if(isset($_POST["enviar"]) && $_POST["enviar"] == "si"){

		require_once("models/Usuarios.php");
		$usuario = new Usuario();
		$usuario -> login();

	}
?>

<!DOCTYPE html>
<html lang="en">
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
					<div class="form-group m-b-20">
						<input type="text" id="use_correo" name="use_correo" class="form-control form-control-lg" placeholder="Usuario" required="">
					</div>
					<div class="form-group m-b-20">
						<input type="password" id="use_pass" name="use_pass" class="form-control form-control-lg" placeholder="Password" required="">
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
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>
