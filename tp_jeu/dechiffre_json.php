<?php

$json = file_get_contents("trame.json");

$data = json_decode($json, true);

foreach ($data as $d) {
    $login = $d['login'];
    $mdp_encode = $d['mdp'];

    $mdp = base64_decode(base64_decode($mdp_encode));
    echo "Login : $login\n";
    echo "Mot de passe : $mdp\n";
}

?>