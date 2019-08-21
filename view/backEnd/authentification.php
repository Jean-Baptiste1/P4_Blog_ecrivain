<div>
    <ul>
        <li>
            Authentification
        </li>
        <li>
            <form action="index.php?pages=backEnd" method="post">
                identifiant :<br>
                <input type="text" name="identifiant" value=""><br>
                mot de passe :<br>
                <input type="text" name="motDePasse" value=""><br><br>
                <input type="submit" value="Connexion">
                <?php
                if (isset($erreur)){
                    echo $erreur;
                }

                ?>
            </form>
        </li>
    </ul>
</div>