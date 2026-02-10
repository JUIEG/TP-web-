<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: admin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP PHP - semestre 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>TP PHP - semestre 4</header>

<nav>
    <a href="index.php">Accueil</a>

    <?php if (!isset($_SESSION['user'])): ?>
        <a href="connexion.php">Se connecter</a>
    <?php else: ?>
        <a href="produits_json.php">Produits (JSON)</a>
        <a href="produits_xml.php">Produits (XML)</a>
        <a href="produits_csv.php">Produits (CSV)</a>
        <a href="logout.php">Déconnexion</a>
    <?php endif; ?>
</nav>



<p>
    Bienvenue sur la page d'accueil. PHP (Hypertext Preprocessor), plus connu sous son sigle PHP
    (sigle auto-référentiel), est un langage de programmation libre, développé le 8 juin 1995.
    Il est principalement utilisé pour produire des pages Web dynamiques via un serveur web,
    mais peut également fonctionner comme n'importe quel langage interprété de façon locale.
    PHP est un langage impératif orienté objet.
</p>

<p>
    PHP a permis de créer un grand nombre de sites web célèbres, comme Facebook et Wikipédia.
    Il est considéré comme l’une des bases de la création de sites web dynamiques,
    mais également des applications web.
</p>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>
