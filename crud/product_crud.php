<?php

class ProductCrud
{
    private $servername = "localhost";
    private $username = "msleeuwenhoek";
    private $password = "(098password";
    private $dbname = "merels_webshop";
    protected $conn;


    // Create connection
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Sorry, something wen't wrong.");
        }
    }


    public function retrieveProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result;
    }
}
