<?php 

abstract class databaseModel{

	private static $host = 'localhost';
	private static $usuario = 'root';
	private static $pass = '';
	protected $nombre_db = "avisos";
	protected $consulta;
	protected $registros = array();
	private $conexion;

	abstract protected function get();
	abstract protected function set();
	abstract protected function editar();
	abstract protected function eliminar();

	private function abrir_conexion(){
		$this->conexion = new mysqli(self::$host,
									 self::$usuario,
									 self::$pass,
									 $this->nombre_db);
	}

	private function cerrar_conexion(){
		$this->conexion->close();
	}

	//Ejecutar consulta simple
	//INSERT, DELETE, UPDATE
	protected function consulta_simple(){
		$this->abrir_conexion();
		$this->conexion->query($this->consulta);
		$this->close_connection();
	}

	//Traer resultados de una consulta en un Array
	protected function resultado_de_consulta(){
		$this->abrir_conexion();
		$resultado = $this->conexion->query($this->consulta);
		while($this->registros[] = $resultado->fetch_assoc());
		$resultado->close();
		$this->close_connection();
		array_pop($this->registros);

	}

	




	


	







}

