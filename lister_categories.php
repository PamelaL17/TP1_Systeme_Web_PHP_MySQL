<?php

include_once "db/connex.php";

include_once "classes/Categorie.php";

// Pour recuperer toutes les categories en creant une instance
$categorie = new Categorie();

// Recupere toutes les categories
$categories = $categorie->obtenirCategories();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
</head>
<body>
    <h1>Liste des Catégories</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
        <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><? echo htmlspecialchars($categorie['id']) ?></td>
            <td><? echo htmlspecialchars($categorie['nom']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>