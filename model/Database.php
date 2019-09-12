<?php

/**
 * Class Database gère la connection à la base de données
 */
class Database
{

    /**
     * @var array $opions options PDO
     */
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    /**
     * @var $connection
     */
    protected $connection;

    /**
     * @method openConnection permet d'ouvrir une connexion à la base de données
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
     * @method closeConnection permet de fermer la connection à la base de données
     */
    public function closeConnection()
    {
        $this->connection = null;
    }

}