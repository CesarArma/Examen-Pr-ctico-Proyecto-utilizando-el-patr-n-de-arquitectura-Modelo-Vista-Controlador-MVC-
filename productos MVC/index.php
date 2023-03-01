<?php 
	// Importo el archivo de la clase de conexion a la BD
	require 'modelo/modelo.php';
	// Crear al objeto de la clase BD_PDO
	$obj = new Modelo();
	// Linea que ejecuta la instruccion sql en la BD
	if (isset($_POST['btnregistrar'])) 
	{
		@$nombre = $_POST['txtnombre'];
		@$cantidad = $_POST['txtcantidad'];
		@$idproveedor = $_POST['lstproveedores'];
		@$idcategoria = $_POST['lstcategorias'];
		if ($_POST['btnregistrar']=='Insertar') 
		{
			$obj->Insertar($nombre,$cantidad,$idproveedor,$idcategoria);
		}
		else if ($_POST['btnregistrar']=='Modificar')
		{
			$idproducto = $_POST['txtid'];
			$obj->Modificar($nombre,$cantidad,$idproveedor,$idcategoria,$idproducto);
		}
		
	}
	else if(isset($_GET['ideliminar']))
	{
		$id = $_GET['ideliminar'];
		$obj->Eliminar($id);
	}
	else if(isset($_GET['idmodificar']))
	{
		$id = $_GET['idmodificar'];
		$prod_mod = $obj->Producto_Modificado($id);
	}


	@$buscar = $_POST['txtbuscar'];
	$datos_buscar = $obj->Buscar($buscar);
	$datos = $obj->TABLA($datos_buscar);
	

	@$datos_proveedores = $obj->listados("Select id_proveedor,concat(Nombres,' ',Apellido_p,' ',Apellido_m) as Nombre_comp from proveedores","Select id_proveedor from productos where 
		id_producto='".$_GET['idmodificar']."'");
	 

	@$datos_categorias = $obj->listados("Select id_categoria,Nombre from categorias","Select id_categoria from productos where 
		id_producto='".$_GET['idmodificar']."'");
		
		require 'vista/vista.php';
	?>
