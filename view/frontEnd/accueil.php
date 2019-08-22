<!-- Debut chapitres -->
    <section id="chapitres">

        <div class="HeaderChapitres">
            <h2>CHAPITRES</h2>
            <div class="RondBleu">
                <i class="fa fa-circle" aria-hidden="true"></i>
            </div>
            <hr/>
            <p>Découvrez mes nouveaux chapitres</p>
        </div>

        <!-- La mise en place de l'album chapitres -->

        <div class="AlbumChapitres">
    <?php
    foreach($chapitres as $chapitre)
    {
            echo '<figure>
                <img src="/assets/images/'.$chapitre->getImage().'.jpg" alt="">
                <figcaption>
                    <p><b><a href="index.php?pages=frontEnd&chapitre='.$chapitre->getId().'">'.$chapitre->getTitre().'
			</a></b></p>
			<p>'.$chapitre->getDateAjout().'</p>
                </figcaption>
            </figure>';
     }
    ?>
        </div>
    </section>