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

	/******************** APARTAT B ********************/
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

	/******************** APARTAT C ********************/
	public function llistatSeries()
	{
		$p = new Ttemporada("","",0,0,$this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);	
		$res = $p->llistatSeries();
		return $res;
	}

	public function crearTemporada($temporada, $nomSerie, $quantitatCapitols, $qualificacio)
	{
		$e = new Ttemporada(
			$temporada,
			$nomSerie,
			$quantitatCapitols,
			$qualificacio, $this->servidor,
				$this->usuari, $this->paraula_pas,
				$this->nom_bd
		);
		$res = $e->crearTemporada();
		return $res;
	}

	/******************** APARTAT E ********************/
	public function dadesSerie ()
	{
		$ll = new Tserie ("","",0, 0, $this->servidor, $this->usuari, $this->paraula_pas, $this->nom_bd);
		$res = $ll->llistatDadesSerie();
		return $res;
	}
}