<?php require 'core/globals.php'?>
<!DOCTYPE html>
<html lang="es" class="light-style customizer-hide" dir="ltr" data-theme="theme-default">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
	<title>Tienda Vargas - Login</title>
<!--	<link rel="icon" type="image/x-icon" href="styles/assets/img/favicon/favicon.ico" />-->

<!--	 Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

<!--	 íconos -->
	<link rel="stylesheet" href="styles/assets/vendor/fonts/boxicons.css"/>

<!--	 CSS -->
	<link rel="stylesheet" href="<?= _ASSETS_ ?>vendor/css/core.css" class="template-customizer-core-css"/>
	<link rel="stylesheet" href="<?= _ASSETS_ ?>vendor/css/theme-default.css" class="template-customizer-theme-css"/>
	<link rel="stylesheet" href="<?= _ASSETS_ ?>css/demo.css"/>
	<link rel="stylesheet" href="<?= _ASSETS_ ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="<?= _ASSETS_ ?>vendor/css/pages/page-auth.css" />
	<script src="<?= _ASSETS_ ?>vendor/js/helpers.js"></script>

<!--	js-->
	<script src="<?= _ASSETS_ ?>js/config.js"></script>
</head>
<body>
<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-2">Bienvenido a Tienda Vargas! 👋</h4>
					<p class="mb-4">Por favor inicia sesión para ingresar al sistema</p>
					<form>
						<div class="mb-3">
							<label for="email" class="form-label">Usuario</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su usuario"/>
						</div>
						<div class="mb-3 form-password-toggle">
							<div class="d-flex justify-content-between">
								<label class="form-label" for="clave">Contraseña</label>
								<a href="#">
									<small>Olvidé Contraseña</small>
								</a>
							</div>
							<div class="input-group input-group-merge">
								<input type="password" id="clave" class="form-control" name="clave" placeholder="*******"/>
								<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
							</div>
						</div>
						<div class="mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="remember-me" />
								<label class="form-check-label" for="remember-me">Recordar</label>
							</div>
						</div>
						<div class="mb-3">
							<a href="<?= _VIEW_ ?>admin/inicio.php" class="btn btn-success d-grid w-100">Iniciar Sesión</a>
						</div>
					</form>
					<p class="text-center">
						<span>Nuevo usando el sistema?</span>
						<a href="#">
							<span>Crear cuenta</span>
						</a>
					</p>
				</div>
			</div>
			<!-- /Register -->
		</div>
	</div>
</div>

<!-- / Content -->

</body>
</html>




