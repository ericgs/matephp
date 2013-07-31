<?php
require_once 'conexion.php';
require_once '../Clases/EVA.php';

function GetListaDeEVASDAO($idProyecto)
{
	$conexion = conectar();
	$consulta = "SELECT 
						id, 
						id_proyecto, 
						numero_eva, 
						fecha_inicio, 
						fecha_fin, 
						trabajo_maximo,
						objetivos, 
						planeacion, 
						retrospectivas
					FROM 
						evas
					WHERE 
						id_proyecto =" + $idProyecto;
	
	$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
	$lista = array();
	$lista = pg_fetch_all($resultado);
	$ListaEVAS = array();
	if(!empty ($lista))
	{
		foreach ($lista as $aux)
		{
				$EVA = new EVA();
				$EVA->setId($aux[0]);
				$EVA->setId($aux[1]);
				$EVA->setNumero($aux[2]);
				$EVA->setFechaInicio($aux[3]);
				$EVA->setFechaFin($aux[4]);
				$EVA->setTrabajoMaximo($aux[5]);
				$EVA->setObjetivos($aux[6]);
				$EVA->setNotasPlaneacion($aux[7]);
				$EVA->setRetrospectivas($aux[8]);	
				$EVA->setNombreCorto($aux[9]);	
	
			array_push($ListaEVAS, $historia);
		}
		pg_free_result($resultado);
		pg_close($conexion);
		return $ListaEVAS;
	}
	else
	{
		pg_free_result($resultado);
		pg_close($conexion);
		return null;
	}
}

function GetEVADAO($idEVA)
{
$conexion = conectar();

		$consulta = "SELECT 
						id, 
						id_proyecto, 
						numero_eva, 
						fecha_inicio, 
						fecha_fin, 
						trabajo_maximo,
						objetivos, 
						planeacion, 
						retrospectivas
					FROM 
						evas
					WHERE 
						id =" + $idEVA;

  							
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
		//Crear objeto historia y cargarle los datos
				$EVA = new EVA();
				$EVA->setId($aux[0]);
				$EVA->setId($aux[1]);
				$EVA->setNumero($aux[2]);
				$EVA->setFechaInicio($aux[3]);
				$EVA->setFechaFin($aux[4]);
				$EVA->setTrabajoMaximo($aux[5]);
				$EVA->setObjetivos($aux[6]);
				$EVA->setNotasPlaneacion($aux[7]);
				$EVA->setRetrospectivas($aux[8]);	
				$EVA->setNombreCorto($aux[9]);		
				
				
			return $EVA;
		}
	}	

function CreateEVADAO($eva)
{
	//intelicense trick
	if(false)
		$eva = new EVA();
	
		$conexion = conectar();
		$consulta = "INSERT INTO evas(
										id_proyecto, 
										numero_eva, 
										fecha_inicio, 
										fecha_fin, 
										trabajo_maximo, 
						            	objetivos, 
										planeacion, 
										retrospectivas
										)
   					 VALUES ("+$eva->getIdProyecto()+",
   					 		"+nextEva($eva->getIdProyecto())+" , 
   					 		"+ $eva->getFechaInicio() +", 
   					 		"+ $eva->getFechaFin() +", 
   					 		"+ $eva->getTrabajoMaximo() +", 
   					 		"+ $eva->getObjetivos() +", 
   					 		"+ $eva->getNotasPlaneacion() +",
   					 		"+ $eva->getRetrospectivas() +");";
		echo $consulta;
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

	function nextEva($idProyecto)
	{
	
		$conexion = conectar();
	
		$consulta = "SELECT
						MAX(numero_eva)
					FROM
						evas
					WHERE
						id_proyecto = " + $idProyecto;
	
			
		$resultado = pg_query($consulta) or die('Consulta fallida: ' . pg_last_error());
		$aux = pg_fetch_row($resultado);
		pg_free_result($resultado);
		pg_close($conexion);
		return $aux;
	}
	
	
	
	function UpdateEVADAO($eva)
	{
		//intelicense trick
		if(false)
			$eva = new EVA();
		
			$conexion = conectar();
			$consulta = "UPDATE 
							evas
   						SET
							fecha_fin="+ $eva->getFechaFin() +", 
       						trabajo_maximo="+$eva->getTrabajoMaximo()+", 
							objetivos="+$eva->getObjetivos()+", 
							planeacion="+$eva->getNotasPlaneacion()+", 
							retrospectivas="+$eva->getRetrospectivas()+"
 						WHERE 
							id=" + $idEva;
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
	

