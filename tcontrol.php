<?php
header("Content-Type: text/html;charset=utf-8");

include_once ("tserie.php");
include_once ("ttemporada.php");

class TControl
{
	private $servidor;
	private $usuari;
	private $paraula_pas;
	private $nom_bd;
  
	function __construct()
	{
		$this->servidor = "localhost";
		$this->usuari = "root";
		$this->paraula_pas = "root";
		$this->nom_bd = "PRA2";
	}

	public function crearSerie($nom, $plataforma, $qualificacio, $temporadesPrevistes)
	{
		$e = new Tserie(
			$nom,
			$plataforma,
			$qualificacio,
			$temporadesPrevistes, $this->servidor,
				$this->usuari, $this->paraula_pas,
				$this->nom_bd
		);
		$res = $e->crearSerie();
		return $res;
	}
	
}