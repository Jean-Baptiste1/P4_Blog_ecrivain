<?php
include 'conf/auth.php';

/**
 * Class backEndController gère le BackEnd
 */
class backEndController {

    /**
     * @var string $uploadir chemin d'accès aux images des chapitres
     */
    private $uploaddir = "/var/www/vhosts/lecalvez.cloud/projetsoc.lecalvez.cloud/projet4/assets/images/chapitre/";

    /**
     * Authentifie l'utilisateur en utilisant les constantes du fichier auth.php
     */
    public function authentification(){

        if(!empty($_POST['identifiant']) || !empty($_POST['motDePasse'])) {



            if(filter_input(INPUT_POST,'identifiant',FILTER_SANITIZE_STRING) == IDENTIFIANT && filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_STRING) == MOTDEPASSE) {

                //On enregistre notre token
                $token = bin2hex(random_bytes (64));

                $_SESSION['token'] = $token;

                $this->genererHash($token);

                header('Location: index.php?pages=backEnd&page=administration');

            }else{
                $erreur="problème de connexion";
            }
        }

        include 'view/backEnd/authentification.php';

    }

    /**
     * Affiche la liste des chapitres
     */
    public function afficherListeChapitre()
    {
            $chapitreManager = new ChapitreManager();
            $chapitres = $chapitreManager->read(null);

            include 'view/backEnd/administration.php';
    }

    /**
     * Affiche un chapitre
     * @param int $id récupère l'id du chapitre
     */
    public function afficherChapitre($id)
    {
        $chapitreManager = new ChapitreManager();
        $chapitre=$chapitreManager->read($id);

        include 'view/backEnd/lireChapitre.php';
    }

    /**
     * Affiche le chapitre à modifier
     * @param int $id récupère l'id du chapitre
     */
    public function afficherModifierChapitre($id)
    {

        $chapitre = new Chapitre();
        $chapitre->setId($id);

        $chapitreManager = new ChapitreManager();
        $chapitre=$chapitreManager->read($id);

        include 'view/backEnd/modifierChapitre.php';
    }

    /**
     * Permet d'afficher la page ajouter chapitre
     */
    public function afficherAjouterChapitre()
    {
            include 'view/backEnd/ajoutChapitre.php';
    }

    /**
     * Affiche la liste des commentaires
     */
    public function afficherListeCommentaires()
    {
       $commentaireManager = new CommentaireManager();
       $commentaires = $commentaireManager->read();

        include 'view/backEnd/gestionCommentaire.php';
    }

    /**
     * Ajoute un chapitre
     */
    public function ajouterChapitre()
    {
        $uploadfile = $this->uploadDir() . basename($_FILES['image']['name']);
        if (!file_exists($uploadfile)) {

            $chapitre = new Chapitre();
            $chapitre->setTitre(filter_input(INPUT_POST,'titre',FILTER_SANITIZE_STRING));
            $chapitre->setContenu(filter_input(INPUT_POST,'contenu',FILTER_SANITIZE_SPECIAL_CHARS));

            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

            $chapitre->setImage(substr($_FILES['image']['name'],0,-4));

            $chapitreManager = new ChapitreManager();
            $chapitreManager->create($chapitre);
        }

    }

    /**
     * Modifie un chapitre
     * @param int $id récupèrer l'id du chapitre
     */
    public function modifierChapitre($id)
    {
        $uploadfile = $this->uploadDir() . basename($_FILES['image']['name']);
        $ancienneImage = $_POST['ancienneImage'];

            $chapitre = new Chapitre();
            $chapitre->setId($id);
            $chapitre->setTitre(filter_input(INPUT_POST,'titre',FILTER_SANITIZE_STRING));
            $chapitre->setContenu(filter_input(INPUT_POST,'contenu',FILTER_SANITIZE_SPECIAL_CHARS));


        if (!file_exists($uploadfile)) {

            //Suppression de l'ancienne image
            if (file_exists($ancienneImage)) {
                unlink($ancienneImage);
            }

            //Enregistre l'image en la renomant avec le nom d'origine
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

            //On enlève l'extension de l'image .jpg pour garder uniquement le nom de l'image
            $chapitre->setImage(substr($_FILES['image']['name'],0,-4));
        } else {
            $image = explode("/",$ancienneImage);
            $chapitre->setImage(substr($image[3],0,-4));

        }

            $chapitreManager = new ChapitreManager();
            $chapitreManager->update($chapitre);

    }

    /**
     * Supprime un chapitre
     * @param int $id récupère l'id du chapitre
     */
    public function supprimerChapitre($id)
    {
        $chapitreManager = new ChapitreManager();
        $image = $_GET['image'];
        $myFile = $this->uploadDir() . $image.'.jpg';
        if (file_exists($myFile)) {
            unlink($myFile);
        }
        $chapitreManager = new ChapitreManager();
        $chapitreManager->delete($id);
        $this->supprimerCommentaire($id,true);
    }

    /**
     * Supprime un commentaire
     * @param int $id récupère l'id du commentaire
     * @param boolean $chapitres à False permet de supprimer unique un commentaire
     */
    public function supprimerCommentaire($id, $chapitres)
    {
        $commentaireManager = new CommentaireManager();
        $commentaireManager->delete($id,$chapitres);
    }

    /**
     * Désactive le signalement d'un commentaire
     * @param int $id recupère l'id du commentaire
     */
    public function desactiverSignalement($id)
    {
        $commentaireManager = new CommentaireManager();
        $commentaireManager->update(0,$id);
    }

    /**
     * Génère le hashage de la clef du token pour la crypter et la stock dans le fichier token.conf
     * @param string $token récupère la clef
     */
    public function genererHash($token)
    {
        $pw=password_hash($token,PASSWORD_BCRYPT);
        $hash=$pw;

       $fp=fopen("conf/token.conf", "w");
        fputs($fp,$hash);
        fclose($fp);
    }

    /**
     * Vérification de la validité de la session en comparant le token en session et la clef de hashage stockée dans le fichier
     * @return bool renvoie true si le token correspond à la clef de hashage
     */
    public function verificationToken()
    {
        if(isset($_SESSION['token'])){
            $fp=fopen("conf/token.conf", "r");
            $hash=fgets($fp);
            fclose($fp);

        if(password_verify($_SESSION['token'],$hash)){
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * Retourne le bon chemin soit sous Windows ou Linux
     * @return string $uploadDir retourne le chemin
     */
    public function uploadDir() {

        $config = new Config();

        if (getenv('HTTP_HOST') == $config->getReferer()) {
            $uploadDir = $config->getUploaddirLinux();
        }else{
            $uploadDir= $config->getUploaddirWindows();
        }

        return $uploadDir;
    }
    /**
     * Met fin à la session
     */
    public function deconnexion()
    {
        session_destroy();
    }

}