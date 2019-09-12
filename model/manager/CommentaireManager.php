<?php

/**
 * Class CommentaireManager gère les requêtes en base de données
 */
class CommentaireManager
{

    /**
     * CommentaireManager constructor.
     */
    public function __construct()
    {
        $this->connexion = new Database();
    }

    /**
     * @method create Permet de créer un commentaire
     * @param Commentaire $commentaire récupère un objet Commentaire
     * @param int $idChapitre récupère l'id du chapitre du commentaire
     */
    public function create(Commentaire $commentaire, $idChapitre)
    {
        try
        {
        $pdo = $this->connexion->openConnection();

        $pseudo = $commentaire->getPseudo();

        $contenu = $commentaire->getContenu();

        $sql = "INSERT INTO commentaire(pseudo, contenu, dateAjout,signalement,id_chapitre) VALUES (:pseudo,:contenu,NOW(),0,:idChapitre)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
        $stmt->bindParam(':contenu',$contenu,PDO::PARAM_STR);
        $stmt->bindParam(':idChapitre',$idChapitre,PDO::PARAM_INT);
        $stmt->execute();

        } catch (PDOException $e) {

            echo "Problème de connexion: " . $e->getMessage();
        }

        $this->connexion->closeConnection();
    }

    /**
     * @method read Permet de lire tous les commentaires
     * @return array $Commentaires Retourne les informations concernant le chapitre suivant les propriétés de l'objet Commentaire
     */
    public function read()
    {
                try {
                    $pdo = $this->connexion->openConnection();

                    $sql = "SELECT cm.id id, cm.pseudo pseudo, cm.contenu contenu, cm.dateAjout dateAjout, cm.signalement signalement, ch.titre nomChapitre FROM commentaire cm inner join chapitre ch WHERE cm.id_chapitre = ch.id  ORDER BY ch.id ASC";

                    $stmt = $pdo->query($sql);

                    while ($resultats = $stmt->fetch()) {
                        $commentaire = new Commentaire();
                        $commentaire->setId($resultats['id']);
                        $commentaire->setPseudo($resultats['pseudo']);
                        $commentaire->setDateAjout(new DateTime($resultats['dateAjout']));
                        $commentaire->setContenu($resultats['contenu']);
                        $commentaire->setNomChapitre($resultats['nomChapitre']);
                        $commentaire->setSignalement($resultats['signalement']);
                        $commentaires[]=$commentaire;
                    }

                } catch (PDOException $e) {

                    echo "Problème de connexion: " . $e->getMessage();
                }
                if (!empty($commentaires)) {
                    return $commentaires;
                }


        $this->connexion->closeConnection();

    }

    /**
     * @method update permet de mettre à jour un signalement
     * @param int $signalement récupère l'état 0 ou 1 du signalement
     * @param int $idCommentaire récupère l'id du commentaire
     */
    public function update(int $signalement, int $idCommentaire) {

        try
        {
        $pdo = $this->connexion->openConnection();

        $sql = "UPDATE commentaire SET signalement = :signalement WHERE id = :idCommentaire";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':signalement',$signalement,PDO::PARAM_INT);
            $stmt->bindParam(':idCommentaire',$idCommentaire,PDO::PARAM_INT);
            $stmt->execute();

        $this->connexion->closeConnection();

        } catch (PDOException $e) {
            echo "Problème de connexion: " . $e->getMessage();
        }

        $this->connexion->closeConnection();
    }

    /**
     * @method delete permet de supprimer un commentiare
     * @param int $id récupère l'id du commentaire
     * @param bool $chapitres récupère true pour supprimer tous les commentaires d'un chapitre sinon false pour supprimer un seul chapitre
     */
    public function delete($id, $chapitres)
    {
       if ($chapitres){
           try
           {
               $pdo = $this->connexion->openConnection();

               $sql = "DELETE FROM `commentaire` where id_chapitre = :id";

               $stmt = $pdo->prepare($sql);
               $stmt->bindParam(':id',$id,PDO::PARAM_INT);
               $stmt->execute();

           } catch (PDOException $e) {
               echo "Problème de connexion: " . $e->getMessage();
           }

       } else {
           try
           {
               $pdo = $this->connexion->openConnection();

               $sql = "DELETE FROM `commentaire` where id = :id";

               $stmt = $pdo->prepare($sql);
               $stmt->bindParam(':id',$id,PDO::PARAM_INT);
               $stmt->execute();

           } catch (PDOException $e) {
               echo "Problème de connexion: " . $e->getMessage();
           }
       }
       $this->connexion->closeConnection();
    }
}