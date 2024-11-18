<?php
include_once "db/connex.php";

include_once "classes/Article.php";
include_once "classes/Auteur.php";
include_once "classes/Categorie.php";

// Pour recuperer les donnees des auteurs en creant une instance
$auteur = new Auteur();

// Pour recuperer les donnees des categories en creant une instance
$categories = new Categorie();

// Recupere tous les auteurs
$auteurs = $auteur->obtenirAuteurs(); 

// Recupere toutes les categories
$listeCategories = $categories->obtenirCategories(); 

// Pour verifier si le formulaire a ete soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere des donnees du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur_id = $_POST['auteur_id'];
    $categorie_id = $_POST['categorie_id'];

    // Pour ajouter un article en creant une instance
    $article = new Article($pdo);

    // Pour ajouter un nouvel article
    $article->ajouterArticle($titre, $contenu, $auteur_id, $categorie_id);

    // Message a afficher pour confirmer l'ajout
    $message = "Article ajouté avec succès.";
    $message_type = "success"; // Classe CSS pour afficher le message en vert
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    <link rel="stylesheet" href="css/styles.css?v=1.1">
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

    <div class="container">
        <div class="form-container">
            <h2>Ajouter un Article</h2>

            <?php if (isset($message)): ?>
                <div class="message <?php echo $message_type; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="add-article-form">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" name="titre" class="form-input" required><br>

                <label for="contenu" class="form-label">Contenu :</label>
                <textarea name="contenu" class="form-textarea" required></textarea><br>

                <label for="auteur_id" class="form-label">Auteur :</label>
                <select name="auteur_id" class="form-select" required>
                    <!-- Remplissage dynamique des options avec les auteurs-->
                    <?php foreach ($auteurs as $auteur): ?>
                        <option value="<? echo htmlspecialchars($auteur['id']) ?>" class="form-option"><? echo htmlspecialchars($auteur['nom']) ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="categorie_id" class="form-label">Catégorie :</label>
                <select name="categorie_id" class="form-select" required>
                    <!-- Remplissage dynamique des options avec les categories-->
                    <?php foreach ($listeCategories as $categorie): ?>
                        <option value="<? echo htmlspecialchars($categorie['id']) ?>" class="form-option"><? echo htmlspecialchars($categorie['nom']) ?></option>
                    <?php endforeach; ?>
                </select><br>

                <button type="submit" class="form-button">Ajouter l'Article</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; TP1 Système web PHP orienté objet avec une base de données MySQL, 2024.</p>
    </footer>
</body>
</html>