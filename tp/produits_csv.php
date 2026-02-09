<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits CSV </title>
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

    <h2>Fichier CSV </h2>

    <?php
$csvPath = 'C:\Users\Jihan\Downloads\tpweb\tp\data\produits.csv';

if (!file_exists($csvPath)) {
    echo "<p style='color: red;'>Le fichier commerce.csv est introuvable.</p>";
    exit;
}

// Ouvrir le fichier CSV en lecture
$file = fopen($csvPath, 'r');

// Affichage du contenu CSV
echo "<h3>Contenu brut du fichier CSV :</h3>";
echo "<pre>" . htmlspecialchars(file_get_contents($csvPath)) . "</pre>";

// Réinitialiser le pointeur du fichier
rewind($file);

// Lire la première ligne comme en-têtes
$headers = fgetcsv($file, 1000, ','); // Suppose une séparation par virgule

if ($headers === false) {
    echo "<p style='color: red;'>Erreur : Le fichier CSV est vide .</p>";
    fclose($file);
    exit;
}

// Affichage en tableau HTML
echo "<h3>Affichage sous forme de tableau :</h3>";
echo "<table class='table-produits' border='1' cellpadding='8' cellspacing='0'>";
echo "<thead><tr>";
foreach ($headers as $header) {
    echo "<th>" . htmlspecialchars($header) . "</th>";
}
echo "</tr></thead><tbody>";

// Lire et afficher les lignes de données
while (($row = fgetcsv($file, 1000, ',')) !== false) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>";
}

echo "</tbody></table>";

// Fermer le fichier
fclose($file);
?>

</section>

<footer>PHP semestre 4 - Hoguin</footer>

</body>
</html>
