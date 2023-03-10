<!DOCTYPE html>
<html lang="en">

<head>
	<title>Agencia Inmobiliaria</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/stilos/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/css/util.css">
	<link rel="stylesheet" type="text/css" href="Vista/Estilos/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Vista/Estilos/images/fondo.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					AGENCIA INMOBILIARIA
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="index.php" method="post">
					<div class="wrap-input100 validate-input" data-validate="Campo vacio">
						<input class="input100" type="text" name="usuario" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Campo vacio">
						<input class="input100" type="password" name="password" placeholder="Contrase??a">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<p style="text-align: center; margin-top: 20px; color:darkmagenta"><?= $_GET['msg'] ?? "" ?></p>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="botonEnviar">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="Vista/Estilos/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="Vista/Estilos/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="Vista/Estilos/vendor/bootstrap/js/popper.js"></script>
	<script src="Vista/Estilos/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="Vista/Estilos/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="Vista/Estilos/vendor/daterangepicker/moment.min.js"></script>
	<script src="Vista/Estilos/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="Vista/Estilos/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="Vista/Estilos/js/main.js"></script>

</body>

</html>