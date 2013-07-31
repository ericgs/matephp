<?php
class Historia
{
	protected $id;
	protected $idProyecto;
	protected $titulo;
	protected $numero;
	protected $detalle;
	protected $riesgo;
	protected $orden;
	protected $prueba; //string; lista de pruebas que debe superar la historia
	protected $tareas; //Array con objetos Tarea
	protected $costo;
	protected $nombreCorto;
	
	public function getId() { return $this->id; } 
	public function getIdProyecto() { return $this->idProyecto; }
	public function getTitulo() { return $this->titulo; } 
	public function getNumero() { return $this->numero; } 
	public function getDetalle() { return $this->detalle; }
	public function getRiesgo() { return $this->riesgo; } 
	public function getOrden() { return $this->orden; } 
	public function getPrueba() { return $this->prueba; } 
	public function getTareas() { return $this->tareas; } 
	public function getCosto() { return $this->costo; } 
	public function setId($x) { $this->id = $x; } 
	public function setIdProyecto($x) { $this->idProyecto = $x; }
	public function setTitulo($x) { $this->titulo = $x; } 
	public function setNumero($x) { $this->numero = $x; } 
	public function setDetalle($x) { $this->detalle = $x; } 
	public function setRiesgo($x) { $this->riesgo = $x; } 
	public function setOrden($x) { $this->orden = $x; } 
	public function setPrueba($x) { $this->prueba = $x; } 
	public function setTareas($x) { $this->tareas = $x; } 
	public function setCosto($x) { $this->costo = $x; } 
	public function setNombreCorto($x) { $this->nombreCorto = $x; }
	public function getNombreCorto() { return $this->nombreCorto; }
}
?>