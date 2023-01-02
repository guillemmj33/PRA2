<?php
//Classe encarregada de la gestió de la taula SERIE de la base de dades
include_once ("taccesbd.php");

class Tserie
{
  private $nom;
  private $plataforma;
  private $temporades;
  private $abd;

  function __construct($v_nom, $v_plataforma, $v_temporades, $servidor, $usuari, $paraula_pas, $nom_bd)
  {
    $this->nom = $v_nom;
    $this->plataforma = $v_plataforma;
    $this->temporades = $v_temporades;
    $var_abd = new TAccesbd($servidor,$usuari,$paraula_pas,$nom_bd);
    $this->abd = $var_abd;
    $this->abd->connectar_BD();
  }

  function __destruct()
  {
    if (isset($this->abd))
    {
    unset($this->abd);
    }
  }

  public function crearSerie()
  {
    echo "hola";
    $res = false;
    $nom = $_POST["nom"];
    if ($this->abd->consulta_SQL("SELECT * FROM serie WHERE nom = '$nom'"))
    {
      echo "La serie sí existe";
    }
    return $res; 
  }
/* 
    $sql = "INSERT INTO serie (nom, plataforma, temporadesPrevistes) VALUES (?, ?, ?)";
    var_dump($sql);
    mysqli_stmt_bind_param($mysqli, "ssi", $nomSerie, $plataformaSerie, $temporadesPrevistes);
    if($mysqli->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    } */


  /* public function llistatSeries()
  {
    $res = false;
    if ($this->abd->consulta_SQL("SELECT nom, plataforma, qualificacio, temporadesPrevistes FROM serie ORDER BY nom"))
    {   
      $fila = $this->abd->consulta_fila();
      $res =  "<select name='serie'>";
      while ($fila != null)
      {
        $nom = $this->abd->consulta_dada('nom');
        $plataforma = $this->abd->consulta_dada('plataforma');
        $qualificacio = $this->abd->consulta_dada('qualificacio');
        $temporadesPrevistes = $this->abd->consulta_dada('temporadesPrevistes');
                    
        $res = $res . "<option value='" . $fila["nom"] . " - " . $fila["plataforma"] . " - " . $fila["qualificacio"] . " - " . $fila["temporadesPrevistes"] . "</option>";
        
        $fila = $this->abd->consulta_fila();
      }
      $res = $res . "</select><br>";
      $this->abd->tancar_consulta();
    }
    else
    {
      $res = "<select name='serie'></select><br>";
    }
    return $res; 
  } */

}