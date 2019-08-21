<div>
    <ul>
        <li>
            <a href="index.php?pages=backEnd&page=ajouterChapitre">Créer un chapitre</a>
        </li>
        <li>
            <a href="index.php?pages=backEnd&page=gestionCommentaires">Gestion des commentaires</a>
        </li>
        <li>
            liste des chapitres <br>

        </li>
        <li>
            Titre | Contenu | Image | Date d'ajout | Date de modification
        </li>
        <?php
        foreach($chapitres as $chapitre)
        {
            echo'<li><a href="index.php?pages=backEnd&page=lireChapitre&chapitre='.$chapitre->getId().'">'.$chapitre->getTitre().'
			</a>| '.substr(strip_tags(htmlspecialchars_decode($chapitre->getContenu())), 0, 45).'... | '.$chapitre->getImage().' | '.$chapitre->getDateAjout().'
			<a href="index.php?pages=backEnd&page=modifierChapitre&chapitre='.$chapitre->getId().'">modifier</a>
			 | <a href="index.php?pages=backEnd&page=administration&action=supprimerChapitre&chapitre='.$chapitre->getId().'">supprimer</a></li>';

          }
        ?>
    </ul>
    <a href="index.php">Accueil</a>
</div>