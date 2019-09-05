﻿<?php

/**
 * Class backEndController
 */
class backEndController {

    /**
     * @var string
     */
    private $uploaddir = "/var/www/vhosts/lecalvez.cloud/projetsoc.lecalvez.cloud/projet4/assets/images/chapitre/";

    /**
     * @throws Exception
     */
    public function authentification(){

        if(!empty($_POST['identifiant']) || !empty($_POST['motDePasse'])) {

            $file=file("conf/auth.conf");
            $identifiant=str_replace("\r\n","",$file[6]);
            $motDePasse=$file[8];

            if($_POST['identifiant'] == $identifiant && $_POST['motDePasse'] == $motDePasse) {

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
     * @throws Exception
     */
    public function afficherListeChapitre()
    {
            $chapitreManager = new ChapitreManager();
            $chapitres = $chapitreManager->read(null);

            include 'view/backEnd/administration.php';
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function afficherChapitre($id)
    {
        $chapitreManager = new ChapitreManager();
        $chapitre=$chapitreManager->read((int)$id);

        include 'view/backEnd/lireChapitre.php';
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function afficherModifierChapitre($id)
    {

        $chapitre = new Chapitre();
        $chapitre->setId(htmlspecialchars($id));

        $chapitreManager = new ChapitreManager();
        $chapitre=$chapitreManager->read((int)$id);

        include 'view/backEnd/modifierChapitre.php';
    }

    /**
     *
     */
    public function afficherAjouterChapitre()
    {
            include 'view/backEnd/ajoutChapitre.php';
    }

    /**
     * @throws Exception
     */
    public function afficherListeCommentaires()
    {
       $commentaireManager = new CommentaireManager();
       $commentaires = $commentaireManager->read();

        include 'view/backEnd/gestionCommentaire.php';
    }

    /**
     *
     */
    public function ajouterChapitre()
    {
        $uploadfile = $this->uploadDir() . basename($_FILES['image']['name']);
        if (!file_exists($uploadfile)) {

            $chapitre = new Chapitre();
            $chapitre->setTitre(htmlspecialchars($_POST['titre']));
            $chapitre->setContenu(htmlspecialchars($_POST['contenu']));


            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

            $chapitre->setImage(substr($_FILES['image']['name'],0,-4));

            $chapitreManager = new ChapitreManager();
            $chapitreManager->create($chapitre);
        }

    }

    /**
     * @param $id
     */
    public function modifierChapitre($id)
    {
        $uploadfile = $this->uploadDir() . basename($_FILES['image']['name']);

        if (!file_exists($uploadfile)) {
            $ancienneImage = $_POST['ancienneImage'];
            if(file_exists($ancienneImage)) {
                unlink($ancienneImage);
            }
            $chapitre = new Chapitre();
            $chapitre->setId((int)$id);
            $chapitre->setTitre(htmlspecialchars($_POST['titre']));
            $chapitre->setContenu(htmlspecialchars($_POST['contenu']));

            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

            $chapitre->setImage(substr($_FILES['image']['name'],0,-4));

            $chapitreManager = new ChapitreManager();
            $chapitreManager->update($chapitre);
        }
    }

    /**
     * @param $id
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
        $chapitreManager->delete((int)$id);
        $this->supprimerCommentaire((int)$id,true);
    }

    /**
     * @param $id
     * @param $chapitres
     */
    public function supprimerCommentaire($id, $chapitres)
    {
        $commentaireManager = new CommentaireManager();
        $commentaireManager->delete((int)$id,$chapitres);
    }

    /**
     * @param $id
     */
    public function desactiverSignalement($id)
    {
        $commentaireManager = new CommentaireManager();
        $commentaireManager->update(0,(int)$id);
    }

    /**
     * @param $token
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
     * @return bool
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
     *
     */
    public function deconnexion()
    {
        session_destroy();
    }

}