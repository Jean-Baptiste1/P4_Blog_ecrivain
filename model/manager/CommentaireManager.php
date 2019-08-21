<?php

class CommentaireManager
{

    public function __construct()
    {
        $this->connexion = new Database();
    }

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
     * @method getChapitre Affiche un Commentaire
     * @return array $Commentaires Retourne les informations concernant le chapitre suivant les propriétés de l'objet Commentaire
     * @throws Exception
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

    public function update(int $signalement,int $idCommentaire) {

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

    public function delete($id)
    {
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

        $this->connexion->closeConnection();
    }
}