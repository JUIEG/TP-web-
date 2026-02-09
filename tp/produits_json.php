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
    <a href="produits_csv.php">Produits (csv)</a>
</nav>

<section style="margin-top: 15px;">

    <?php
    // Lecture du fichier JSON
    $jsonString = file_get_contents('C:\Users\Jihan\Downloads\tpweb\tp\data\data.json');

    echo "<h2>Fichier JSON :</h2>";
    echo "<h3>Liste des produits :</h3>";
//    echo "<pre>" . htmlspecialchars($jsonString) . "</pre>";

    // Décodage JSON
    $data = json_decode($jsonString, true);
    echo "<pre>";
    print_r($data);
    echo "</pre>";


    if ($data === null) {
        echo "<p>Erreur lors du décodage du fichier JSON.</p>";
        exit;
    }

    foreach ($data as $categorie => $items) {

        echo "<table class='table-produits'>";

        echo "<thead>";
        echo "<tr class='categorie'>";
        echo "<th colspan='3'>" . htmlspecialchars($categorie) . "</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Origine</th>";
        echo "<th>Prix</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($item['origine']) . "</td>";
            echo "<td>" . htmlspecialchars($item['prix_unitaire']) . " €</td>";
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table><br>";
    }
    ?>

</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>
