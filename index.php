<?php

ob_start();

session_start();

//Utlisation d'une fonction anonyme pour l'autoloader permettant de charger les classes

spl_autoload_register(/**
 * @param $class
 */ function ($class)
{
    if (file_exists($file = 'controller/' . $class . '.php')) {
        include $file;
    }elseif (file_exists($file = 'model/' . $class . '.php')) {
        include $file;
    }elseif (file_exists($file = 'model/entity/' . $class . '.php')) {
        include $file;
    } elseif (file_exists($file = 'model/manager/' . $class . '.php')) {
        include $file;
    } elseif (file_exists($file = 'conf/' . $class . '.php')) {
        include $file;
    }
});

/* Activer les erreurs php */
ini_set('display_errors', 1);
error_reporting(E_ALL);

$frontEndController = new FrontEndController();
$backEndController = new BackEndController();

if (isset($_GET['pages'])) {

    //Affiche le FrontEnd
    if ($_GET['pages']=='frontEnd') {

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case "activerSignalement":
                    $frontEndController->activerSignalement($_GET['commentaire']);
                    break;
                case "ajouterCommentaire":
                    $frontEndController->ajouterCommentaire($_GET['chapitre']);
                    break;
            }
        }
        FrontEndcontroller::lireChapitre($_GET['chapitre']);

    //Affiche le Backend
    } elseif ($_GET['pages'] == 'backEnd') {

        if (isset($_GET['page']) && $backEndController->verificationToken()) {
            switch ($_GET['page']) {
                case "administration":

                        if (isset($_GET['action'])) {
                            switch ($_GET['action']) {
                                case "supprimerChapitre":
                                    $backEndController->supprimerChapitre($_GET['chapitre']);
                                    break;
                                case "ajouterChapitre":
                                    $backEndController->ajouterChapitre();
                                    break;
                                case "modifierChapitre":
                                    $backEndController->modifierChapitre($_GET['chapitre']);
                                    break;
                            }
                        }

                        $backEndController->afficherListeChapitre();
                    break;
                case "lireChapitre":
                    $backEndController->afficherChapitre($_GET['chapitre']);
                    break;
                case "ajouterChapitre" :
                    $backEndController->afficherAjouterChapitre();
                    break;
                case "modifierChapitre":
                    $backEndController->afficherModifierChapitre($_GET['chapitre']);
                    break;
                case "gestionCommentaires" :
                    if(isset($_GET['action'])){
                        switch($_GET['action']) {
                            case "supprimerCommentaire":
                                $backEndController->supprimerCommentaire($_GET['commentaire'],false);
                                break;
                            case "desactiverSignalement":
                                $backEndController->desactiverSignalement($_GET['commentaire']);
                                break;
                        }
                    }

                    $backEndController->afficherListeCommentaires();
                    break;
                case "deconnexion" :

                    $backEndController->deconnexion();
                    header('Location: index.php');
                    break;
            }
        } else {
            //Affiche la page d'administration du backEnd, si il est déjà connécté
            if($backEndController->verificationToken()) {
                $backEndController->afficherListeChapitre();
            }else{
                //Affiche par défaut la page d'authentification quand l'utilisateur n'est pas connécté
                $backEndController->authentification();
            }
        }
    }
}else{
  //Affiche par défaut la liste des chapitres pour la page d'accueil dans le FrontEnd
  $frontEndController->listChapitres();
}

$content = ob_get_clean();

require('view/template/template.php');