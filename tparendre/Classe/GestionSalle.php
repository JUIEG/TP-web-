<?php

class GestionSalle {
    public $salles = [];

    // Ajouter une salle
    public function ajouterSalle(Salle $salle) {
        $this->salles[] = $salle;
    }

    public function __sleep(){
        return ["salles"];
    }

    public function __wakeup(){
    }


    //Supprimer une salle
    public function supprimerSalle($nomSalle) {
        foreach($this->salles as $key=>$salle){
         {
             if($salle->nom===$nomSalle){
             unset($this->salles[$key]);
             }
           }
        }
    return false;
    }

    // Changer la disponibilité d'une salle
    public function changerDisponibilite($nomsalle) {
          foreach($this->salles as $key=>$salle){
              if($salle->nom===$nomsalle){
                  if($salle->disponible=="oui"){
                     $this->salles[$key]->disponible="non";
                  } else {
                      $this->salles[$key]->disponible="oui";
                  }
              }
          }
          return false;
    }

//    public function verifierSalle($nomsalle){
//        echo "<pre>";
//        print_r($this->salles);
//        echo "</pre>";;
//        foreach($this->salles as $salle){
//            if($salle->nom===$nomsalle){
//                return true;
//            } else {
//                return false;
//            }
//        }
//    }
    public function verifierSalle($nomsalle){

        foreach($this->salles as $salle){
            if($salle->nom === $nomsalle){
                return true;
            }
        }

        return false;
    }


    // Afficher toutes les salles
    public function afficherToutesSalles() {
        echo "<table>";
        echo "<tr><th>Nom</th>
                <th>Capacité</th>
                <th>Localisation</th>
                <th>Disponibilité</th>
                </tr>";
        foreach ($this->salles as $salle) {
            echo "<tr>";
            echo "<td>".$salle->nom."</td>";
            echo "<td>".$salle->capacite."</td>";
            echo "<td>".$salle->localisation."</td>";
            echo "<td>".$salle->disponible."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }


}
?>
