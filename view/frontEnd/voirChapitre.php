    <!-- Chapitre -->
    <section id="services">
        <div id="ServicesConteneur">
            <!-- Les services header -->
            <div class="HeaderSection">
                <h2><?=$chapitre->getTitre()?></h2>
                <i class="fa fa-circle" aria-hidden="true"></i>
                <hr>
                <p><?=$chapitre->getContenu()?></p>
                <p><?=$chapitre->getDateAjout()?></p>
            </div>
        </div>
    </section>

    <!-- Les commentaires -->
    <section id="services">
        <div id="ServicesConteneur">
            <!-- Les services header -->
            <div class="HeaderSection">
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
                <div id="BodyServices">
                <ul >
                    <li class="DervicesDescription">
                        <div class="TextServices">
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
            <div id="BodyServices">
                <ul >
                    <li class="DervicesDescription">
                        <div class="TextServices">
                            aucun commentaire
                        </div>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </section>


    <!-- Envoyer un commentaire -->
    <section id="contact">
        <div id="ContactConteneur">
           <form id="formulaire" action="index.php?pages=frontEnd&chapitre=<?=$chapitre->getId()?>&action=ajouterCommentaire#services" method="post">
            <h2>Votre commentaire</h2>
                <input type="text" name="pseudo" placeholder="Pseudo"/>
                <textarea id="commentaire" name="contenu" placeholder="Message"></textarea>
               <p><a href="#" class="bouton" onclick="document.getElementById('formulaire').submit();">envoyer</a></p>
            </form>
        </div>
    </section>