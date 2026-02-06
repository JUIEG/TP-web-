<?php

class Utilisateur
{
    public $login;
    public $password;
    public $timestamp;
    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = md5($password);
        $this->timestamp = time();
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function __destruct() {
        echo "<p><b>@suppression de $this->login</b></p>";
    }

    public function __toString() {
        return "<p><b>Login : $this->login</b> et <b>Password : $this->password</b> et <b>Timestamp : $this->timestamp</b></p>";
    }

    public function __sleep() {
        return array("login", "password", "timestamp");
    }

    public function __wakeup() {
        echo "<p>C'est l'heure</p>";
    }

    public function miseEnFormeTime() {
        setLocale(LC_TIME, 'fr_FR.UTF-8');
        $format = date("l m Y à H:i:s", $this->timestamp);
        return (strftime($format, $this->timestamp));
    }

    public function information() {
        $dateCreation = $this->miseEnFormeTime();
        return ("$this->login - $this->password - créé le : $dateCreation");
    }
}