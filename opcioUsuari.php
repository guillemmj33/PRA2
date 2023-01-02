<?php
header("Content-Type: text/html;charset=utf-8");

if (isset($_POST["serie"]))
{
	$opcio = $_POST["serie"];
	switch ($opcio)
	{
		case "novaSerie":
			include_once("novaSerie.html");
			break;
		
		case "novaTemporada":
		
			include_once("novaTemporada.html");
			break;
	
		case "qualificarTemporada":
		
			include_once("qualificar.html");
			break;
	
		case "dadesSerie":
		
			include_once("dadesSerie.html");
			break;
	
		default:
			echo "<br>ERROR: Opció no disponible<br>";
	}
}
?>