<?php

require 'bd/conexion_bd.php';

class Modelo extends BD_PDO
{   
    public function Insertar($nombre,$cantidad,$idproveedor,$idcategoria)
    {
        $this->Ejecutar_Instruccion("Insert into productos(Nombre,Cantidad,id_proveedor,id_categoria) values('$nombre','$cantidad','$idproveedor','$idcategoria')");
        header("Location: index.php");
    }

    public function Modificar($nombre,$cantidad,$idproveedor,$idcategoria,$idproducto)
    {
        $this->Ejecutar_Instruccion("Update productos set Nombre='$nombre',Cantidad='$cantidad',id_proveedor='$idproveedor',id_categoria='$idcategoria' where id_producto = '$idproducto'");
    }

    public function Eliminar($id)
    {
        $this->Ejecutar_Instruccion("Delete from productos where id_producto = '$id'");
    }

    public function Producto_Modificado($id)
    {
        $prod_mod = $this->Ejecutar_Instruccion("Select * from productos where id_producto = '$id'");
        return $prod_mod;
    }

    public function Buscar($buscar)
    {
        $datos_buscar = $this->Ejecutar_Instruccion("Select productos.id_producto,productos.Nombre,productos.Cantidad,concat(proveedores.Nombres,' ',proveedores.Apellido_p,' ',proveedores.Apellido_m) as Nombre_prov,id_categoria from productos INNER JOIN proveedores ON productos.id_proveedor=proveedores.id_proveedor where Nombre like '%$buscar%'");
        return $datos_buscar;
    }

    public function BuscarTodo()
    {
        $datos_buscar = $this->Ejecutar_Instruccion("Select productos.id_producto,productos.Nombre,productos.Cantidad,concat(proveedores.Nombres,' ',proveedores.Apellido_p,' ',proveedores.Apellido_m) as Nombre_prov,id_categoria from productos INNER JOIN proveedores ON productos.id_proveedor=proveedores.id_proveedor");
        return $datos_buscar;
    }

    public function TABLA($datos_buscar)
    {
        $tabla="";
        foreach ($datos_buscar as $renglon) 
        {
            $tabla.="<tr>";
			$tabla.='<td>'.$renglon[0].'</td>';
			$tabla.='<td>'.$renglon[1].'</td>';
			$tabla.='<td>'.$renglon[2].'</td>';
            $tabla.='<td>'.$renglon[3].'</td>';
			$tabla.='<td>'.$renglon[4].'</td>';
            if (@$_SESSION['privilegio']=='Admin')
						{
							$tabla.='<td align="center"><input class="btn btn-danger"  type="button" id="btneliminar" name="btneliminar" value="Eliminar" onclick="javascript: eliminar('.$renglon[0].');">
            <input class="btn btn-success" type="button" id="btnmodificar" name="btnmodificar" value="Modificar" onclick="javascript: modificar('.$renglon[0].');">
            </td></tr>';
						}
						
            
        }
        return $tabla;
    }
}

session_start();
//verificar producto
$obj = new BD_PDO();
@$producto = $_GET['p'];
@$datos = $obj->Ejecutar_Instruccion("Select * from productos where Nombre='$producto'");
echo json_encode($datos);
?>