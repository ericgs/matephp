<?php
require_once '../Clases/Usuario.php';
require_once '../Controladores/ControladorUsuarios.php';
require_once '../DAO/conexion.php';
require_once '../Clases/utiles.php';
	
	
			$usuario = new Usuario(); 
		$usuario = getUsuarioPorLog('eric', 111111);
		if($usuario == false)
		{
			//retornar error
			echo(json_encode("Error, usuario o pasword incorrectos", "Error"));
		}
		else
		{
			//retornar usuario y sus datos, guardar los datos en session para corroborar lo sucedido
			$_SESSION['sessionActiva'] = true;
			$_SESSION['Usuario'] = $usuario;
			
			
			//$user2 = new Usuario();
			//$s2 = json_encode($s);
			//echo($usuario->jencode());
			echo json_encode($usuario, JSON_NUMERIC_CHECK);
		}
?>