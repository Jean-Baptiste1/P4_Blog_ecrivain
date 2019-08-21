    <div>
        <ul>
            <li>
                <a href="index.php?pages=backEnd">Accès Administration</a>
            </li>
            <li>
                Titre | Contenu | Image | Date d'ajout | Date de modification
            </li>
            <?php
            foreach($chapitres as $chapitre)
            {
                echo'<li><a href="index.php?pages=frontEnd&chapitre='.$chapitre->getId().'">'.$chapitre->getTitre().'
			</a>| '.$chapitre->getImage().' | '.$chapitre->getDateAjout().'</li>';
            }
            ?>
        </ul>
    </div>