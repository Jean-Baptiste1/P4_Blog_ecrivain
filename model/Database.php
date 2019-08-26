<?php

class Database
{

    private $server = "mysql:host=localhost;dbname=p4_livre;charset=UTF8";

    private $user = "root";

    private $pass = "";

    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $connection;

    public function openConnection()
    
    {
        try 
        {
            
            $this->connection = new PDO($this->server, $this->user, $this->pass, $this->options);
            
            return $this->connection;
        } 
        catch (PDOException $e) 
        {
            
            echo "Problèmes de connexion : " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->connection = null;
    }

}