<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$jsonFile = 'U:\tpweb\tp\data\data.json';
$jsonString = file_get_contents($jsonFile);
$data = json_decode($jsonString, true);

if ($data === null) {
    die("Erreur lors du décodage du fichier JSON.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $categorie = $_POST['categorie'];
    $nom = $_POST['nom'];
    $origine = $_POST['origine'];
    $prix = $_POST['prix'];

    $nouveauProduit = [
            "nom" => $nom,
            "origine" => $origine,
            "prix_unitaire" => $prix
    ];

    $data[$categorie][] = $nouveauProduit;

    file_put_contents(
            $jsonFile,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    header("Location: produits_json.php");
    exit();
}
?>


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
    <a href="index.php">Accueil</a>

    <?php if (!isset($_SESSION['user'])): ?>
        <a href="connexion.php">Se connecter</a>
    <?php else: ?>
        <a href="admin.php">Admin</a>
        <a href="produits_json.php">Produits (JSON)</a>
        <a href="produits_xml.php">Produits (XML)</a>
        <a href="produits_csv.php">Produits (CSV)</a>
        <a href="logout.php">Déconnexion</a>
    <?php endif; ?>
</nav>

<section style="margin-top: 15px;">

    <?php
    // Lecture du fichier JSON
    $jsonString = file_get_contents('U:\tpweb\tp\data\data.json');

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
    <h3>Ajouter un produit</h3>

    <form method ='post'>
        <label>Catégorie :</label>
        <select name="categorie" required>
<!--            menu deroulant-->
            <?php foreach ($data as $categorie => $items): ?>
                <option value="<?= htmlspecialchars($categorie) ?>">
                    <?= htmlspecialchars($categorie) ?>
                </option>
                <!--            diff options-->

            <?php endforeach; ?>
        </select><br><br>

        <label>Nom :</label>
        <input type="text" name="nom" required><br><br>

        <label>Origine :</label>
        <input type="text" name="origine" required><br><br>

        <label>Prix (€) :</label>
        <input type="number" step="any" min=0 name="prix" required><br><br>

        <button type="submit">Ajouter</button>
    </form>


</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>
