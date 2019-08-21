<div>

    <ul>
        <li>
            Modifier d'un chapitre
        </li>
        <li>
            <?php
            echo ' <form action="index.php?pages=backEnd&page=administration&action=modifierChapitre&chapitre='.$chapitre->getId().'" method="post">
                titre:<br>
               
                <input type="text" name="titre" value="'.$chapitre->getTitre().'"><br>
                Image:<br>
                <input type="text" name="image" value="'.$chapitre->getImage().'"><br>
                Contenu:<br>
                <textarea name="contenu" rows="10" cols="133">'.$chapitre->getContenu().'</textarea><br><br>';
                ?>
                <input type="submit" value="Modifier">
            </form>
            <a href="index.php?pages=backEnd&page=administration">retour</a>
        </li>
    </ul>
</div>