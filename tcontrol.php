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

	// Crear Serie a Tcontrol
	public function crearSerie()
	{
		$s = new Tserie($_POST["nom"],$_POST["plataforma"],$_POST["temporades"], $this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);
		$res = $s->crearSerie();
		return ($res);
	}

	////////// Mètodes per a realitzar les opcions de menú
	public function llistatTemporades ()
	{
		$ll = new Ttemporada ("","","", $this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);
		$res = $ll->llistatTemporades();
		return $res;
	}

}