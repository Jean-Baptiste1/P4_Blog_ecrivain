    <!-- Les commentaires -->
    <section id="chapitre">

            <!-- Les services header -->
            <div class="textSection">
                <h2>Gestion des chapitres</h2>
                <div><i class="fa fa-circle" aria-hidden="true"></i></div>
                <hr>
                <p><a href="index.php?pages=backEnd&page=ajouterChapitre">Créer un chapitre</a></p>
                <p><a href="index.php?pages=backEnd&page=gestionCommentaires">Gestion des commentaires</a></p>
            </div>
        <div class="albumChapitres">
            <?php
            if (isset($chapitres)) {
                foreach ($chapitres as $chapitre) {
                    ?>
                            <figure>
                                <img src="assets/images/chapitre/<?=$chapitre->getImage()?>.jpg"/>
                                <figcaption>
                                    <p><h3><a href="index.php?pages=backEnd&page=lireChapitre&chapitre=<?=$chapitre->getId()?>"><?=$chapitre->getTitre()?></a></h3></p>
                                    <p><a href="index.php?pages=backEnd&page=modifierChapitre&chapitre=<?=$chapitre->getId()?>">modifier</a>
                                    | <a href="index.php?pages=backEnd&page=administration&action=supprimerChapitre&chapitre=<?=$chapitre->getId()?>&image=<?=$chapitre->getImage()?>" onclick="Supprimer();">supprimer</a></p>
                            </figcaption>
                                </figure>
             <?php
                }
            }else{
                ?>

                <div id="bodyChapitre">
                    <ul >
                        <li class="devicesDescription">
                            <div class="textCommentaire">
                                aucun chapitre
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </section>