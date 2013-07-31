<?php
require_once '../Clases/Historia.php';
require_once '../Controladores/ControladorHistorias.php';
session_start();

$server = new SoapServer(null, array('uri' => 'urn:webservices'));

$server->setClass('HistoriasWS');

$server->handle();

class WSHistorias
{
	function createHistoria($history)
	{
		return json_encode(createHistoriaControlador($historia));
	}
	
	function getHistroia($idHistoria)
	{
		return json_encode(getHistriaControaldor($idHistoria));
	}
	
	function getAllHistoriasDeProyecto($idProyecto)
	{	
		return json_encode(getH);
	}
	
	function updateHistoria($historia)
	{
		
	}
	
	function deleteHistoria($idHistoria)
	{
		
	}
	
	function getBacklogDeProyecto($idProyecto)
	{
	}
	
}