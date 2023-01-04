<?php
header("Content-Type: text/html;charset=utf-8");

include_once("tcontrol.php");

if (isset($_POST["opcio"]))
{
	$opcio = $_POST["opcio"];
	switch ($opcio)
	{
		case "Nova Sèrie": {
			if (isset($_POST["series"])) {
				$nom = $_POST["nom"];
				$plataforma = $_POST["plataforma"];
				$qualificacio = $_POST["qualificacio"];
				$temporadesPrevistes = $_POST["temporadesPrevistes"];
				$c = new TControl();
				$res = $c->crearSerie($nom, $plataforma, $qualificacio, $temporadesPrevistes);
				if ($res) {
					echo '
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Nova Sèrie</title>
					</head>
					<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:green;border-radius:10px">
						La sèrie ha estat guardada correctament.
					</div>
					<br>
					<br>
					<center><a href="index.html">Tornar al menú principal</a></center>
				';
				} else {
					echo '
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
							<title>Nova Sèrie</title>
						</head>
						<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
							La sèrie que vols afegir ja existeix. Si us plau, escull una altra.
						</div>
						<br>
						<br>
						<center><a href="index.html">Tornar al menú principal</a></center>
					';
				}
				break;
			}
		}

		case "Nova Temporada": {
			if (isset($_POST["temporades"])) {
				$temporada = $_POST["temporada"];
				$nomSerie = $_POST["nomSerie"];
				$quantitatCapitols = $_POST["quantitatCapitols"];
				$qualificacio = $_POST["qualificacio"];
				$c = new TControl();
				$res = $c->llistatSeries();
				if ($res) {
					echo '
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Nova Temporada</title>
					</head>
					<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:green;border-radius:10px">
						La temporada ha estat guardada correctament.
					</div>
					<br>
					<br>
					<center><a href="index.html">Tornar al menú principal</a></center>
				';
				} else {
					echo '
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Nova Temporada</title>
					</head>
					<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
						La temporada que vols afegir ja existeix. Si us plau, escull una altra.
					</div>
					<br>
					<br>
					<center><a href="index.html">Tornar al menú principal</a></center>
				';
				}
				break;
			}
		}
		
		case "Qualificar": {
			if (isset($_POST["qualificar"])) {
				$temporada = $_POST["temporada"];
				$nomSerie = $_POST["nomSerie"];
				$quantitatCapitols = $_POST["quantitatCapitols"];
				$qualificacio = $_POST["qualificacio"];
				$c = new TControl();
				$res = $c->crearTemporada($temporada, $nomSerie, $quantitatCapitols, $qualificacio);
				if ($res) {
					echo '
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Qualificar</title>
					</head>
					<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:green;border-radius:10px">
						La temporada ha estat guardada correctament.
					</div>
					<br>
					<br>
					<center><a href="index.html">Tornar al menú principal</a></center>
				';
				} else {
					echo '
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Qualificar</title>
					</head>
					<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
						La temporada que vols afegir ja existeix. Si us plau, escull una altra.
					</div>
					<br>
					<br>
					<center><a href="index.html">Tornar al menú principal</a></center>
				';
				}
				break;
			}
		}

		case "Mostrar": {
			if (isset($_POST["dadesSerie"])) {
				$temporada = $_POST["temporada"];
				$plataforma = $_POST["plataforma"];
				$nomSerie = $_POST["nomSerie"];
				$temporadesPrevistes = $_POST["temporadesPrevistes"];
				$quantitatCapitols = $_POST["quantitatCapitols"];
				$qualificacio = $_POST["qualificacio"];
				$c = new TControl();
				$res = $c->dadesSerie($nom, $plataforma, $qualificacio, $temporadesPrevistes);
				if ($res) {
					echo ('<html>
					
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Dades Sèrie</title>
					</head>
					
					<body>
						<center>
							<h1>Temporades de la sèrie '.$nomSerie.' de '.$plataforma.'<br>amb una qualificació de '.$qualificacio.'<br>amb un total de '.$temporadesPrevistes.' temporades previstes<br></h1>
							<br>
							');
							
					echo ($res);
					echo ('<br><br><a href="index.html"> Tornar al menú principal </a></center></body></html>');
					
				} else {
					echo '
						<div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
							Error en generar la llista de dades de la sèrie.
						</div>
						<br>
						<br>
						<center><a href="index.html">Tornar al menú principal</a></center>
					';
				}
				break;
			}
		}
	}
}





