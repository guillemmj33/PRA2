<?php
class TAccesbd
{
  private $bd;
  private $host;
  private $user;
  private $pass;
  private $connexio;
  private $dades;
  private $fila;

  function __construct($host , $user , $pass, $bd)
  {
    $this->bd = $bd;
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
  }

  public function connectar_BD()
  {
    $res = true;
    $this->connexio = @mysqli_connect ($this->host, $this->user,
    $this->pass, $this->bd);
    mysqli_set_charset($this->connexio,"utf8");
    if (!$this->connexio)
    {
      $res = false;
      die("No s'ha pogut realitzar la connexió. ERROR:" .
      mysqli_connect_error());
    }
    return $res;
  }

  public function desconnectarBd()
  {
    if (isset($this->connexio))
    {
      mysqli_close($this->connexio);
    }
  }

  public function escapar_dada ($dada)
  {
    return mysqli_real_escape_string($this->connexio,$dada);
  }

  public function consulta_SQL ($consulta)
  {
    $this->dades = mysqli_query ($this->connexio, $consulta);
    if (mysqli_errno($this->connexio) != 0)
    {
        $res = false;
    }
    else
    {
        $res = true;
    }
    return $res;
  }

  public function consulta_fila ()
  {
    $this->fila = null;
    if ($this->dades != null)
    {
        $this->fila = mysqli_fetch_assoc($this->dades);
    }
    return $this->fila;
  }

  public function consulta_dada ($camp)
  {
    $res = null;
    if ($this->fila != null)
    {
        $res = $this->fila[$camp];
    }
    return $res;
  }

  public function files_afectades ()
  {
    $res = 0;
    if ($this->connexio != null)
    {
        $res = mysqli_affected_rows($this->connexio);
    }
    return ($res);
  }

  public function tancar_consulta ()
  {
    mysqli_free_result($this->dades);
  }

  public function missatge_error ()
  {
    $res = "";
    if (mysqli_errno($this->connexio) != 0)
    {
        $res = mysqli_error($this->connexio);
    }
    return $res;
  }
}
?>

