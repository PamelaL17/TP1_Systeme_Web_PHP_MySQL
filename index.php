<?php
require_once 'db/connex.php';
require_once 'classes/Auteur.php';
require_once 'classes/Article.php';
require_once 'classes/Commentaire.php';

// Initialisation des classes
$auteur = new Auteur();
$article = new Article();
$commentaire = new Commentaire();

// Recupere les articles et leurs auteurs
$articles = $article->obtenirArticles();

// Ajouter un commentaire si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    $article_id = $_POST['article_id'];
    $auteur_commentaire = $_POST['auteur_commentaire'];
    $contenu_commentaire = $_POST['contenu_commentaire'];
    $commentaire->ajouterCommentaire($article_id, $auteur_commentaire, $contenu_commentaire);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog TP1</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <?php foreach ($articles as $articleData): ?>
            <article>
                <h2><?php echo htmlspecialchars($articleData['titre']); ?></h2>
                <p class="meta">Par <?php echo htmlspecialchars($articleData['auteur_id']); ?></p>
                <p><?php echo nl2br(htmlspecialchars($articleData['contenu'])); ?></p>

                <!-- Commentaires -->
                <div class="commentaires">
                    <?php
                    $commentaires = $commentaire->obtenirCommentairesParArticle($articleData['id']);
                    foreach ($commentaires as $commentaireData):
                    ?>
                        <div class="commentaire-item">
                            <strong><?php echo htmlspecialchars($commentaireData['auteur']); ?>:</strong>
                            <p><?php echo nl2br(htmlspecialchars($commentaireData['contenu'])); ?></p>
                        </div>
                    <?php endforeach; ?>

                    <!-- Formulaire pour ajouter un commentaire -->
                    <div class="commentaire-form">
                        <h3>Ajouter un commentaire</h3>
                        <form action="index.php" method="post">
                            <input type="hidden" name="article_id" value="<?php echo $articleData['id']; ?>">
                            <label for="auteur_commentaire">Nom:</label>
                            <input type="text" id="auteur_commentaire" name="auteur_commentaire" required>

                            <label for="contenu_commentaire">Commentaire:</label>
                            <textarea id="contenu_commentaire" name="contenu_commentaire" required></textarea>

                            <button type="submit" name="commentaire">Envoyer le commentaire</button>
                        </form>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>


    <footer>
        <p>&copy; TP1 Système web PHP orienté objet avec une base de données MySQL, 2024.</p>
    </footer>
</body>
</html>