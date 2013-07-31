<?php

require_once '../Clases/Usuario.php';
require_once '../Controladores/ControladorUsuarios.php';
require_once '../DAO/conexion.php';
require_once '../Clases/utiles.php';

session_start();

$server = new SoapServer(null, array('uri' => 'urn:webservices'));

$server->setClass('UsuarioLog');

$server->handle();

$u = new UsuarioLog();
echo $u->logIn("silviok","asdfasdf");

class UsuarioLog
{
	public function logIn($user, $pass)
	{
		$usuario = new Usuario(); 
		$usuario = getUsuarioPorLog($user, $pass);
		IF($usuario == null)
		{
			//retornar error
			return json_encode("Error, usuario o pasword incorrectos");
		}
		else
		{
			//retornar usuario y sus datos, guardar los datos en session para corroborar lo sucedido
			//$_SESSION['sessionActiva'] = true;
			//$_Session['Usuario'] = $usuario;
			return $usuario->to_json();
		}		
	}
	
	
	public function crearNuevoUsuario($nombre, $user, $pass, $mail)
	{
		switch (setUsuario($nombre, $usuario, $mail, $pass))
		{
			case 0:
				{
					$result = 'El usuario fue creado correctamente';
					return json_encode($result, 0);
	
					break;
				}
			case 1:
				{
					$result = 'El usuario se encuentra ocupado';
					return json_encode($result, 1);
					break;
				}
			case 2:
				{
					$result = 'El usuario no pudo crearse, pongase en contacto con el administrador de la apcicaci�n.';
					return json_encode($result, 2);
					break;
				}
		}
	}
}



class Tablero
{
	public function getTexto()
	{
		return "Esto es una prueba de web service";
	}

	public function reportar($numero, $visible)
	{
		$reporte_exitoso = 0;

		$server = 'mysql.hostinger.es';
		$db = 'u273246582_cp';
		$user = 'u273246582_admin';
		$pass = '4dm1n15tr4d0r';
		/*
		 $server = 'localhost';
		$db = 'cp';
		$user = 'root';
		$pass = '';*/
		 
		/* Conectar a la BD */
		$link = mysql_connect($server,$user,$pass) or die("No se pudo conectar al servidor de BD");
		mysql_select_db($db,$link) or die("No se pudo abrir la BD");

		// Insertar en la tabla cp_usuario el número de teléfono del usuario que se está reportando.
		// Por el momento el parámetro visible se setea en 0. Se incluyó para usos futuros.
		$sql_reporte = "INSERT INTO cp_usuario (numero, fechahora, visible) VALUES ($numero, now(), $visible);";
		// En $respuesta_reporte se guarda el número de filas afectadas.
		$reporte_exitoso = mysql_query($sql_reporte,$link) or die('Error en la consulta:  '.$sql_reporte);

		return $reporte_exitoso;
	}

}
?>