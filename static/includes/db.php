<?php
//object oriented php connection
//using mysql
/*
class db{
     
    private $dbServerName;
    private $dbUserName;
    private $dbPassword;
    private $dbName;

    protected function connect(){
        $this->dbServerName = "localhost";
        $this->dbUserName = "root";
        $this->dbPassword = "";
        $this->dbName = "btq";

        $conn = mysqli($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);
        
        return $conn;
    }

}
*/

//using PDO

class Db{

    private $dbServerName;
    private $dbUserName;
    private $dbPassword;
    private $dbName;
    private $charset;

    protected function connect(){

        $this->dbServerName = "localhost";
        $this->dbUserName = "root";
        $this->dbPassword = "";
        $this->dbName = "btq1";
        $this->charset = "utf8mb4";

        try {
             $dsn = "mysql:host=".$this->dbServerName.";dbName=".$this->dbName.";charset=".$this->charset.";";
        $pdo = new PDO($dsn, $this->dbUserName, $this->dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
        
        } catch (PDOExeption $e) {
            echo "connection failed: ".$e->getMessage();

        }

    }

}






// procedural php connection
/* 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "btq";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
*/


