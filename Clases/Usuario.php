<?php
class Usuario
{
	protected $id;
	protected $nombre;
	protected $usuario;
	protected $mail;
	protected $clave;
	protected $proyectos;//Array de rolesw
	
	public function getId() { return $this->id; }
	public function getNombre() { return $this->nombre; }
	public function getUsuario() { return $this->usuario; }
	public function getMail() { return $this->mail; }
	public function getClave() { return $this->clave; }
	public function getProyectos() { return $this->proyectos; }
	public function setId($x) { $this->id = $x; }
	public function setNombre($x) { $this->nombre = $x; }
	public function setUsuario($x) { $this->usuario = $x; }
	public function setMail($x) { $this->mail = $x; }
	public function setClave($x) { $this->clave = $x; }
	public function setProyectos($x) { $this->proyectos = $x; }
	
	public function to_json() {
		$proy = array();
		foreach($this->proyectos as $p)
		{
			array_push($proy, $p->toArray());
		}
		return json_encode(array(
				'id' => $this->id,
				'nombre' => $this->nombre,
				'usuario' => $this->usuario,
				'mail' => $this->mail,
				'clave' => $this->clave,
				'proyectos' => $proy
		));
	}
}