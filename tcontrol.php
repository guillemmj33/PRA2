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

	////////////// Mètodes per a muntar llistes desplegables als fitxers HTML
	public function llistatSerie()
	{
		$p = new Tserie("","",0,$this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);	
		$res = $p->llistatSerie();
		return $res;
	}



	////////// Mètodes per a realitzar les opcions de menú
	public function volant ()
	{
		$ll = new TAvio ("","","","", $this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);
		$res = $ll->llistatVolant();
		return $res;
	}

	public function aterrats ($aeroport)
	{
		$ll = new TAvio ("","","",$aeroport, $this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);
		$res = $ll->llistatAterrats();
		return $res;
	}

/////////////////////////////////////////

}