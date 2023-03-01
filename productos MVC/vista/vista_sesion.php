<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de Sesion</title>
	<!-- Diseño Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

	<?php 
		require '../bd/conexion_bd.php';

		$obj = new BD_PDO();

		if (isset($_POST['btniniciar'])) 
		{
			$usuario = $_POST['txtusuario'];
			$contrasena = $_POST['txtcontrasena'];
			$datos = $obj->Ejecutar_Instruccion("Select * from Usuarios where Usuario='$usuario' and Contrasena='$contrasena'");

			if (@$datos[0][0]>0) 
			{
				echo "<script>alert('Bienvenido');</script>";
                $_SESSION['id_usuario'] = $datos[0][0];
                $_SESSION['nombre'] = $datos[0][1].' '.$datos[0][2].' '.$datos[0][3];
                $_SESSION['usuario'] = $datos[0][4];
                $_SESSION['privilegio'] = $datos[0][6]; 
                header ("Location: ../index.php");
			}
			else
			{
				echo "<script>alert('Usuario no encontrado');</script>";
			}
		}

	 ?>
	<div class="container" style="padding: 5%; width: 45%; ">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<h1>Iniciar Sesión Productos</h1>
			</div>
			<div class="panel-body">
<form action="../controlador/controlador_sesion.php" method="post">
				<input class="form-control" type="text" id="txtusuario" name="txtusuario" placeholder="Usuario" minlenght="11" maxlength="50" required>
				<br>
				<input class="form-control" type="text" id="txtcontrasena" name="txtcontrasena" placeholder="Contraseña" minlenght="1" maxlength="30" required>
			</div>
				<div class="panel-footer" align="center">	
					<input class="btn btn-primary" style="font-size: large;" type="submit" id="btniniciar" name="btniniciar" value="Ingresar">
					</form>
					<br><br>
					<form action="index.php" method="post">
					<input class="btn btn-info" style="font-size: large;" type="submit" id="btnregistrar" name="btnregistrar" value="Volver">
				</div>
			
		</div>
	</div>
</form>
	
</body>
</html>