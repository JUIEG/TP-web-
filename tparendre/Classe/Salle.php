<?php

class Salle {
    public $nom;
    public $capacite;
    public $localisation;
    public $disponible="oui";

    // Constructeur
    public function __construct($nom, $capacite, $localisation,$disponible) {
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->localisation = $localisation;
        $this->disponible=$disponible;
    }

    // Getters et setters
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getCapacite() {
        return $this->capacite;
    }

    public function setCapacite($capacite) {
        $this->capacite = $capacite;
    }

    public function getLocalisation() {
        return $this->localisation;
    }

    public function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    public function getDisponibilite() {
        return $this->disponible;
    }

    public function setDisponibilite($disponible) {
        $this->disponible = $disponible;
    }

    // Méthode pour afficher les informations de la salle
    public function afficherInformations() {
        return "Nom: $this->nom, Capacité: $this->capacite, Localisation: $this->localisation, Disponibilité: " . ($this->disponible ? "oui" : "non");
    }
}
?>
