<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits XML</title>
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

    <h2>Fichier XML </h2>

    <?php
    // Chargement du fichier XML
    $xmlPath = 'C:\Users\Jihan\Downloads\data\commerce.xml';

    if (!file_exists($xmlPath)) {
        echo "<p style='color: red;'>Le fichier commerce.xml est introuvable.</p>";
        exit;
    }

    // Charger et parser le fichier XML
    $xml = simplexml_load_file($xmlPath);

    if ($xml === false) {
        echo "<p style='color: red;'>Erreur lors du chargement du fichier XML.</p>";
        exit;
    }

    echo "<h3> Liste des produits :</h3>";


    foreach ($xml as $categorie => $items) {
        echo "<h3>" . htmlspecialchars(ucfirst($categorie)) . "</h3>";

        echo "<table class='table-produits' border='1' cellpadding='8' cellspacing='0'>";
        echo "<thead><tr><th>Nom</th><th>Origine</th><th>Prix unitaire</th></tr></thead><tbody>";

        foreach ($items as $produit) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($produit->nom) . "</td>";
            echo "<td>" . htmlspecialchars($produit->origine) . "</td>";
            echo "<td>" . htmlspecialchars($produit->prix_unitaire) . " €</td>";
            echo "</tr>";
        }

        echo "</tbody></table><br>";
    }
    ?>

</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>