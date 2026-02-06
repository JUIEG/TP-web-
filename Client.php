<?php


require_once("Utilisateur.php");
$login = "user1";
$password = "user1";

$user = new Utilisateur($login, $password);
echo "<p>".$user."</p>\n";
echo "<p>".$user->miseEnFormeTime()."</p>\n";
echo "<p>{$user->information()}</p>\n";

$user->setLogin("admin");
$user->setPassword("admin");
$data = json_encode($user);
$fp = fopen("data/data2.json", "w");
fwrite($fp, $data);
fclose($fp);
