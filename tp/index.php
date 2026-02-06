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
    <a href="index.php">accueil</a>
    <a href="produits_json.php">Produit (json)</a>
    <a href="produits_xml.php">Produits (xml)</a>
</nav>

<section>
    <form action="login.php" method="post">
        <fieldset>
            <legend>Authentification</legend>

            <label for="login">Login</label>
            <input type="text" name="login" id="login" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Envoyer">
        </fieldset>
    </form>
</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>