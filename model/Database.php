<?php

class Database
{

       private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $connection;

    public function openConnection()
    
    {
        try 
        {
            $config = new Config();
            $this->connection = new PDO($config->getServer(),$config->getUser(),$config->getPass(), $this->options);
            
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