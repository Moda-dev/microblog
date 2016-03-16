<?php

require_once 'vues/vue.php';

class ControleurAccueil {


  public function __construct() {
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $vue = new Vue("Connexion");
    $vue->generer($contenu = []);
  }
}
