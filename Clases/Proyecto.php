<?php

class Proyecto {
	protected $id;
	protected $nombre;
	protected $fechaInicio;
	protected $fechaFin;
	protected $historias;
	protected $evas;
	protected $roles; //roles del usuario actual
	
	public function to_json() {
		return json_encode(array(
				'id' => $this->id,
				'nombre' => $this->nombre,
				'fechaInicio' => $this->fechaInicio,
				'fechaFin' => $this->fechaFin,
				'historias' => $this->historias,
				'evas' => $this->evas,
				'roles' => $this->roles
		));
	}
	public function toArray() {
		return array(
				'id' => $this->id,
				'nombre' => $this->nombre,
				'fechaInicio' => $this->fechaInicio,
				'fechaFin' => $this->fechaFin,
				'historias' => $this->historias,
				'evas' => $this->evas,
				'roles' => $this->roles
				);
	}
	function setId($id) { $this->id = $id; }
	function getId() { return $this->id; }
	function setNombre($nombre) { $this->nombre = $nombre; }
	function getNombre() { return $this->nombre; }
	function setFechaInicio($fechaInicio) { $this->fechaInicio = $fechaInicio; }
	function getFechaInicio() { return $this->fechaInicio; }
	function setFechaFin($fechaFin) { $this->fechaFin = $fechaFin; }
	function getFechaFin() { return $this->fechaFin; }
	function setHistorias($historias) { $this->historias = $historias; }
	function getHistorias() { return $this->historias; }
	function setEvas($evas) { $this->evas = $evas; }
	function getEvas() { return $this->evas; }
	function setRoles($roles) { $this->roles = $roles; }
	function getRoles() { return $this->roles; }
}

?>