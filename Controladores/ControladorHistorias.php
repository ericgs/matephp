<?php

require_once '../Clases/Historia.php';
require_once '../DAO/tareas.php';
require_once '../DAO/historias.php';


function createHistoriaControlador($historia)
{
	$h = new Historia();
	$h = $historia;
	if (false) $h = new Historia();
	$h->setNumero($x);
	$h->setOrden($x);
	
	return createHistoriaDAO($historia);
	
}

function getHistriaControlador($idHistoria)
{

		$his = new Historia();
		$his = getHistriaDAO($idHistoria);
				//$his->getTareas				
		return $his;
}

function getHistoriasDeProyectoControlador($idProyecto)
{
	$listaHistorias = getHistoriasDeProyecto($idProyecto);
	return $listaHistorias;
}

function updateHistoriaControlador($historia)
{
	return updateHistoriaDAO($historia);
}

function deleteHistoriaControlador($idHistoria)
{
	return deleteHistoriaDAO($idHistoria);
}

function reorderBacklogControlador($idHistoria, $idOrdenOriginal, $idNuevoOrden)
{
	$h = new Historia();
		
	$h = getHistriaDAO($idHistoria);
	
	$listaHistorias = getRangoHistoriasDeProyectoDAO($h->getIdProyecto(), $idOrdenOriginal, $idNuevoOrden);
			
	if($idOrdenOriginal > $idNuevoOrden) //reordenar
	{
		foreach ($listaHistorias as $hi)
		{
			$hi->setOrden($hi->getOrden() - 1); //todos las historias entre idO e idN aumentan 1 lugar (-1)
		}
		$counter = count($listaHistorias);
		$listaHistorias[$counter]->setOrden($idNuevoOrden); // nuevo orden de la historia
	}
	else
	{
		foreach ($listaHistorias as $hi)
		{
			$hi->setOrden($hi->getOrden() + 1); //todos las historias entre idO e idN decienden 1 lugar (+1)
		}
		$listaHistorias[0]->setOrden($idNuevoOrden); $listaHistorias[$counter]->setOrden($idNuevoOrden); // nuevo orden de la historia
	}
	
	updateOrdenHistoriasDAO($listaHistorias); //Transformar en transaccion ##################################
}
