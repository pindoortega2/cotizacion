<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="..\..\assets\img\user\user-13.jpeg" alt="">
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								<?php echo $_SESSION["use_nombre"]; ?>
								<small>Administrator</small>							
							</div>
						</a>
					</li>
					
				</ul>
				<!-- end sidebar user -->

				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navegación</li>

					<li class="has-sub">
						<a href="../Home/">
							<b class="caret"></b>
							<i class="fas fa-lg fa-fw m-r-10 fa-tachometer-alt"></i>
							<span>Panel</span>
						</a>						
					</li>

					<!-- Clientes -->
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fas fa-lg fa-fw m-r-10 fa-users"></i>
							<span>Clientes</span>
						</a>
						<ul class="sub-menu">
							<li><a href="../MntCliente/">Ver Clientes</a></li>
													
						</ul>
					</li>
					
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-align-left"></i> 
							<span>Servicios</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="../MntServicios">
									<b class="caret"></b>
									Ver Servicios
								</a>
								
							</li>					
							
						</ul>
					</li>

					<!-- Empresa -->
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-building"></i> 
							<span>Empresa</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="../MntEmpresa">
									<b class="caret"></b>
									Ver Empresa
								</a>
								
							</li>							
						</ul>
					</li>

					<!-- Cotización -->
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fab fa-lg fa-fw m-r-10 fa-simplybuilt"></i>
							<span>Cotización</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="../MntCotizacion">
									<b class="caret"></b>
									Nueva Cotización
								</a>
								
							</li>							
						</ul>
					</li>


					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->

			</div>
			<!-- end sidebar scrollbar -->
		</div>