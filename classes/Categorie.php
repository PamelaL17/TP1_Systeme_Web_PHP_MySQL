<?php
require_once 'CRUD.php';

class Categorie extends CRUD {

    public function __construct() {
        parent::__construct(); // Appelle le constructeur de la classe parent
    }

    // Ajoute une categorie
    public function ajouterCategorie($nom) {
        $data = ['nom' => $nom];
        return $this->insert('categories', $data);
    }

    // Obtetient toutes les categories
    public function obtenirCategories() {
        return $this->select('categories');
    }

    // Met a jour une categorie
    public function mettreAJourCategorie($id, $nom) {
        $data = ['nom' => $nom];
        return $this->update('categories', $data, $id);
    }

    // Supprime une categorie
    public function supprimerCategorie($id) {
        return $this->delete('categories', $id);
    }
}

