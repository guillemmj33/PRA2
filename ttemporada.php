<?php
//Classe encarregada de la gestió de la taula TEMPORADA de la base de dades
include_once ("taccesbd.php");

class Ttemporada
{
  private $temporada;
  private $nomSerie;
  private $quantitatCapitols;
  private $qualificacio;
  private $abd;

  function __construct($v_temporada, $v_nomSerie, $v_quantitatCapitols, $v_qualificacio, $servidor, $usuari, $paraula_pas, $nom_bd)
  {
    $this->temporada = $v_temporada;
    $this->nomSerie = $v_nomSerie;
    $this->quantitatCapitols = $v_quantitatCapitols;
    $this->qualificacio = $v_qualificacio;
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
}