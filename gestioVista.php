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
				$res = $c->crearTemporada($temporada, $nomSerie, $quantitatCapitols, $qualificacio);
				if ($res) {
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
				break;
			}
		}
		
		case "Qualificar": {
			if (isset($_POST["temporades"])) {
				$temporada = $_POST["temporada"];
				$nomSerie = $_POST["nomSerie"];
				$quantitatCapitols = $_POST["quantitatCapitols"];
				$qualificacio = $_POST["qualificacio"];
				$c = new TControl();
				$res = $c->crearTemporada($temporada, $nomSerie, $quantitatCapitols, $qualificacio);
				if ($res) {
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
				break;
			}
		}

		case "Dades Sèrie": {
			if (isset($_POST["series"])) {
				$nom = $_POST["nom"];
				$plataforma = $_POST["plataforma"];
				$qualificacio = $_POST["qualificacio"];
				$temporadesPrevistes = $_POST["temporadesPrevistes"];
				$c = new TControl();
				$res = $c->crearSerie($nom, $plataforma, $qualificacio, $temporadesPrevistes);
				if ($res) {
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
				break;
			}
		}
	}

	
}





