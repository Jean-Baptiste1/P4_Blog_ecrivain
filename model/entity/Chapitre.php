<?php

/**
 * Entity\Chapitre
 */

class Chapitre {

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $nom
     */
    private $titre;
    
    /**
     * @var string $contenu
     */
	private $contenu;
    
    /**
     * @var string $image
     */
    private $image;
    
    /**
     * @var date $dateAjout
     */
	private $dateAjout;
    
    /**
     * @var date $dateModif
     */
	private $dateModif;

    /**
     * @var array $listCommentaire
     */
    private $listCommentaire = array();


    /**
     * @method __construct Initialise les propriétés de la classe Chapitre
     * @param null $id
     * @param string $titre
     * @param string $contenu
     * @param string $image
     * @param date $dateAjout
     * @param date $dateModif
     * @param null $listCommentaire
     */
    public function __construct($id = null, $titre = null,$contenu = null,$image = null,$dateAjout = null,$dateModif =null,$listCommentaire=null)
	{
        $this->id=$id;
	    $this->titre=$titre;
		$this->contenu=$contenu;
        $this->image=$image;
		$this->dateAjout=$dateAjout;
        $this->dateModif=$dateModif;
        $this->listCommentaire=$listCommentaire;
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
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
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
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return date
     */
    public function getDateAjout(): string
    {
       return $this->dateAjout-> format ('d/m/Y H:i:s');
    }

    /**
     * @param date $dateAjout
     */
    public function setDateAjout(DateTime $dateAjout): void
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return array
     */
    public function getListCommentaire(): ? array
    {
        return $this->listCommentaire;
    }

    /**
     * @param object $listCommentaire
     */
    public function setListCommentaire(array $listCommentaire): void
    {
        $this->listCommentaire = $listCommentaire;
    }

}