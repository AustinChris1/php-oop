<?php

class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if($conn->connect_error){
            die("<h1>Failure to connect to database</h1>");
        }
        return $this->conn = $conn;
    }
}

?>