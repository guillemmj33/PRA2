<?php
//Classe MODEL encarregada de la gestió de la taula TEMPORADA de la base de dades
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

  public function llistatSeries()
  {
    $res = false;
    if ($this->abd->consulta_SQL("select nom, plataforma, qualificacio, temporadesPrevistes from serie order by nom")) {
      $fila = $this->abd->consulta_fila();
      $res = "<select name='temporades'>";
      while ($fila != null) {
        $nom = $this->abd->consulta_dada('nom');
        $plataforma = $this->abd->consulta_dada('plataforma');
        $qualificacio = $this->abd->consulta_dada('qualificacio');
        $temporadesPrevistes = $this->abd->consulta_dada('temporadesPrevistes');

        $res = $res . "<option value='" . $nom . "'>" . $nom . " - " . $plataforma . " - " . $qualificacio . " - " . $temporadesPrevistes . "</option>";

        $fila = $this->abd->consulta_fila();
      }
      $res = $res . "</select><br>";
      $this->abd->tancar_consulta();
    } else {
      $res = "<select name='temporades'></select><br>";
    }
    return $res;
  }

/*   public function existeix_temporada()
  {
    $res = false;
    if (
      $this->abd->consulta_SQL("
    select count(*) as quants
    from temporada
    where temporada = '" .
        $this->abd->escapar_dada($this->temporada) . "'")
    ) {
      if ($this->abd->consulta_fila()) {
        $res = ($this->abd->consulta_dada('quants') > 0);
      }
    }
    return $res;
  } */

/*   //comprovar si el número que es genera és més petit que temporadesPrevistes de la taula sèrie
  public function max_temporades()
  {
    $res = false;
    if (
      $this->abd->consulta_SQL("
    select count(*) as quants
    from serie
    where temporadesPrevistes = '" .
        $this->abd->escapar_dada($this->temporadesPrevistes) . "'")
    ) {
      if ($this->abd->consulta_fila()) {
        $res = ($this->abd->consulta_dada('quants') > 0);
      }
    }
    return $res;
  }
 */
  public function crearTemporada()
  {
  $res = false;
    if (
      $this->abd->consulta_SQL("INSERT INTO temporada
  VALUES (" .
        $this->abd->escapar_dada($this->temporada) . ",'" .
        $this->abd->escapar_dada($this->nomSerie) . "'," .
        $this->abd->escapar_dada($this->quantitatCapitols) . "," .
        $this->abd->escapar_dada($this->qualificacio) . ")")
    ) {
      $res = true;
    }
    return $res;
  }
}