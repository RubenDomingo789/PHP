<?php
require_once('Modelo/Conexion.php');
class Paginacion extends Conexion
{
	private $conexion;

	private $elementos_pagina;
	private $inicio;
	private $num_total_filas;
	private $paginas;
	private $nPaginas;

	function __construct()
	{
		$this->conexion = Conexion::conectar();
		$this->elementos_pagina = 4;
	}

	public function total($tabla)
	{
		try {
			$conn = $this->conexion;
			$result = $conn->query("SELECT COUNT(*) AS total FROM $tabla");
			$row = $result->fetch();
			$this->num_total_filas = $row['total'];
			$this->paginas = ceil($this->num_total_filas / $this->elementos_pagina);
			return $this->paginas;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function inicio()
	{
		$this->inicio = ($this->nPaginas - 1) *  $this->elementos_pagina;
		return $this->inicio;
	}

	public function setProperty($propiedad, $nuevoValor) {
		$this->$propiedad = $nuevoValor;
	}

	public function getProperty($propiedad) {
		return $this->$propiedad;
	}
}
