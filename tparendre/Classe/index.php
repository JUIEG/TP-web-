<?php

session_start();

require_once "Salle.php";
require_once "GestionSalle.php";

$jsonFile = "json-data-salle.json";


if (!isset($_SESSION['gestion'])) {

    $gestion = new GestionSalle();

    if (file_exists($jsonFile)) {

        $jsonData = file_get_contents($jsonFile);
        $data = json_decode($jsonData, true);

        if ($data !== null) {
            foreach ($data as $s) {
                $salle = new Salle(
                    $s["nom"],
                    $s["capacité"],
                    $s["localisation"],
                    $s["disponible"]
                );
                $gestion->ajouterSalle($salle);
            }
        }
    }

    $_SESSION['gestion'] = serialize($gestion);
} else {
    $gestion = unserialize($_SESSION['gestion']);
}

if (isset($_POST['ajouter'])) {

    $nom = $_POST['nom'];
    $capacite = $_POST['capacite'];
    $localisation = $_POST['localisation'];

    if ($gestion->verifierSalle($nom)) {

        $_SESSION['message'] = "<p style='color:red;'>Cette salle existe déjà !</p>";

    } else {

        $nouvelleSalle = new Salle($nom, $capacite, $localisation, "oui");
        $gestion->ajouterSalle($nouvelleSalle);

        $_SESSION['gestion'] = serialize($gestion);

        $_SESSION['message'] = "<p style='color:green;'>Salle ajoutée!</p>";    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


if (isset($_POST['supprimer'])) {

    $nom = $_POST['nom'];
    $gestion->supprimerSalle($nom);

    $_SESSION['gestion'] = serialize($gestion);
}

if (isset($_POST['changer'])) {

    $nom = $_POST['nom'];
    $gestion->changerDisponibilite($nom);

    $_SESSION['gestion'] = serialize($gestion);
}



$sauvegarde = [];

foreach ($gestion->salles as $s) {
    $sauvegarde[] = [
        "nom" => $s->nom,
        "capacité" => $s->capacite,
        "localisation" => $s->localisation,
        "disponible" => $s->disponible
    ];
}
file_put_contents(
    $jsonFile,
    json_encode($sauvegarde, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);
?>
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Supprimer le message après affichage
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des Salles</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
<h2>Liste des salles</h2>

<?php $gestion->afficherToutesSalles(); ?>
<fieldset>
    <legend>Ajouter une salle</legend>
    <form method="post">
        Nom :<br>
        <input type="text" name="nom" required><br>

        Capacité :<br>
        <input type="number" name="capacite" min="1" required><br>

        Localisation :<br>
        <input type="text" name="localisation" required><br>

        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</fieldset>

<fieldset>
    <legend>Supprimer une salle</legend>
    <form method="post">
        Nom :<br>
        <input type="text" name="nom" required><br>

        <button type="submit" name="supprimer">Supprimer</button>
    </form>
</fieldset>


<fieldset>
    <legend>Changer disponibilité</legend>
    <form method="post">
        Nom :<br>
        <input type="text" name="nom" required><br>

        <button type="submit" name="changer">
            Changer disponibilité
        </button>
    </form>
</fieldset>


</body>
</html>
