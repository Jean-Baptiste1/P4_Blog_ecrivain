<?php

ob_start();

session_start();

//Utlisation d'une fonction anonyme pour l'autoloader permettant de charger les classes automatiquement lors d'un New sur un objet
spl_autoload_register(

    function ($class)
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

$frontEndController = new FrontEndController();
$backEndController = new BackEndController();

//Sécurisation des GET
$pages = filter_input(INPUT_GET,'pages',FILTER_SANITIZE_STRING);
$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING);
$chapitre = filter_input(INPUT_GET,'chapitre',FILTER_SANITIZE_NUMBER_INT);
$commentaire = filter_input(INPUT_GET,'commentaire',FILTER_SANITIZE_NUMBER_INT);


if (isset($pages)) {

    //Partie FrontEnd
    if ($pages=='frontEnd') {

        if (isset($action)) {
            switch ($action) {
                case "activerSignalement":
                    $frontEndController->activerSignalement($commentaire);
                    break;
                case "ajouterCommentaire":
                    $frontEndController->ajouterCommentaire($chapitre);
                    break;
            }
        }
        $frontEndController->lireChapitre($chapitre);

    //Partie Backend
    } elseif ($pages == 'backEnd') {

        if (isset($page) && $backEndController->verificationToken()) {
            switch ($page) {
                case "administration":

                        if (isset($action)) {
                            switch ($action) {
                                case "supprimerChapitre":
                                    $backEndController->supprimerChapitre($chapitre);
                                    break;
                                case "ajouterChapitre":
                                    $backEndController->ajouterChapitre();
                                    break;
                                case "modifierChapitre":
                                    $backEndController->modifierChapitre($chapitre);
                                    break;
                            }
                        }

                        $backEndController->afficherListeChapitre();
                    break;
                case "lireChapitre":
                    $backEndController->afficherChapitre($chapitre);
                    break;
                case "ajouterChapitre" :
                    $backEndController->afficherAjouterChapitre();
                    break;
                case "modifierChapitre":
                    $backEndController->afficherModifierChapitre($chapitre);
                    break;
                case "gestionCommentaires" :
                    if(isset($action)){
                        switch($action) {
                            case "supprimerCommentaire":
                                $backEndController->supprimerCommentaire($commentaire,false);
                                break;
                            case "desactiverSignalement":
                                $backEndController->desactiverSignalement($commentaire);
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