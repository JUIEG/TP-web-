<?php
session_start();
var_dump($_SESSION);

require_once('Utilisateur.php');

function verification($login, $password) {
    if ($login === 'admin' && $password === 'admin') {
        $_SESSION['user'] = serialize(new Utilisateur($login, $password));
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
    header("Location: index.php");
    exit();
}
?>