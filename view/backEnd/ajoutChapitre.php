<section id="modifierChapitre" xmlns="http://www.w3.org/1999/html">
      <div id="avisConteneur">
          <form id="formulaireChapitre" action="index.php?pages=backEnd&page=administration&action=ajouterChapitre" method="post" enctype="multipart/form-data">
              <h2>Création d'un chapitre</h2>
              <p>Titre :</p>
              <input type="text" name="titre" value="" required>
              <p>Image (*.jpg) : </p>
              <input type="file" name="image" value="" accept="image/jpeg" required>
              <p>Contenu :</p>
              <textarea id="backEnd" name="contenu"></textarea>
              <button class="bouton">Envoyer</button>
          </form>
      </div>
      <div id="retour"><a href="index.php?pages=backEnd&page=administration">retour</a></div>
  </section>