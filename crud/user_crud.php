<?php

class UserCrud
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

    public function createRow($sql)
    {
        if ($this->conn->query($sql) !== TRUE) {

            echo "Sorry, something wen't wrong. Please try again later.";
        }
    }

    public function createUser($name, $email, $password)
    {
        $sql = "INSERT into users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $this->createRow($sql);
    }

    public function findUser($email)
    {
        $sql = "SELECT id, name, email, password FROM users WHERE email= '$email'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
