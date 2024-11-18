<?php
require_once 'CRUD.php';

class Commentaire extends CRUD {

    public function __construct() {
        parent::__construct(); // Appelle le constructeur de la classe parent
    }

    // Ajoute un commentaire
    public function ajouterCommentaire($article_id, $auteur, $contenu) {
        $data = [
            'article_id' => $article_id,
            'auteur' => $auteur,
            'contenu' => $contenu
        ];
        return $this->insert('commentaires', $data);
    }

    // Obtetient les commentaires d'un article
    public function obtenirCommentairesParArticle($article_id) {
        $sql = "SELECT * FROM commentaires WHERE article_id = :article_id ORDER BY date_creation DESC";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':article_id', $article_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne tous les commentaires associer a l'article
    }

    // Supprime un commentaire
    public function supprimerCommentaire($id) {
        return $this->delete('commentaires', $id);
    }
}

