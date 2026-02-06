<?php
require_once("../Utilisateur.php");
include("../Utilisateur.php");
session_start();

function verification($login, $password) {
    $user = json_decode(file_get_contents('../data/data2.json'));

    if ($user['login'] === $login && $user['password'] === md5($password)) {
        $_SESSION['user'] = serialize(new Utilisateur($login, $password));
        return true;
    }

    return false;
}
function verification2($login, $password){
    $xml = simplexml_load_file('../data/data2.xml');
    if($xml->login == $login && $xml->password == md5($password)){
        return true;
    }
    return false;
}

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if (verification($login, $password)) {
    header("Location: admin.php");
    exit();
} else {
    $_SESSION['error'] = "Login ou mot de passe incorrect";
    header("Location: index1.php");
    exit();
}
?>

