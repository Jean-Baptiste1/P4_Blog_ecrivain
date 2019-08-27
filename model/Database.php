<?php

/**
 * Class Database
 */
class Database
{

    /**
     * @var array
     */
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    /**
     * @var
     */
    protected $connection;

    /**
     * @return PDO
     */
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

    /**
     *
     */
    public function closeConnection()
    {
        $this->connection = null;
    }

}