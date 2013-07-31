<?php
require_once 'conexion.php';
require_once '../Clases/Comentario.php';

function getComentariosDeHistoriaDAO($idHistoria)
{
	$conexion = conectar();
	$consulta = "SELECT 
				  comentarios_historia.id, 
				  comentarios_historia.detalle, 
				  comentarios_historia.fecha, 
				  usuarios.usuario
				FROM 
				  public.comentarios_historia 
				JOIN 
				  public.usuarios
				ON
				  (public.comentarios_historia.id_usuario = public.usuarios.id)
				WHERE 
				  comentarios_historia.id_historia = ". $idHistoria ."
				ORDER BY
				  comentarios_historia.fecha ASC;";
					
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	$lista = array();
	$lista = pg_fetch_all($resultado);
	$listaComentarios = array();
	if(!empty ($lista))
	{
		foreach ($lista as $c)
		{
					//Crear objeto Comentario y cargarle los datos		
			$com = new Comentario();
			$com->setId($c['id']);
			$com->setDetalle($c['detalle']);		
			$com->setFecha($c['fecha']);
			$com->setPersona($c['usuario']);
	
			array_push($listaComentarios, $com) ;
		}
		pg_free_result($resultado);
		pg_close($conexion);
		return $listaComentarios;
	}
	else
	{
		return null;
	}
}

function createComentarioDeHistoriaDAO($idHistoria, $comentario, $idUsuario)
{
	$conexion = conectar();
	$consulta = "IINSERT INTO 
					comentarios_historia
						(id_historia, detalle, fecha, id_usuario)
				VALUES (". $idHistoria .", '". $comentario.getDetalle() ."', '". $comentario.getFecha() ."', ". $idUsuario .");";
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

function UpdateComentarioDeHistoriaDAO($idUsuario, $comentario)
{
	$conexion = conectar();
	$consulta = "UPDATE 
					comentarios_historia
   				SET 
					detalle='". $comentario->getDetalle() ."', fecha='". $comentario->getFecha() ."', id_usuario='". $idUsuario ."'
 				WHERE 
					id ='". $comentario->getId() ."';
	";
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


function deleteComentarioDeHistoriaDAO($idComentario)
{
	$conexion = conectar();
	$consulta = "DELETE FROM 
					comentarios_historia
				WHERE id ='". $idComentario ."';";
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

function getComentariosDeTareaDAO($idTarea)
{
	$conexion = conectar();
	$consulta = "SELECT
				  comentarios_tarea.id,
				  comentarios_tarea.detalle,
				  comentarios_tarea.fecha,
				  usuarios.usuario
				FROM
				  public.comentarios_tarea
				JOIN
				  public.usuarios
				ON
				  (public.comentarios_tarea.id_usuario = public.usuarios.id)
				WHERE
				  comentarios_tarea.id_tarea =". $idHistoria ."
				ORDER BY
				  comentarios_tarea.fecha ASC;";
		
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$aux = pg_fetch_row($resultado);
	$lista = array();
	$lista = pg_fetch_all($resultado);
	$listaComentarios = array();
	if(!empty ($lista))
	{
		foreach ($lista as $c)
		{
			//Crear objeto Comentario y cargarle los datos
			$com = new Comentario();
			$com->setId($c['id']);
			$com->setDetalle($c['detalle']);
			$com->setFecha($c['fecha']);
			$com->setPersona($c['usuario']);

			array_push($listaComentarios, $com) ;
		}
		pg_free_result($resultado);
		pg_close($conexion);
		return $listaComentarios;
	}
	else
	{
		return null;
	}
}

function createComentarioDeTareaDAO($idTarea, $comentario, $idUsuario)
{

	$conexion = conectar();
	$consulta = "IINSERT INTO
					comentarios_tarea
						(id_tarea, detalle, fecha, id_usuario)
				VALUES (". $idTarea .", '". $comentario.getDetalle() ."', '". $comentario.getFecha() ."', ". $idUsuario .");";
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

function UpdateComentarioDeTareaDAO($idUsuario, $comentario)
{
	$conexion = conectar();
	$consulta = "UPDATE
					comentarios_tarea
   				SET
					detalle='". $comentario->getDetalle() ."', fecha='". $comentario->getFecha() ."', id_usuario='". $idUsuario ."'
 				WHERE
					id ='". $comentario->getId() ."';
	";
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


function deleteComentarioDeTareaDAO($idComentario)
{

	$conexion = conectar();
	$consulta = "DELETE FROM
					comentarios_tarea
				WHERE id ='". $idComentario ."';";
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



?>