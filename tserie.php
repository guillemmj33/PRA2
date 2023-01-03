<?php
//Classe MODEL encarregada de la gestió de la taula SERIE de la base de dades
include_once ("taccesbd.php");

class Tserie
{
  private $nom;
  private $plataforma;
  private $qualificacio;
  private $temporadesPrevistes;
  private $abd;

  function __construct($v_nom, $v_plataforma, $v_qualificacio, $v_temporadesPrevistes, $servidor, $usuari, $paraula_pas, $nom_bd)
  {
    $this->nom = $v_nom;
    $this->plataforma = $v_plataforma;
    $this->qualificacio = $v_qualificacio;
    $this->temporadesPrevistes = $v_temporadesPrevistes;
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

  public function existeix_serie()
  {
    $res = false;
    if (
      $this->abd->consulta_SQL("
    select count(*) as quants
    from serie
    where nom = '" .
        $this->abd->escapar_dada($this->nom) . "'")
    ) {
      if ($this->abd->consulta_fila()) {
        $res = ($this->abd->consulta_dada('quants') > 0);
      }
    }
    return $res;
  }

  public function crearSerie()
  {
    $res = false;
    //es comprova que la sèrie no està ja a la base de dades
    if (!($this->existeix_serie())) { //si efectivament no hi és, s'insereix
      if (
        $this->abd->consulta_SQL("INSERT INTO serie
   VALUES ('" .
          $this->abd->escapar_dada($this->nom) . "','" .
          $this->abd->escapar_dada($this->plataforma) . "'," .
          $this->abd->escapar_dada($this->qualificacio) . "," .
          $this->abd->escapar_dada($this->temporadesPrevistes) . ")")
      ) {
        $res = true;
      }
    }
    return $res;
  }

  public function llistatDadesSerie()
  {
    $res = false;
    if ($this->abd->consulta_SQL("select temporada, nomSerie, quantitatCapitols, qualificacio from temporada order by temporada")) {
      $fila = $this->abd->consulta_fila();
      $res = "<table border=1><tr bgcolor='lightgreen'>
                        <th>Temporada</th><th>Capítols</th><th>Qualificació</th>
                    </tr> ";
      while ($fila != null) {
        $temporada = $this->abd->consulta_dada('temporada');
        $nomSerie = $this->abd->consulta_dada('nomSerie');
        $quantitatCapitols = $this->abd->consulta_dada('quantitatCapitols');
        $qualificacio = $this->abd->consulta_dada('qualificacio');

        $res = $res . "<tr>";
        $res = $res . "<td>$temporada</td>";
        $res = $res . "<td>$quantitatCapitols</td>";
        $res = $res . "<td align='right'>$qualificacio</td>";
        $res = $res . "</tr>";
        $fila = $this->abd->consulta_fila();
      }
      $res = $res . "</table>";
      $this->abd->tancar_consulta();
    } else {
      $res = "<h2>Temporades de la sèrie " . $this->nom . " de " . $this->plataforma . " sense qualificar encara amb un total de " . $this->temporadesPrevistes . " temporades previstes"  . "</h2>";
    }
    return $res;
  }
}