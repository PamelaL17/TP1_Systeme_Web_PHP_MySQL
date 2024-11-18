<?php

require_once 'CRUD.php';

class Article extends CRUD {

    public function __construct() {
        parent::__construct(); // Appelle le constructeur de la classe parent
    }

    // Ajoute un nouvel article
    public function ajouterArticle($titre, $contenu, $auteur_id, $categorie_id) {
        $data = [
            'titre' => $titre,
            'contenu' => $contenu,
            'auteur_id' => $auteur_id,
            'categorie_id' => $categorie_id
        ];
        return $this->insert('articles', $data);
    }

    // Obtetient tous les articles
    public function obtenirArticles() {
        return $this->select('articles');
    }

    // Obtetient un article par son ID
    public function obtenirArticle($id) {
        return $this->selectById('articles', $id);
    }

    // Met a jour un article
    public function mettreAJourArticle($id, $titre, $contenu) {
        $data = [
            'titre' => $titre,
            'contenu' => $contenu
        ];
        return $this->update('articles', $data, $id);
    }

    // Supprime un article
    public function supprimerArticle($id) {
        return $this->delete('articles', $id);
    }
}

