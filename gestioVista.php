<?php

$nomSerie = $_POST["nomSerie"];
$plataformaSerie = $_POST["plataformaSerie"];
$temporadesPrevistes = filter_input(INPUT_POST, "temporadesPrevistes", FILTER_VALIDATE_INT);

//creem la connexió a la nostra base de dades
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "PRA2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//fem comprovació de que la sèrie no existeix
$query = mysqli_query($conn, "SELECT * FROM serie WHERE nom = '$nomSerie'");
if(mysqli_num_rows($query) > 0){
  echo "La sèrie que vols afegir ja existeix. Si us plau, escull una altra.";
} else {
  //afegim les dades d'una nova sèrie amb protecció contra inject attacks
  $sql = "INSERT INTO serie (nom, plataforma, temporadesPrevistes) 
  VALUES (?, ?, ?)";

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "ssi", $nomSerie, $plataformaSerie, $temporadesPrevistes);

  mysqli_stmt_execute($stmt);

  echo "La sèrie ha estat guardada correctament.";
}

?>