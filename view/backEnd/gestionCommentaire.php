        <!-- Les commentaires -->
        <section id="commentaires">
            <div id="commentaireConteneur">
                <!-- Les services header -->
                <div class="textSection">
                    <h2>Gestion des commentaires</h2>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <hr>
                </div>
                <?php
                if (isset($commentaires)) {
                    foreach ($commentaires as $commentaire) {
                        ?>
                        <div id="bodyChapitre">
                            <ul >
                                <li class="devicesDescription">
                                    <div class="textCommentaire">
                                        <p><?=$commentaire->getPseudo()?></p>
                                        <p><h3><?=$commentaire->getContenu()?></h3></p>
                                        <p><?=$commentaire->getNomChapitre()?></p>
                                        <p><?=$commentaire->getDateAjout()?></p>
                                        <p><a href="index.php?pages=backEnd&page=gestionCommentaires&action=supprimerCommentaire&commentaire=<?=$commentaire->getId()?>" onclick="Supprimer();">supprimer commentaire</a></p>
                                       <?php if ($commentaire->getSignalement()) { ?>
                                        <p><a href="index.php?pages=backEnd&page=gestionCommentaires&action=desactiverSignalement&commentaire=<?=$commentaire->getId()?>" onclick="Supprimer();">supprimer signalement</a></p>
                                <?php } else { ?>

                                           <p>aucun signalement</p>
                                <?php } ?>
                                    </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                }else{
                    ?>

                    <div id="bodyChapitre">
                        <ul >
                            <li class="devicesDescription">
                                <div class="textCommentaire">
                                    aucun commentaire
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div id="retour"><a href="index.php?pages=backEnd&page=administration">retour</a></div>
        </section>