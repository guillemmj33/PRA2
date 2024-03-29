<?php

include './taccesbd.php';

$objDB = new DbConnect;
$conn = $objDB->connect();

/*********************** NOVA SÈRIE HTML ***********************/
if (isset($_POST['form_submit'])) {
  $nomSerie = $_POST["nomSerie"];
  $plataformaSerie = $_POST["plataformaSerie"];
  $temporadesPrevistes = $_POST["temporadesPrevistes"];

  try {
    //fem comprovació de que la sèrie no existeix
    $validation_query = $conn->prepare("SELECT * FROM serie WHERE nom = '$nomSerie'");
    $validation_query->execute([$nomSerie]);
    if ($validation_query->rowCount()>0) {
      echo '
      <div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:grey;border-radius:10px">
        La sèrie que vols afegir ja existeix. Si us plau, escull una altra.
      </div>
      <a href="novaSerie.html">Tornar</a>
      ';
    } else {
      //Introduïm les dades amb protecció contra atacs 
      $insert = $conn->prepare("INSERT INTO serie (nom, plataforma, temporadesPrevistes) VALUES (:nomSerie, :plataformaSerie, :temporadesPrevistes)");
      $insert->bindValue(":nomSerie", $nomSerie);
      $insert->bindValue(":plataformaSerie", $plataformaSerie);
      $insert->bindValue(":temporadesPrevistes", $temporadesPrevistes);
      if($insert->execute([$nomSerie, $plataformaSerie, $temporadesPrevistes])){
        echo '
        <div style="font-size:1.4rem;font-weight:bold;text-align:center;border:1px solid black;margin-left:350px;margin-right:350px;padding:50px;background-color:green;border-radius:10px">
          La sèrie ha estat guardada correctament.
        </div>
        <a href="novaSerie.html">Tornar</a>
        ';
      }
    }
  } catch (PDOException $e){
    echo $e->getMessage();
  }
  $conn = null;
}

/*********************** NOVA TEMPORADA HTML ***********************/
?>