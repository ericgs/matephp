<?php
//EVA: Entrega de Valor Agregado
class EVA
{
	protected $id;
	protected $numero;
	protected $fechaInicio;
	protected $fechaFin;
	protected $retrospectivas; //comentarios retrospectivos para la siguiente EVA
	protected $notasPlaneacion; //comentarios de la planeacion de la EVA actual
	protected $objetivos;
	protected $historias; //Array de historias
	protected $trabajoMaximo;
	protected $id_proyecto;
	
	public function getId() { return $this->id; }
	public function getNumero() { return $this->numero; }
	public function getFechaInicio() { return $this->fechaInicio; }
	public function getFechaFin() { return $this->fechaFin; }
	public function getRetrospectivas() { return $this->retrospectivas; }
	public function getNotasPlaneacion() { return $this->notasPlaneacion; }
	public function getObjetivos() { return $this->objetivos; }
	public function getEstado() { return $this->estado; }
	public function getHistorias() { return $this->historias; }
	public function getTrabajoMaximo() { return $this->TrabajoMaximo; }
	public function getIdProyecto() { return $this->id_proyecto; }
	public function setId($x) { $this->id = $x; }
	public function setNumero($x) { $this->numero = $x; }
	public function setFechaInicio($x) { $this->fechaInicio = $x; }
	public function setFechaFin($x) { $this->fechaFin = $x; }
	public function setRetrospectivas($x) { $this->retrospectivas = $x; }
	public function setNotasPlaneacion($x) { $this->notasPlaneacion = $x; }
	public function setObjetivos($x) { $this->objetivos = $x; }
	public function setEstado($x) { $this->estado = $x; }
	public function setHistorias($x) { $this->historias = $x; }
	public function setTrabajoMaximo($x) {$this->trabajoMaximo = $x;}
	public function setIdProyecto($x) {$this->id_proyecto = $x;}
}
?>