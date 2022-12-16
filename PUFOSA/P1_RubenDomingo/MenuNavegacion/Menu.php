<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
	session_start();
	?>
	<style>
		body {
			margin: 0;
			font-family: Arial
		}

		.topnav {
			overflow: hidden;
			background-color: #333;
		}

		.topnav a {
			float: left;
			display: block;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.active {
			background-color: #04AA6D;
			color: white;
		}

		.dropdown {
			float: left;
			overflow: hidden;
		}

		.dropdown .dropbtn {
			font-size: 17px;
			border: none;
			outline: none;
			color: white;
			padding: 14px 16px;
			background-color: inherit;
			font-family: inherit;
			margin: 0;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		.dropdown-content a {
			float: none;
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.topnav a:hover,
		.dropdown:hover .dropbtn {
			background-color: #555;
			color: white;
		}

		.dropdown-content a:hover {
			background-color: #ddd;
			color: black;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}
	</style>
</head>

<body>
	<?php
	require '../Configuracion/Conexion.php';

	//Si el array SESSION ha sido creado comprobamos roles
	if (isset($_SESSION['login'])) {
		$query = $conn->prepare("SELECT trabajos.Trabajo_ID FROM trabajos
		INNER JOIN empleados ON empleados.Trabajo_ID = trabajos.Trabajo_ID
		WHERE empleados.empleado_ID = ?;");
		$query->bindParam(1, $_SESSION['login']);
		$query->execute();

		$registros = $query->fetchAll(PDO::FETCH_ASSOC);
		$rol = $registros[0]['Trabajo_ID'];

		//Mostramos diferentes opciones del menu dependiendo del rol de empleado
		if ($rol == 672 || $rol == 671) {
	?>
			<div class="topnav" id="myTopnav">
				<div class="dropdown">
					<button class="dropbtn">Empleados
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../CRUD_empleados/Insertar.php">Alta</a>
						<a href="../CRUD_empleados/Borrar.php">Baja</a>
						<a href="../CRUD_empleados/Actualizar.php">Actualización</a>
						<a href="../CRUD_empleados/Mostrar.php">Muestra</a>
					</div>
				</div>
				<div class="dropdown">
					<button class="dropbtn">Clientes
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../CRUD_clientes/Insertar.php">Alta</a>
						<a href="../CRUD_clientes/Borrar.php">Baja</a>
						<a href="../CRUD_clientes/Actualizar.php">Actualización</a>
						<a href="../CRUD_clientes/Mostrar.php">Muestra</a>
					</div>
				</div>
				<div class="dropdown">
					<button class="dropbtn">Departamentos
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../CRUD_departamentos/Insertar.php">Alta</a>
						<a href="../CRUD_departamentos/Borrar.php">Baja</a>
						<a href="../CRUD_departamentos/Actualizar.php">Actualización</a>
						<a href="../CRUD_departamentos/Mostrar.php">Muestra</a>
					</div>
				</div>
				<div class="dropdown">
					<button class="dropbtn">Trabajos
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../CRUD_trabajos/Insertar.php">Alta</a>
						<a href="../CRUD_trabajos/Borrar.php">Baja</a>
						<a href="../CRUD_trabajos/Actualizar.php">Actualización</a>
						<a href="../CRUD_trabajos/Mostrar.php">Muestra</a>
					</div>
				</div>
				<div class="dropdown">
					<button class="dropbtn">Ubicación
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../CRUD_ubicacion/Insertar.php">Alta</a>
						<a href="../CRUD_ubicacion/Borrar.php">Baja</a>
						<a href="../CRUD_ubicacion/Actualizar.php">Actualización</a>
						<a href="../CRUD_ubicacion/Mostrar.php">Muestra</a>
					</div>
				</div>
				<div class="dropdown">
					<a href="../InformesLog/Log.php">Fichero LOG</a>
				</div>
				<?php
				if ($rol == 672) {
				?>
					<div class="dropdown">
						<a href="../InformesLog/InformeDepartamentos.php">Informe</a>
					</div>
				<?php
				}
				?>
			</div>
		<?php
		} else {
		?>
			<div class="topnav" id="myTopnav">
				<div class="dropdown">
					<button class="dropbtn">Clientes
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="../CRUD_clientes/Insertar.php">Alta</a>
						<a href="../CRUD_clientes/Borrar.php">Baja</a>
						<a href="../CRUD_clientes/Actualizar.php">Actualización</a>
						<a href="../CRUD_clientes/Mostrar.php">Muestra</a>
					</div>
				</div>
			</div>
	<?php
		}
	}
	?>
</body>

</html>