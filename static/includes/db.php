<?php
class db{
    private $servername;
    private $serverusername;
    private $serverpassword;
    private $dbname;
    private $conn;

    protected function connect(){

        $this->servername = "localhost";
        $this->serverusername = "root";
        $this->serverpassword = "";
        $this->dbname = "btq";

        $conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, $this->dbname);
        return $conn;
    }
}