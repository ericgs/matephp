<?php
require_once 'conexion.php';
require_once '../Clases/Suceso.php';

function getSuceso($id)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM Suceso WHERE id = '$id'";
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
		//Crear objeto Suceso y cargarle los datos
		
		$suceso = new Suceso();
		$suceso->setId($aux[0]);
		$suceso->setTipo($aux[1]);
		$suceso->setDetalle($aux[2]);
		$suceso->setPersona($x[3]);
		return $suceso;
	}
}

function getSucesoPorTarea($idTarea)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM Suceso WHERE idTarea = '$idTarea'";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$lista = pg_fetch_all($resultado);
	
	pg_free_result($resultado);
	pg_close($conexion);
	return $lista;
}

function getSucesoPorUsuario($idUsuario)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM Suceso WHERE idUsuario = '$idUsuario'";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$lista = pg_fetch_all($resultado);

	pg_free_result($resultado);
	pg_close($conexion);
	return $lista;
}
?>