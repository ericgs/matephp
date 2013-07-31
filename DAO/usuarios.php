<?php
require_once 'conexion.php';

function getUsuarioPorId($id)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM Usuario WHERE id = '$id'";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if(!$aux)
	{
		return false;
	}
	else
	{
		//Crear objeto Persona y cargarle los datos
		require_once '../Clases/Usuario.php';
		$usuario = new Usuario();
		$usuario->setId($aux[0]);
		$usuario->setNombre($aux[1]);
		$usuario->setUsuario($aux[2]);
		$usuario->setMail($aux[3]);
		return $usuario;
	}
}

function insertarUsuario($nombre, $usuario, $mail, $pass)
{
	$conexion = conectar();
	$consulta = "INSERT INTO Usuario (nombre, usuario, mail, pass, ) values ('$nombre','$usuario','$mail','$pass')";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	pg_free_result($resultado);
	pg_close($conexion);
	return $resultado;
}

function getUsuarios()
{
	$conexion = conectar();
	$consulta = 'SELECT * FROM Usuario ORDER BY nombre';
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$lista = pg_fetch_all($resultado);

	pg_free_result($resultado);
	pg_close($conexion);
	return $lista;
}

function modificarUsuario(Usuario $usuario)
{
	$nom = $usuario->getNombre();
	$mail = $usuario->getMail();
	$pass = $usuario->getClave();
	$conexion = conectar();
	$consulta = "UPDATE Usuario SET \"nombre\" = '$nom', mail='$mail', pass='$pass' WHERE \"idPeople\"=".$usuario->getId();
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	pg_free_result($resultado);
	pg_close($conexion);
	return $resultado;
}

function comprobarUsuario($user, $pass)
{
	$conexion = conectar();
	$consulta = "SELECT
	usuarios.nombre,
	usuarios.id,
	usuarios.usuario,
	usuarios.mail,
	usuarios.pass
	FROM
	public.usuarios
	WHERE
	usuarios.usuario = '$user' AND
	usuarios.pass = '$pass';";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
		   pg_free_result($resultado);
		   pg_close($conexion);
if(!$aux)
{
	return false;
}
else
{
//Crear objeto usuario y cargarle los datos
	require_once '../Clases/Usuario.php';
		$usuario = new Usuario();
		$usuario->setNombre($aux[0]);
		$usuario->setId($aux[1]);
		$usuario->setUsuario($aux[2]);
		$usuario->setMail($aux[3]);
		$usuario->setClave($aux[4]);
	return $usuario;
	}
}

//Controlar que el nombre no este en uso
function usuarioLibre($nombre)
{
	$conexion = conectar();
	$consulta = "SELECT
	usuarios.usuario,
	FROM
	public.usuarios
	WHERE
	usuarios.nombre = '$nombre'';";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if(!$aux)
	{
		return false;//nombre no existe
	}
	else
	{
		return true;//nombre existe
	}
}
?>