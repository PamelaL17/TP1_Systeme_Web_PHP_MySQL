<?php
include_once "db/connex.php";

include_once "classes/Auteur.php";

// Pour verifier si le formulaire a ete soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere les donnees envoyer par le formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['mot_de_passe'];

    // Pour recuperer les donnees des auteurs en creant une instance
    $auteur = new Auteur();

    // Pour ajouter un nouvel auteur
    $auteur->ajouterAuteur($nom, $email, $motDePasse);

    // Message a afficher pour confirmer l'ajout
    echo "Auteur ajouté avec succès.";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ajouter un Auteur</title>
</head>
<body>
    <header>
        <h1>TP1 Blog avec une base de données MySQL</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="ajouter_article.php">Ajouter un article</a></li>
                <li><a href="ajouter_auteur.php">Ajouter un auteur</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="add-auteur-container">
        <h2>Ajouter un Auteur</h2>

        <form class="add-auteur-form" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>