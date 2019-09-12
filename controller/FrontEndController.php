<?php

/**
 * Class frontEndController gère la partie FrontEnd
 */
class frontEndController
{
    /**
     * Affiche la liste des chapitres
     */
    public function listChapitres()
        {
            $chapitreManager = new ChapitreManager();
            $chapitres = $chapitreManager->read(null);

            include 'view/frontEnd/accueil.php';
        }

    /**
     * Active un signalement
     * @param int $commentaire retourne l'id du commentaire
     */
    public function activerSignalement($commentaire)
        {
            $commentaireManager = new CommentaireManager();
            $commentaireManager->update(1, $commentaire);
        }

    /**
     * Ajoute un commentaire
     * @param int $chapitre retourne l'id du chapitre
     */
    public function ajouterCommentaire($chapitre)
        {
                $commentaire = new Commentaire();
                $commentaire->setPseudo(filter_input(INPUT_POST,'pseudo',FILTER_SANITIZE_STRING));
                $commentaire->setContenu(filter_input(INPUT_POST,'contenu',FILTER_SANITIZE_STRING));

                $commentaireManager = new CommentaireManager();
                $commentaireManager->create($commentaire, $chapitre);
        }

    /**
     * Affiche un chapitre
     * @param int $idChapitre retourne l'id du chapitre
     */
    public function lireChapitre($idChapitre)
        {
            $chapitreManager = new ChapitreManager();
            $chapitre = $chapitreManager->read($idChapitre);

            include 'view/frontEnd/voirChapitre.php';
        }

}