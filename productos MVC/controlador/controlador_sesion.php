<?php

session_start();

if (isset($_SESSION['id_usuario'])) 
{
	header("Location: ../index.php");
}
else
{
    require '../vista/vista_sesion.php';
} 
?>