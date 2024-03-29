﻿<!-- Debut chapitres -->
    <section id="chapitres">

        <div class="headerChapitres">
            <h2>CHAPITRES</h2>
            <div>
                <i class="fa fa-circle" aria-hidden="true"></i>
            </div>
            <hr/>
            <p>Découvrez mes nouveaux chapitres et suivez mes aventures</p>
        </div>

        <!-- La mise en place de l'album chapitres -->
        <div class="albumChapitres">
    <?php
    if (isset($chapitres)){
    foreach($chapitres as $chapitre)
    { ?>
            <figure>
                <a href="index.php?pages=frontEnd&chapitre=<?=$chapitre->getId()?>"><img src="assets/images/chapitre/<?=$chapitre->getImage()?>.jpg" alt=""></a>
                <figcaption>
                    <p><b><a href="index.php?pages=frontEnd&chapitre=<?=$chapitre->getId()?>"><?=$chapitre->getTitre()?>
			</a></b></p>
			<p><?=$chapitre->getDateAjout()?></p>
                </figcaption>
            </figure>
     <?php
    }
    }else{ ?>
        <figure>
            <figcaption>
                    <p>aucun chapitre</p>
            </figcaption>
        </figure>
    <?php }
    ?>
        </div>
    </section>