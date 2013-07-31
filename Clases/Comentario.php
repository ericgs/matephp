<?php
class Comentario
{
	protected $id;
	protected $detalle;
	protected $persona;
	protected $fecha;
	
	public function getId() { return $this->id; }
	public function getDetalle() { return $this->detalle; }
	public function getPersona() { return $this->persona; }
	public function getFecha() { return $this->fecha; }
	public function setId($x) { $this->id = $x; }
	public function setDetalle($x) { $this->detalle = $x; }
	public function setPersona($x) { $this->persona = $x; }
	public function setFecha($x) { $this->fecha = $x; }
}
?>