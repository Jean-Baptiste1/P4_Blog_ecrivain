    <div>
        <!-- Affiche chapitre -->
	<?php
    echo '<br>titre :  '.$chapitre->getTitre().'<br>';
	echo 'Description :  '.$chapitre->getContenu().'<br>';
    echo 'Image :  '.$chapitre->getImage().'<br>';
	echo 'Date de création :  '.$chapitre->getDateAjout().'<br>';
	?>
    </div>
<?php
    //Affichage des commentaires et des signalements
    if (null!==($chapitre->getListCommentaire())) {
    ?>
    <div>
        <ul>
            <li>
                Pseudo | Date | Commentaire
            </li>
            <?php

                foreach ($chapitre->getListCommentaire() as $commentaire) {
                    echo '<li>' . $commentaire->getPseudo() . '
			            | ' . $commentaire->getContenu() . ' | ' . $commentaire->getDateAjout() . '</li>';

                    if ($commentaire->getSignalement()) {
                        echo 'déjà signalé';
                    } else
                    {
                      echo '<div><a href="index.php?pages=frontEnd&action=activerSignalement&chapitre='.$chapitre->getId().'&commentaire='.$commentaire->getId().'">Signaler</a></div>';
                    };
                }
            ?>
        </ul>
    </div>
    <?php   } ?>
    <div> <!-- Ajouter un commentaire -->
        <?php echo'<form action="index.php?pages=frontEnd&chapitre='.$chapitre->getId().'&action=ajouterCommentaire" method="post">'; ?>
            pseudo:<br>
            <input type="text" name="pseudo" value=""><br>
            Commentaire:<br>
            <input type="text" name="contenu" value=""><br>
            <input type="submit" value="Ajouter">
        </form><a href="index.php">retour</a></div>