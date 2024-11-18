<?php

include_once "db/connex.php";

include_once "classes/Auteur.php";

// Pour recuperer tous les auteurs en creant une instance
$auteur = new Auteur();

// Recupere tous les auteurs
$auteurs = $auteur->obtenirAuteurs();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Auteurs</title>
</head>
<body>
    <h1>Liste des Auteurs</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date de création</th>
        </tr>
        <?php foreach ($auteurs as $auteur): ?>
        <tr>
            <td><? echo htmlspecialchars($auteur['id']) ?></td>
            <td><? echo htmlspecialchars($auteur['nom']) ?></td>
            <td><? echo htmlspecialchars($auteur['email']) ?></td>
            <td><? echo htmlspecialchars($auteur['date_creation']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>