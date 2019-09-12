<?php

/**
 * Entity\Commentaire, objet Commentaire
 */

class Commentaire {

    /**
     * @var int $id id du commentaire
     */
    private $id;

    /**
     * @var string $pseudo pseudo du commentaire
     */
    private $pseudo;
    
    /**
     * @var string $dateAjout date d'ajout du commentaire
     */
	private $dateAjout;
    
    /**
     * @var string $contenu contenu du commentaire
     */
    private $contenu;

    /**
     * @var string $nomChapitre nom du chapitre du commentaire
     */
    private $nomChapitre;

    /**
     * @var bool $signalement signalement du commentaire
     */
    private $signalement;


    /**
     * @method __construct Initialise les propriétés de la classe Commentaire
     * @param int $id
     * @param string $pseudo
     * @param string $dateAjout
     * @param string $contenu
     * @param Signalement $signalement
     * @param null $nomChapitre
     */
    public function __construct($id=null,$pseudo=null,$dateAjout=null,$contenu=null,$nomChapitre=null,$signalement=null)
	{
	    $this->id=$id;
		$this->pseudo=$pseudo;
		$this->dateAjout=$dateAjout;
        $this->contenu=$contenu;
        $this->nomChapitre=$nomChapitre;
        $this->signalement=$signalement;
	}

    /**
     * Permet de lire l'id du commentaire
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Permet d'enregistrer l'id du commentaire
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Permet de lire la date d'ajout d'un commentaire
     * @return string
     */
    public function getDateAjout(): string
    {
        return $this->dateAjout-> format ('d/m/Y H:i:s');
    }

    /**
     * Permet d'enregistrer la date d'ajout du commentaire
     * @param DateTime $dateAjout
     */
    public function setDateAjout(DateTime $dateAjout): void
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * Permet de lire le pseudo d'un commentaire
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Permet d'enregistrer le pseudo d'un commentaire
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Permet de lire le contenu d'un commentaire
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * Permet d'enregistre le contenu d'un commentaire
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * Permet de lire le nom du chapitre du commentaire
     * @return null
     */
    public function getNomChapitre()
    {
        return $this->nomChapitre;
    }

    /**
     * Permet d'enregistrer le nom du chapitre du commentaire
     * @param null $nomChapitre
     */
    public function setNomChapitre($nomChapitre): void
    {
        $this->nomChapitre = $nomChapitre;
    }

    /**
     * Permet de lire le signalement d'un commentaire
     * @return bool
     */
    public function getSignalement(): bool
    {
        return $this->signalement;
    }

    /**
     * Permet d'enregistrer le signalement d'un commentaire
     * @param $signalement
     */
    public function setSignalement($signalement): void
    {
        $this->signalement = $signalement;
    }

}