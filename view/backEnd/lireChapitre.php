     <!-- Chapitre -->
     <section id="chapitre">

             <div class="textSection">
                 <h2><?=$chapitre->getTitre()?></h2>
                 <i class="fa fa-circle" aria-hidden="true"></i>
                 <hr>
             </div>
             <div class="albumChapitres">

                             <figure>
                                 <img src="/assets/images/<?=$chapitre->getImage()?>.jpg"/>
                                 <figcaption>
                                     <p><a href="index.php?pages=backEnd&page=modifierChapitre&chapitre=<?=$chapitre->getId()?>">modifier</a>
                                         |
                                         <a href="index.php?pages=backEnd&page=administration&action=supprimerChapitre&chapitre=<?=$chapitre->getId()?>">supprimer</a></p>
                                 </figcaption>
                             </figure>



                 <p><?=strip_tags(htmlspecialchars_decode($chapitre->getContenu()))?></p>
                 <p><?=$chapitre->getDateAjout()?></p>


             </div>
         <div id="retour"><a href="index.php?pages=backEnd&page=administration">retour</a></div>
    </section>
