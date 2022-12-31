<?php
//connectem a la nostra base de dades
class DbConnect {
  private $server = 'localhost';
  private $dbname = 'PRA2';
  private $user = 'root';
  private $pass = 'root';

  public function connect() {
    try {
      $conn = new PDO('mysql:host=' .$this->server .';dbname=' . $this->dbname, $this->user, $this->pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (\Exception $e) {
      echo "Database Error: " . $e->getMessage();
    }
  }   
}
?>