<?php
session_start();
require_once('Utilisateur.php');

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = unserialize($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - TP PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>TP PHP - semestre 4</header>

<nav>
    <a href="index.php">accueil</a>
    <a href="produits_json.php">Produit (json)</a>
    <a href="produits_xml.php">Produits (xml)</a>
</nav>

<section style="margin-top: 15px;">
    <h1><strong><?php echo htmlspecialchars($user->getLogin()); ?></strong></h1>

    <p>Bonjour <?php echo htmlspecialchars($user->getLogin()); ?> : <?php echo htmlspecialchars($user->information()); ?></p>

    <?php echo $user; ?>
</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>