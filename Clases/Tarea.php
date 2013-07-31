<?php
class Tarea
{
	protected $id;
	protected $titulo;
	protected $detalle;
	protected $trabajoCalculado;
	protected $trabajoConsumido;
	protected $estado;
	protected $comentarios;
	protected $owner;
	protected $tituloCorto;
	
	function setId($id) { $this->id = $id; }
	function getId() { return $this->id; }
	function setTitulo($titulo) { $this->titulo = $titulo; }
	function getTitulo() { return $this->titulo; }
	function setDetalle($detalle) { $this->detalle = $detalle; }
	function getDetalle() { return $this->detalle; }
	function setTrabajoCalculado($trabajoCalculado) { $this->trabajoCalculado = $trabajoCalculado; }
	function getTrabajoCalculado() { return $this->trabajoCalculado; }
	function setTrabajoConsumido($trabajoConsumido) { $this->trabajoConsumido = $trabajoConsumido; }
	function getTrabajoConsumido() { return $this->trabajoConsumido; }
	function setEstado($estado) { $this->estado = $estado; }
	function getEstado() { return $this->estado; }
	function setComentarios($comentarios) { $this->comentarios = $comentarios; }
	function getComentarios() { return $this->comentarios; }
	function setOwner($owner) { $this->owner = $owner; }
	function getOwner() { return $this->owner; }
	function setNombreCorto($nombreCorto) { $this->nombreCorto = $nombreCorto; }
	function getNombreCorto() { return $this->id; }
}
?>