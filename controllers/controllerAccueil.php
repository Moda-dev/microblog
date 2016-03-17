<?php

require_once 'vues/vue.php';

class ControleurAccueil {


  public function __construct() {
  }

  // Connecte l'utilisateur, et le renvoi vers la page des messages en cas de succès.
  public function accueil() {
    $vue = new Vue("Connexion");
    $vue->generer($contenu = []);
  }
}
