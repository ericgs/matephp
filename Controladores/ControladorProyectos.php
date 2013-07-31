<?php
include_once '../Clases/Proyecto.php';
require_once '../DAO/evas.php';
require_once '../DAO/historias.php';
require_once '../DAO/proyectos.php';


	function getProyectosDeUsuarioController($idUsuario)
	{
		$listaProyectos = array();
		$listaProyectos = getProyectosDeUsuarioDAO($idUsuario);


		
		return $listaProyectos; 
			
	}
	
	function getProyecto($idProyecto)
	{
		$pro = new Proyecto();
		$pro = getProyectoByID($idProyecto);	
		if($pro == false)
		{
			return false; 
		}
		else
		{
			//$pro->getEvas();
			//
			return $pro;
		}
	}
	
	function updateProyectoController($proyecto)
	{
		return updateProtectoDAO($proyecto);		
	}
	
	function createProyectController($proyecto)
	{
		return createProyectoDAO($proyecto);
	}
	
	function deleteProyectoController($idProyecto)
	{
		
		return deleteProyectoDAO($idProyecto);
	}
	
?>