<?php

class ChapitreManager
{

    public function __construct()
    {
        $this->connexion = new Database();
    }

    public function create(Chapitre $chapitre)
    {

        try {
            $pdo = $this->connexion->openConnection();

            $titre = $chapitre->getTitre();
            $contenu = $chapitre->getContenu();
            $image = $chapitre->getImage();

            $sql = "INSERT INTO `chapitre`(`titre`, `contenu`, `image`, `dateAjout`) VALUES (:titre,:contenu,:image,NOW())";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titre',$titre,PDO::PARAM_STR);
            $stmt->bindParam(':contenu',$contenu,PDO::PARAM_STR);
            $stmt->bindParam(':image',$image,PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Problème de connexion: " . $e->getMessage();
        }

        $this->connexion->closeConnection();
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function read($id)
    {
        if (is_null($id)) {

            try {

                $pdo = $this->connexion->openConnection();

                $sql = "SELECT id, titre, contenu, image, dateAjout FROM `chapitre` ORDER BY id DESC";

                $stmt = $pdo->query($sql);

                while ($resultats = $stmt->fetch()) {
                        $chapitre = new Chapitre();
                        $chapitre->setId($resultats['id']);
                        $chapitre->setTitre($resultats['titre']);
                        $chapitre->setContenu($resultats['contenu']);
                        $chapitre->setImage($resultats['image']);
                        $chapitre->setDateAjout(new DateTime($resultats['dateAjout']));
                        $chapitres[]=$chapitre;
                }

            } catch (PDOException $e) {

                echo "Problème de connexion: " . $e->getMessage();
            }
            if (! empty($chapitres)) {
                return $chapitres;
            }

        } else {

            try {

                $pdo = $this->connexion->openConnection();

                $sql = "SELECT id, titre, contenu, image, dateAjout, dateModif FROM `chapitre` WHERE id = :id ORDER BY id ASC";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $stmt->execute();

                $result=$stmt->fetch(PDO::FETCH_ASSOC);

                //Ajoute les données pour les commentaires et le signalement
                $sqlC = "SELECT id, pseudo,contenu,dateAjout,signalement FROM commentaire where id_chapitre = :id ORDER BY id ASC";

                $stmtC = $pdo->prepare($sqlC);
                $stmtC->bindParam(':id',$id,PDO::PARAM_INT);
                $stmtC->execute();

                while ($commentaires = $stmtC->fetch()) {
                    if (isset($commentaires['id'])) {
                        $comment= new Commentaire();
                        $comment->setId($commentaires['id']);
                        $comment->setPseudo($commentaires['pseudo']);
                        $comment->setDateAjout(new DateTime($commentaires['dateAjout']));
                        $comment->setContenu($commentaires['contenu']);
                        $comment->setSignalement($commentaires['signalement']);
                        $comments[]=$comment;
                    }

                }
                $chapitre = new Chapitre();
                $chapitre->setId($result['id']);
                $chapitre->setContenu(htmlspecialchars_decode($result['contenu']));
                $chapitre->setImage($result['image']);
                $chapitre->setTitre($result['titre']);
                $chapitre->setDateAjout(new DateTime($result['dateAjout']));

                if (isset($comments)) {
                    $chapitre->setListCommentaire($comments);
                }

            } catch (PDOException $e) {

                echo "Problème de connexion: " . $e->getMessage();
            }
            if (!empty($chapitre)) {
                return $chapitre;
            }
        }
        $this->connexion->closeConnection();
    }

    public function update(Chapitre $chapitre)
    {

        $pdo = $this->connexion->openConnection();

        $id = $chapitre->getId();
        $titre = $chapitre->getTitre();
        $contenu = $chapitre->getContenu();
        $image = $chapitre->getImage();

        $sql = "UPDATE chapitre SET titre = :titre, contenu = :contenu, image = :image, dateAjout = NOW() WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titre',$titre,PDO::PARAM_STR);
        $stmt->bindParam(':contenu',$contenu,PDO::PARAM_STR);
        $stmt->bindParam(':image',$image,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();

        $this->connexion->closeConnection();
    }

    public function delete($id)
    {

        $pdo = $this->connexion->openConnection();

        $sql = "DELETE FROM `chapitre` where id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();

        $this->connexion->closeConnection();
    }
}