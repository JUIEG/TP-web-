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

    <!-- FORMULAIRE AJOUT PRODUIT -->
    <h2>Ajouter un produit</h2>

    <form method="post">
        <input type="text" name="categorie" placeholder="Catégorie" required>
        <input type="text" name="nom" placeholder="Nom du produit" required>
        <input type="text" name="origine" placeholder="Origine" required>
        <input type="number" step="0.01" name="prix" placeholder="Prix (€)" required>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <hr>

    <?php
    $fichier = 'U:\tpweb\tp\data\data.json';

    // TRAITEMENT DU FORMULAIRE (AJOUT SEULEMENT)
    if (isset($_POST['ajouter'])) {

        $jsonString = file_get_contents($fichier);
        $data = json_decode($jsonString, true);

        $categorie = trim($_POST['categorie']);
        $nom = trim($_POST['nom']);
        $origine = trim($_POST['origine']);
        $prix = floatval($_POST['prix']);

        if (!isset($data[$categorie])) {
            $data[$categorie] = [];
        }

        $data[$categorie][] = [
            "nom" => $nom,
            "origine" => $origine,
            "prix_unitaire" => $prix
        ];

        file_put_contents(
            $fichier,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        echo "<p style='color:green;'>Produit ajouté avec succès ✔</p>";
    }

    // Lecture du fichier JSON
    $jsonString = file_get_contents($fichier);

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
