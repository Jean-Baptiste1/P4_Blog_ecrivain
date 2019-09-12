<?php

/**
 * Entity\Chapitre, objet Chapitre
 */

class Chapitre {

    /**
     * @var int $id id du chapitre
     */
    private $id;

    /**
     * @var string $titre titre du chapitre
     */
    private $titre;
    
    /**
     * @var string $contenu contenu du chapitre
     */
	private $contenu;
    
    /**
     * @var string $image image du chapitre
     */
    private $image;
    
    /**
     * @var date $dateAjout date d'ajout du chapitre
     */
	private $dateAjout;
    
    /**
     * @var array $listCommentaire liste des commentaires du chapitre
     */
    private $listCommentaire = array();


    /**
     * @method __construct Initialise les propriétés de la classe Chapitre
     * @param null $id
     * @param string $titre
     * @param string $contenu
     * @param string $image
     * @param date $dateAjout
     * @param null $listCommentaire
     */
    public function __construct($id = null, $titre = null,$contenu = null,$image = null,$dateAjout = null,$listCommentaire=null)
	{
        $this->id=$id;
	    $this->titre=$titre;
		$this->contenu=$contenu;
        $this->image=$image;
		$this->dateAjout=$dateAjout;
        $this->listCommentaire=$listCommentaire;
	}

    /**
     * Permet de lire l'id du chapitre
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Permet d'enregistrer l'id dans l'objet chapitre
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Permet de lire le titre
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Permet d'enregistrer le titre dans l'objet chapitre
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * Permet de lire le contenu du chapitre
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * Permet d'enregistrer le contenu dans l'objet chapitre
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * Permet de lire l'image du chapitre
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Permet d'enregistrer l'image dans l'objet chapitre
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * Permet de lire la date d'ajout du chapitre
     * @return date
     */
    public function getDateAjout(): string
    {
       return $this->dateAjout-> format ('d/m/Y H:i:s');
    }

    /**
     * Permet d'enregistrer la date d'ajout dans l'objet chapitre
     * @param datetime $dateAjout
     */
    public function setDateAjout(DateTime $dateAjout): void
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * Permet de lire la liste des comentaires
     * @return array
     */
    public function getListCommentaire(): ? array
    {
        return $this->listCommentaire;
    }

    /**
     * Permet d'enregistrer les commentaires dans l'objet chapitre
     * @param array $listCommentaire
     */
    public function setListCommentaire(array $listCommentaire): void
    {
        $this->listCommentaire = $listCommentaire;
    }

}