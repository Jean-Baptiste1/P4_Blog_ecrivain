<?php

/**
 * Class frontEndController
 */
class frontEndController
{
    /**
     * @throws Exception
     */
    public function listChapitres()
        {
            $chapitreManager = new ChapitreManager();
            $chapitres = $chapitreManager->read(null);

            include 'view/frontEnd/accueil.php';
        }

    /**
     * @param $commentaire
     */
    public function activerSignalement($commentaire)
        {
            $commentaireManager = new CommentaireManager();
            $commentaireManager->update(1, $this->securisation($commentaire));
        }

    /**
     * @param $chapitre
     */
    public function ajouterCommentaire($chapitre)
        {
                $commentaire = new Commentaire();
                $commentaire->setPseudo($this->securisation($_POST['pseudo']));
                $commentaire->setContenu($this->securisation($_POST['contenu']));

                $commentaireManager = new CommentaireManager();
                $commentaireManager->create($commentaire, $this->securisation($chapitre));
        }

    /**
     * @param $idChapitre
     * @throws Exception
     */
    public function lireChapitre($idChapitre)
        {
            $chapitreManager = new ChapitreManager();
            $chapitre = $chapitreManager->read($idChapitre);

            include 'view/frontEnd/voirChapitre.php';
        }

    /**
     * @param $donnee
     * @return string
     */
    public function securisation($donnee)
        {
            //Suppression de l'html et du PHP
            $securiser = strip_tags($donnee);

            return $securiser;
        }
}