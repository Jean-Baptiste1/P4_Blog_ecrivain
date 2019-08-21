<div>
    <!-- Affiche un chapitre -->
    <?php
    echo '<br>titre :  '.$chapitre->getTitre().'<br>';
    echo 'Description :  '.$chapitre->getContenu().'<br>';
    echo 'Image :  '.$chapitre->getImage().'<br>';
    echo 'Date de création :  '.$chapitre->getDateAjout().'<br>';
    ?>
</div>
<?php

    
    echo '<a href="index.php?pages=backEnd&page=administration">retour</a> | <a href="index.php?pages=backEnd&page=modifierChapitre&chapitre='.$chapitre->getId().'">modifier</a> | 
            <a href="index.php?pages=backEnd&page=administration&action=supprimerChapitre&chapitre='.$chapitre->getId().'">supprimer</a></div>';
   ?>
<div>