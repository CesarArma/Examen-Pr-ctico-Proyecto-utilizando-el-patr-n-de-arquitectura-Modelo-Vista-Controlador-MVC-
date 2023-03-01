<?php


//ponerlo ya en momento de revisarlo
error_reporting(1);
//para iniciar sesion
session_start();

//$_SESSION['privilegio']='Admin';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Productos</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Diseño Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script>
	function eliminar(id)
	{
		if (confirm("¿ Estas seguro de eliminar el registro ?")) 
		{
			window.location = "index.php?ideliminar=" + id;
		}
	}

	function modificar(id)
	{
		window.location = "index.php?idmodificar=" + id;
	}

	function cerrar_sesion()
	{
		if (confirm ("¿ Estas seguro de cerrar la sesion ?"))
		{
			window.location = "controlador/cerrar_sesion.php"; 
		}
	}

	function validar()
	{
		var nombre = document.getElementById("txtnombre").value;
		var id = document.getElementById("lstcategorias").value;

		if (nombre.trim().length<1) 
		{
			alert("Nombre esta vacio");
			return false;
		}

		if (nombre.trim().length != nombre.length) 
		{
			alert("Tienes espacios de mas en el nombre");
			return false;
		}

		$.getJSON("../modelo/modelo.php?c=" + id).done(function(datos)  
	    {
	      if ((isset(datos[0][0]))) 
	      {
	        alert("Categoria no existe, No!");
	        return false;
	      }        
	    }); 
		return true;
	}


	function verificar_producto(id)
	{
	  $.getJSON("../modelo/modelo.php?p=" + id).done(function(datos)  
	    {
	      if (datos[0][0]>0) 
	      {
	        alert("Producto ya existe, VERIFIQUE PORFAVOR");
	      }        
	    });  
	}

	
	function VALIDACION_solo_Letras(string)
	{

		var out = '';
		var filtro = ' áéíóúabcdefghijklmnñopqrstuvwxyz';//Caracteres validos
		
		//Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
		for (var i=0; i<string.length; i++)
		if (filtro.indexOf(string.charAt(i)) != -1) 
				//Se añaden a la salida los caracteres validos
			out += string.charAt(i);
		
		//Retornar valor filtrado
		return out;
	} 

	function VALIDACION_solo_Numeros(string)
	{

		var out = '';
		var filtro = '1234567890';//Caracteres validos
		
		//Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
		for (var i=0; i<string.length; i++)
		if (filtro.indexOf(string.charAt(i)) != -1) 
				//Se añaden a la salida los caracteres validos
			out += string.charAt(i);
		
		//Retornar valor filtrado
		return out;
	} 

</script>

</head>
<body>
	<?php

	if ($_SESSION['privilegio']=='Admin')
	{
	?>
	<div class="container" style="padding: 2%;width: 100%;">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<h1>Productos</h1>
				<h2><span class="badge text-bg-info">Permisos de Administrador</span></h2>
			</div>
			<br>
			<div class="panel-body">
				<form action="index.php" method="post" id="frminsertar" name="frminsertar" onsubmit="return validar();">	
				<input type="text" id="txtid" name="txtid" placeholder="Numero" 
					value="<?php echo @$prod_mod[0]['id_producto']; ?>" hidden>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="txtnombre">Nombre</label>
							<input class="form-control" type="text" id="txtnombre" name="txtnombre" onblur="javascript: verificar_producto(this.value)"  
							minlength="3" maxlength="30" placeholder="Nombre" value="<?php echo @$prod_mod[0][1]; ?>" onkeyup="this.value=VALIDACION_solo_Letras(this.value)" required>
						</div>
						<div class="form-group col-md-6">
							<label for="txtcantidad">Cantidad</label>
							<input class="form-control" type="text" id="txtcantidad" name="txtcantidad" maxlength="5" placeholder="Cantidad" 
							value="<?php echo @$prod_mod[0][2]; ?>" onkeyup="this.value=VALIDACION_solo_Numeros(this.value)" pattern="^[0-9]+" required>
						</div>
					</div>
					<br>
					<br>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="lstproveedores">Proveedor</label>
							<select class="form-control" name="lstproveedores" id="lstproveedores" required>
								<option value="">Seleccione Proveedor</option>
								<?php echo $datos_proveedores; ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="lstcategorias">Categorias</label>
							<select class="form-control" name="lstcategorias" id="lstcategorias" required>
								<option value="">Seleccione Categorias</option>
								<?php echo $datos_categorias; ?>
							</select>
						</div>
					</div>
			</div>
				<div class="panel-footer" align="right">
					<input type="submit" id="btnregistrar" name="btnregistrar" class="btn btn-<?php
					if(isset($_GET['idmodificar']))
					{
						echo 'info';
					}
					else
					{
						echo 'primary';
					}?>" style="font-size: large;"
					value="<?php
					if(isset($_GET['idmodificar']))
					{
						echo 'Modificar';
					}
					else
					{
						echo 'Insertar';
					}?>">
					<a href="index.php">
					<input type="button" class="btn btn-danger" style="font-size: large;" value="Cancelar">
					</a>	
				</form>
					<?php } ?>
			</div>
			<div class="panel-heading text-center">
				<h1>Lista de Productos</h1>
				<h2>
					<?php
						if ($_SESSION['privilegio']=='Admin')
						{
							echo '<span class="badge text-bg-info">Permisos de Administrador</span>';
						}
						else if($_SESSION['privilegio']=='Usuario')
						{
							echo '<span class="badge text-bg-light">Permisos de Usuario</span>';
						}
						
					?>
				</h2>
			</div>
		
				<form action="index.php" id="frmbuscar" name="frmbuscar" method="post">
				<br>
					<div class="row" align="center">
						<div class="col-lg-4" >
						</div>
						<div class="col-lg-4" >
							<input type="text" id="txtbuscar" name="txtbuscar" placeholder="Buscar Producto" 
							class="form-control" onkeyup="this.value=VALIDACION_solo_Letras(this.value)">
						</div>
						<div class="col-lg-4" style="text-align:left;">
							<input type="submit" id="btnbuscar" name="btnbuscar" class="btn btn-primary" value="Buscar">
						</div>
					</div>
					<br>
				</form>
		<div class="panel panel-info">
					<table class="table table-striped ">
						<tr style="font-weight: 900;">
							<td>Número</td>
							<td>Nombre</td>
							<td>Cantidad</td>
							<td>Proveedor</td>
							<td>Categoría</td>
							<?php
						if ($_SESSION['privilegio']=='Admin')
						{
							echo '<td align="center">Acción</td>';
						}
						
						
					?>
							
						</tr>
                            <?php echo $datos; ?>
					</table>
		</div>			
					<br><br>
				<div class="panel-heading text-center">
					<h2>Sesiones</h2>
				</div>
				<br>
				<div class="form-row text-center">
					<a href="controlador/controlador_sesion.php">Iniciar Sesión</a>
			<form action="controlador/cerrar_sesion.php" id="" name="" method="post">
					<input class="btn btn-info" type="submit" id="btncerrarsesion" name="btncerrarsesion" value="Cerrar Sesion" onclick="javascript= cerrar_sesion();">
			</form>
				</div>
				<br>
		</div>
	</div>
	
</body>
</html>