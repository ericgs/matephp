<?php
require_once 'conexion.php';
require_once '../Clases/Tarea.php';

function getTareasDeHistoriaDAO($idHistoria)
{
	$conexion = conectar();
	$consulta = "SELECT 
				  tareas.id,
				  tareas.titulo, 
				  tareas.detalle, 
				  tareas.trabajo_consumido, 
				  tareas.estado, 
				  tareas.trabajo_estimado, 
				  usuarios.nombre
				FROM 
				  public.tareas
				JOIN 
				  public.usuarios
				ON (public.tareas.id_usuario = public.usuarios.id)
				WHERE 
				  tareas.id_historia = ". $idHistoria .";";
		
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	$lista = array();
	$lista = pg_fetch_all($resultado);
	$listaTareas = array();
	if(!empty ($lista))
	{
		foreach ($lista as $t)
		{
			//Crear objeto Comentario y cargarle los datos
			$tar = new Tarea();
			$tar->setId($t['id']);
			$tar->setDetalle($t['detalle']);
			$tar->setEstado($t['estado']);
			$tar->setOwner($t['nombre']);
			$tar->setTitulo($t['titulo']);
			$tar->setTrabajoCalculado($t['trabajo_estimado']);
			$tar->setTrabajoConsumido($t['trabajo_consumido']);
			
			array_push($listaTareas, $tar) ;
		}
		pg_free_result($resultado);
		pg_close($conexion);
		return $listaTareas;
	}
	else
	{
		return null;
	}
}

function createTareaDAO($idHistoria, $tarea)
{
	$conexion = conectar();
	$consulta = "INSERT INTO tareas(
            		id_historia,
					titulo, 
					detalle, 
					trabajo_consumido, 
            		estado, 
					trabajo_estimado)
    			VALUES (".$idHistoria.", ". $tarea->getTitulo() .", ". $tarea->getDetalle() .", ". $tarea->getTrabajoConsumido() .", '". $tarea.getEstado() ."', '". $tarea->getTrabajoCalculado() ."');";
	
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if($aux==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function updateTareaDAO($tarea)
{
	$conexion = conectar();
	$consulta = "UPDATE 
					tareas
   				SET   
					titulo='".$tarea->getTitilo()."', 
					detalle='".$tarea->getDetalle()."', 
					trabajo_consumido='".$tarea->getTrabajoConsumido()."', 
       				estado='".$tarea->getEstado()."', 
					trabajo_estimado='".$tarea->getTrabajoCalculado()."'
 				WHERE tarea.id=".$tarea->getId().";";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if($aux==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function deleteTareaDAO($idTarea)
{
	$conexion = conectar();
	$consulta = "DELETE FROM 
					tareas
 				WHERE id ='". $idTarea ."';";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if($aux==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function claimTareaDAO($idTarea, $idUser)
{
	$conexion = conectar();
	$consulta = "UPDATE
					tareas
   				SET
					id_usuario='".$idUser."',					
 				WHERE tarea.id=".$idTarea.";";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if($aux==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function updateTrabajoEstimadoDAO($idTarea, $cantidadDeTrabajo)
{
	$conexion = conectar();
	$consulta = "UPDATE
					tareas
   				SET					
					trabajo_estimado='".$cantidadDeTrabajo."'
 				WHERE tarea.id=".$idTarea.";";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if($aux==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function updateTrabajoConsumidoDAO($idTarea, $cantidadDeTrabajo)
{
	$conexion = conectar();
	$consulta = "UPDATE
					tareas
   				SET
					trabajo_consumido='".$cantidadDeTrabajo."', 
 				WHERE tarea.id=".$idTarea.";";
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	pg_free_result($resultado);
	pg_close($conexion);
	if($aux==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}





