<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
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
            <?php foreach ($data as $categorie => $items): ?>
                <option value="<?= htmlspecialchars($categorie) ?>">
                    <?= htmlspecialchars($categorie) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Nom :</label>
        <input type="text" name="nom" required><br><br>

        <label>Origine :</label>
        <input type="text" name="origine" required><br><br>

        <label>Prix (€) :</label>
        <input type="number" step="0.01" name="prix" required><br><br>

        <button type="submit">Ajouter</button>
    </form>


</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>
