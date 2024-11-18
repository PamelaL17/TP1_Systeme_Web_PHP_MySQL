<?php

include_once "db/connex.php";
include_once "classes/Categorie.php";

// Pour verifier si le formulaire a ete soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere les donnees envoyer par le formulaire
    $nom = $_POST['nom'];

    // Pour recuperer les donnees des categories en creant une instance
    $categorie = new Categorie();

    // Pour ajouter une nouvelle categorie
    $categorie->ajouterCategorie($nom);

    // Message a afficher pour confirmer l'ajout
    echo "Catégorie ajoutée avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
</head>
<body>
    <h1>Ajouter une Catégorie</h1>
    <form method="POST">
        <label>Nom de la Catégorie :</label>
        <input type="text" name="nom" required><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>