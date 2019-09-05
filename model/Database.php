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

            if (getenv('HTTP_HOST') == $config->getReferer()) {
                $this->connection = new PDO($config->getServerLinux(),$config->getUserLinux(),$config->getPassLinux(), $this->options);
            } else {
                $this->connection = new PDO($config->getServerWindows(),$config->getUserWindows());
            }

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