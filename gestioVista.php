<?php
header("Content-Type: text/html;charset=utf-8");
include_once("tcontrol.php");

function mostrarError ($missatge)
{
	echo "<table bgcolor=grey align=center border = 1 cellpadding = 10>";
	echo "<tr><td><br><h2> $missatge </h2><br><br></td></tr>";
	echo "</table>";		
};

function mostrarMissatge ($missatge)
{
	echo "<table bgcolor=#ffffb7 align=center border = 1 cellpadding = 10>";
	echo "<tr><td><br><h2> $missatge </h2><br><br></td></tr>";
	echo "</table>";		
};

/************************** APARTAT B **************************/
class TGestioVista
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
























// APARTAT D
// Aquí van les opcions de menú que necessiten demanar a l'usuari alguna dada addicional 
if (isset($_POST["serie"]))
{
	$serie = $_POST["serie"];
	switch ($serie)
	{
		case "Llistat":
		{
			if (isset($_POST["aeroport"]))
			{
				$aeroport = $_POST["aeroport"];
				$c = new TControl();
				$res = $c->aterrats($aeroport);
				if ($res)
				{
					echo ('<html>

					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title> Llistat avions aterrats </title>
					</head>
					
					<body>
						<center>
							<h1>LLISTAT D´AVIONS ATERRATS A  <br>'.$aeroport.' <br></h1>
							<br> <br>');
					echo ($res);
					echo ('<br><a href="index.html"> Tornar </a></center></body></html>');
				}
				else
				{
					mostrarError("Error en generar la llista d'avions aterrats a $aeroport");
				}
			}
			break;	
		}
	}
}





