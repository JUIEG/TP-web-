<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produit JSON</title>
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

    <?php
    // affichage JSON
    $jsonString = file_get_contents('C:\Users\Jihan\Downloads\tpweb\tp\data\data.json');
    // Affichage du JSON
    echo "<h2>Fichier JSON :</h2>";
    echo "<pre>" . htmlspecialchars($jsonString) . "</pre>";

    // Décodage JSON en tableau PHP
    $data = json_decode($jsonString, true);

    if ($data === null) {
        echo "<p>Erreur lors du décodage du fichier JSON.</p>";
        exit;
    }


    foreach ($data as $categorie => $items) {
        echo "<h3>" . htmlspecialchars(ucfirst($categorie)) . "</h3>";

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<table class='table-produits' border='1' cellpadding='5' cellspacing='0'>";

        echo "<thead><tr><th>Nom</th><th>Origine</th><th>Prix unitaire</th></tr></thead><tbody>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($item['origine']) . "</td>";
            echo "<td>" . htmlspecialchars($item['prix_unitaire']) . " €</td>";
            echo "</tr>";
        }

        echo "</tbody></table><br>";
    }
    ?>

</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>