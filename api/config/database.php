<?php
class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "sia-pos";
    private $conn;
    function connect() {
      try{
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        $this->conn->set_charset('utf8');
      }
      catch (mysqli_sql_exception $e){
        throw $e;
      }
      return $this->conn;
    }
  }
 ?>
