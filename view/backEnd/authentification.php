<!-- Envoyer un commentaire -->
<section id="authentification">
    <div id="authentificationConteneur">
        <form id="formulaireAuth" action="index.php?pages=backEnd" method="post">
            <h2>Authentification</h2>
            <input type="text" name="identifiant" placeholder="identifiant"/>
            <input type="text" name="motDePasse" placeholder="motDePasse"/>
            <p><a href="#" class="bouton" onclick="document.getElementById('formulaireAuth').submit();">connexion</a></p>

            <?php
            if (isset($erreur)){
                echo $erreur;
            }

            ?>
        </form>
    </div>
</section>