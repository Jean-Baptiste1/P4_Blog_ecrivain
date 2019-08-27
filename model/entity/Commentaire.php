<?php

/**
 * Entity\Commentaire
 */

class Commentaire {

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $pseudo
     */
    private $pseudo;
    
    /**
     * @var string $dateAjout
     */
	private $dateAjout;
    
    /**
     * @var string $contenu
     */
    private $contenu;

    /**
     * @var string $nomChapitre
     */
    private $nomChapitre;

    /**
     * @var bool $signalement
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDateAjout(): string
    {
        return $this->dateAjout-> format ('d/m/Y H:i:s');
    }

    /**
     * @param DateTime $dateAjout
     */
    public function setDateAjout(DateTime $dateAjout): void
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * @return null
     */
    public function getNomChapitre()
    {
        return $this->nomChapitre;
    }

    /**
     * @param null $nomChapitre
     */
    public function setNomChapitre($nomChapitre): void
    {
        $this->nomChapitre = $nomChapitre;
    }

    /**
     * @return bool
     */
    public function getSignalement(): bool
    {
        return $this->signalement;
    }

    /**
     * @param $signalement
     */
    public function setSignalement($signalement): void
    {
        $this->signalement = $signalement;
    }

}