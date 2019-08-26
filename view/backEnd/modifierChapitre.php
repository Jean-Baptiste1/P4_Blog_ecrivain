    <section id="modifierChapitre">
        <div id="avisConteneur">
            <form id="formulaireChapitre" action="index.php?pages=backEnd&page=administration&action=modifierChapitre&chapitre=<?=$chapitre->getId()?>" method="post"  enctype="multipart/form-data">
                <h2>Modifier un chapitre</h2>
                <p>Titre :</p>
                <input type="text" name="titre" value="<?=$chapitre->getTitre()?>" required>
                <p>Image (*.jpg) : </p>
                <p><img src="/assets/images/<?=$chapitre->getImage()?>.jpg" alt=""></p>
                <input type="file" name="image" accept="image/jpeg">
                <p>Contenu :</p>
                <textarea id="backEnd" name="contenu" required><?=$chapitre->getContenu()?></textarea>
                <button class="bouton">envoyer</button>
            </form>
        </div>
        <div id="retour"><a href="index.php?pages=backEnd&page=administration">retour</a></div>
    </section>