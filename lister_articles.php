<?php

include_once "db/connex.php";

include_once "classes/Article.php";
include_once "classes/Commentaire.php";

// Pour recuperer les articles en creant une instance
$article = new Article();

// Pour recuperer les commentaires en creant une instance
$commentaire = new Commentaire();

// Recupere tous les articles
$articles = $article->obtenirArticles();

// Pour verifier si le formulaire a ete soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    // Recupere les donnees envoyer par le formulaire
    $article_id = $_POST['article_id'];
    $auteur = $_POST['auteur'];
    $contenu = $_POST['contenu'];

    // Pour ajouter un commentaire
    $commentaire->ajouterCommentaire($article_id, $auteur, $contenu);

    /// Message a afficher pour confirmer l'ajout
    echo "Commentaire ajouté avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?v=1.1">
    <title>Liste des Articles</title>
</head>
<body>
    <h1>Liste des Articles</h1>
    <?php foreach ($articles as $article): ?>
        <h2><? htmlspecialchars($article['titre']) ?></h2>
        <p><? htmlspecialchars($article['contenu']) ?></p>
        <p><strong>Auteur : </strong><? htmlspecialchars($article['auteur_nom']) ?></p>
        <p><strong>Catégorie : </strong><? htmlspecialchars($article['categorie_id']) ?></p>
        <p><strong>Date : </strong><? htmlspecialchars($article['date_creation']) ?></p>

        <h3>Commentaires</h3>

        <form method="POST">
            <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
            <label>Nom :</label>
            <input type="text" name="auteur" required><br>

            <label>Commentaire :</label>
            <textarea name="contenu" required></textarea><br>

            <button type="submit" name="commentaire">Ajouter un Commentaire</button>
        </form>

        <h4>Liste des Commentaires :</h4>
        <!-- Recupere les commentaires de l'article concerner -->
        <?php $commentaires = $commentaire->obtenirCommentairesParArticle($article['id']);
            foreach ($commentaires as $commentaire): ?>
                <p><strong><? echo htmlspecialchars($commentaire['auteur']) ?></strong> : <? echo htmlspecialchars($commentaire['contenu']) ?> <em>(<? echo htmlspecialchars($commentaire['date_creation']) ?>)</em></p>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</body>
</html>