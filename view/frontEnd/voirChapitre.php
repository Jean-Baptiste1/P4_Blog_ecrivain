    <!-- Chapitre -->
    <section id="chapitre">
        <div id="chapitreConteneur">
            <!-- Les services header -->
            <div class="textSection">
                <h2><?=$chapitre->getTitre()?></h2>
                <i class="fa fa-circle" aria-hidden="true"></i>
                <hr>
                <?=$chapitre->getContenu()?>
                <p><?=$chapitre->getDateAjout()?></p>
            </div>
        </div>
    </section>

    <!-- Les commentaires -->
    <section id="commentaires">
        <div id="commentaireConteneur">
            <!-- Les services header -->
            <div class="textSection">
                <h2>COMMENTAIRES</h2>
                <i class="fa fa-circle" aria-hidden="true"></i>
                <hr>
            </div>
            <?php
            //Affichage des commentaires et des signalements
            if (null!==($chapitre->getListCommentaire())) {
            ?>
            <!-- Commentaires -->
            <?php
            foreach ($chapitre->getListCommentaire() as $commentaire) { ?>
                <div id="bodyChapitre">
                <ul >
                    <li class="devicesDescription">
                        <div class="textCommentaire">
                            <p><?=$commentaire->getPseudo()?></p>
                            <p><h3><?=$commentaire->getContenu()?></h3></p>
                            <p><?=$commentaire->getDateAjout()?></p>

        <?php if ($commentaire->getSignalement()) { ?>
                            <p>Commentaire déjà signalé</p>
        <?php } else
              { ?>
                  <p><a href="index.php?pages=frontEnd&action=activerSignalement&chapitre=<?=$chapitre->getId()?>&commentaire=<?=$commentaire->getId()?>">Signaler</a></p>
        <?php } ?>
                        </div>
                    </li>
                </ul>
            </div>

                  <?php  }  ?>
            <?php   } else {?>
            <div id="bodyChapitre">
                <ul >
                    <li class="devicesDescription">
                        <div class="textCommentaire">
                            aucun commentaire
                        </div>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Envoyer un commentaire -->
    <section id="avis">
        <div id="avisConteneur">
           <form id="formulaire" name="formAvis" action="index.php?pages=frontEnd&chapitre=<?=$chapitre->getId()?>&action=ajouterCommentaire#services" method="post">
                <h2>Votre commentaire</h2>
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <textarea id="commentaire" name="contenu"></textarea>
                <button class="bouton" type="submit">envoyer</button>
            </form>
        </div>
    </section>