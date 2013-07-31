<?php
require_once 'conexion.php';
require_once '../Clases/Proyecto.php';

	function getProyectosDeUsuarioDAO($idUsuario)
	{
		$conexion = conectar();
		$consulta = "SELECT 
	  					proyectos.id, 
	 					proyectos.nombre, 
	 					proyectos.fechainicio, 
	  					proyectos.fechafin
					FROM 
	 					 public.proyectos 
					JOIN
	  					public.usuarios_proyectos_roles
					ON
	  					(public.proyectos.id = public.usuarios_proyectos_roles.id_proyecto)
					WHERE 
	  					usuarios_proyectos_roles.id_usuario = '$idUsuario'
					GROUP BY 
	  					proyectos.id,
	  					proyectos.nombre,
	  					proyectos.fechainicio,
	  					proyectos.fechafin
					ORDER BY
	  					proyectos.nombre ASC;";
		$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
		$lista = array();
		
		$lista = pg_fetch_all($resultado);
		$listaProyectos = array();
		if(!empty ($lista))
		{
			foreach ($lista as $p)
			{
				
				$proyecto = new Proyecto();
		
				$proyecto->setNombre($p['nombre']);
				$proyecto->setFechaInicio($p['fechainicio']);
				$proyecto->setFechaFin($p['fechafin']);
				$proyecto->setId($p['id']);
				//Cargar roles del usuario para cada proyecto
				//$proyecto->setRoles(getRolesByProyecto($proyecto->getId(),$idUsuario));
				
				array_push($listaProyectos, $proyecto) ;
			}			
		}
		if($conexion)
		{
			pg_close($conexion);
		}
		pg_free_result($resultado);
		//var_dump($listaProyectos);
		return $listaProyectos;
	}
	
	function getRolesByProyecto($idProyecto, $idUsuario)
	{				
		$conexion = conectar();
		$consulta = "SELECT
						usuarios_proyectos_roles.rol
					FROM
						public.usuarios_proyectos_roles
					WHERE
						usuarios_proyectos_roles.id_usuario = '$idUsuario' AND
						usuarios_proyectos_roles.id_proyecto = '$idProyecto';";
		$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
		$lista = array();
		$lista = pg_fetch_all($resultado);
		pg_free_result($resultado);
		pg_close($conexion);
		return $lista;	
	}
	
	function getProyectoByID($idProyecto)
	{
		$conexion = conectar();
		$consulta = "SELECT 
	  					proyectos.id, 
	 					proyectos.nombre, 
	 					proyectos.fechainicio, 
	  					proyectos.fechafin
					FROM 
	 					 public.proyectos 				
					WHERE 
	  					proyectos.id = '$idProyecto';";

  							
		$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
		$aux = pg_fetch_row($resultado);
		  	   pg_free_result($resultado);
			   pg_close($conexion);
		require_once '../Clases/Proyecto';
		if(!$aux)
		{
			return false;
		}
		else
		{
		//Crear objeto proyecto y cargarle los datos
			require_once '../Clases/Proyecto';
				$proyecto = new Proyecto();
				$proyecto->setId($aux[0]);
				$proyecto->setNombre($aux[1]);
				$proyecto->setFechaInicio($aux[2]);
				$proyecto->setFechaFin($aux[3]);
			return $proyecto;
		}
	}	
	
	function updateProtectoDAO($proyecto)
	{
		require_once '../Clases/Proyecto';
		$pro = new Proyecto();
		$pro = $proyecto;


		$conexion = conectar();
		$consulta = "UPDATE
						proyectos
				 	SET
						nombre = '".$pro->getNombre()."',
						fechainicio = '".$pro->getFechaInicio()."',
						fechafin = '".$pro->getFechaFin()."'
					WHERE
						id = '". $pro->getId() ."'";
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

	function createProyectoDAO($proyecto)
	{
		require_once '../Clases/Proyecto';
		$pro = new Proyecto();
		$pro = $proyecto;
		
		
		$conexion = conectar();
		$consulta = "INSERT INTO 
						proyectos(nombre, fechaInicio, fechaFin) 
					VALUES ('".$pro->getNombre()."', '".$pro->getFechaInicio()."', '".$proyecto->getFechaFin()."');";
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
	
	function deleteProyectoDAO($idProyecto)
	{
		
		require_once '../Clases/Proyecto';
		$pro = new Proyecto();
		$pro = $proyecto;
		
		
		$conexion = conectar();
		$consulta = "DELETE FROM 
						proyectos 
					WHERE id='".$idProyecto."';";
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