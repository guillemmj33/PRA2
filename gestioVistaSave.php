<?php
header("Content-Type: text/html;charset=utf-8");

include_once("tcontrol.php");

/************************** APARTAT B **************************/
class TGestioVistaSerie
{
	private $nom;
	private $plataforma;
	private $qualificacio;
	private $temporadesPrevistes;

	function __construct($v_nom, $v_plataforma, $v_qualificacio, $v_temporadesPrevistes)
	{
		$this->nom = $v_nom;
		$this->plataforma = $v_plataforma;
		$this->qualificacio = $v_qualificacio;
		$this->temporadesPrevistes = $v_temporadesPrevistes;
	}

	public function crearSerie()
	{
		$c = new TControl();
		$res = $c->crearSerie($this->nom, $this->plataforma, $this->qualificacio, $this->temporadesPrevistes);
		return $res;
	}
}

$g_e = new TGestioVistaSerie($_POST['nom'], $_POST['plataforma'], $_POST['qualificacio'], $_POST['temporadesPrevistes']);
	if ($g_e->crearSerie()) {
		echo '
			<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:green;border-radius:10px">
				La sèrie ha estat guardada correctament.
			</div>
			<br>
			<br>
			<center><a href="index.html">Tornar al menú principal</a></center>
		';
	} else {
		echo '
		<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
			La sèrie que vols afegir ja existeix. Si us plau, escull una altra.
		</div>
		<br>
		<br>
		<center><a href="index.html">Tornar al menú principal</a></center>
  ';
}

/************************** APARTAT C **************************/
class TGestioVistaTemporada 
{
	private $temporada;
	private $nomSerie;
	private $quantitatCapitols;
	private $qualificacio;

	function __construct($v_temporada, $v_nomSerie, $v_quantitatCapitols, $v_qualificacio)
	{
		$this->temporada = $v_temporada;
		$this->nomSerie = $v_nomSerie;
		$this->quantitatCapitols = $v_quantitatCapitols;
		$this->qualificacio = $v_qualificacio;
	}

	public function crearTemporada()
	{
		$c = new TControl();
		$res = $c->crearTemporada($this->temporada, $this->nomSerie, $this->quantitatCapitols, $this->qualificacio);
		return $res;
	}
}

$t_e = new TGestioVistaTemporada($_POST['temporada'], $_POST['nomSerie'], $_POST['quantitatCapitols'], $_POST['qualificacio']);
	if ($t_e->crearTemporada()) {
		echo '
			<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:green;border-radius:10px">
				La temporada ha estat guardada correctament.
			</div>
			<br>
			<br>
			<center><a href="index.html">Tornar al menú principal</a></center>
		';
	} else {
		echo '
		<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
			La temporada que vols afegir ja existeix. Si us plau, escull una altra.
		</div>
		<br>
		<br>
		<center><a href="index.html">Tornar al menú principal</a></center>
  ';
}