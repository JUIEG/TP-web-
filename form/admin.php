<?php
require_once("../Utilisateur.php");
session_start();

if (isset($_SESSION['user'])) {
    header("Location: index1.php");
    exit();
}

$user = unserialize($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>

<h1>Bienvenue
    <?php echo "{$user->getLogin()}"; ?></h1>
<p><?php echo "{$user->information()}"; ?></p>

<a href="logout.php">Déconnexion</a>

</body>
</html>
