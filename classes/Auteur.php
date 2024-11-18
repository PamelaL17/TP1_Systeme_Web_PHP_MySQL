<?php

require_once 'CRUD.php';

class Auteur extends CRUD {

    public function __construct() {
        parent::__construct(); // Appelle le constructeur de la classe parent
    }

    // Ajoute un nouvel auteur
    public function ajouterAuteur($nom, $email, $motDePasse) {
        $data = [
            'nom' => $nom,
            'email' => $email,
            'mot_de_passe' => password_hash($motDePasse, PASSWORD_BCRYPT) // Hachage du mot de passe
        ];
        return $this->insert('auteurs', $data);
    }

    // Obtetient tous les auteurs
    public function obtenirAuteurs() {
        return $this->select('auteurs');
    }

    // Obtetient un auteur par son ID
    public function obtenirAuteur($id) {
        return $this->selectById('auteurs', $id);
    }

    // Met a jour un auteur
    public function mettreAJourAuteur($id, $nom, $email) {
        $data = [
            'nom' => $nom,
            'email' => $email
        ];
        return $this->update('auteurs', $data, $id);
    }

    // Supprime un auteur
    public function supprimerAuteur($id) {
        return $this->delete('auteurs', $id);
    }
}

