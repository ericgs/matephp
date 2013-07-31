<?php
require_once '../Clases/Proyecto.php';
session_start();

$server = new SoapServer(null, array('uri' => 'urn:webservices'));

$server->setClass('ProyectosWS');

$server->handle();

class ProyectosWS
{
	function getProyectosDeUsuario($idUsuario)
	{
		return json_encode(getProyectosDeUsuarioController($idUsuario));
	}

	function getSpecificProyect($idProyecto)
	{
		return json_encode(getProyecto($idProyecto));
	}
	
	function updateProyecto($pro)
	{		
		$proyecto = new Proyecto();
		$proyecto = json_decode($pro);
		return json_encode(updateProyectoController($proyecto));		
	}
	
	function createProyecto($pro)
	{		
		$proyecto = new Proyecto();
		$proyecto = json_decode($pro);
		return json_encode(createProyectController($proyecto));
	}
	
	function deleteProyecto($idProyecto)
	{
		return json_encode(deleteProyectoController($idProyecto));
	}
}
