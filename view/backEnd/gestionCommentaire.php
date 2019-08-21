<div>
    <ul>
        <li>
            liste des commentaires <br>

        </li>
        <li>
            Titre | pseudo | contenu | Date d'ajout
        </li>
        <?php
        foreach($commentaires as $commentaire)
        {
            echo'<li>'.$commentaire->getNomChapitre().' | '.$commentaire->getPseudo().'
			| '.$commentaire->getContenu().' | '.$commentaire->getDateAjout().'
			<a href="index.php?pages=backEnd&page=gestionCommentaires&action=supprimerCommentaire&commentaire='.$commentaire->getId().'">supprimer commentaire</a>
			 | ';
            if ($commentaire->getSignalement()) {
                echo '<a href="index.php?pages=backEnd&page=gestionCommentaires&action=desactiverSignalement&commentaire='.$commentaire->getId().'">supprimer signalement</a></li>';
            }else {

            echo 'aucun signalement';
            }

        }
        ?>
    </ul>
    <a href="index.php?pages=backEnd&page=administration">retour</a>
</div>