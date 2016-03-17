<?php

require_once 'modeles/utilisateur.php';
require_once 'vues/vue.php';

class ControllerMessage {

  private $utilisateur;

  public function __construct() {
    $this->utilisateur = new utilisateur();
  }

  //lance la connexion de l'utilisateur afin qu'il accède a ses messages.
  public function connecterUtilisateur($login, $mdp){
    $this->utilisateur->connexion($login, $mdp);
    $this->messages();
  }

  // Affiche les messages de l'utilisateur et des personnes qu'il suit.
  public function messages() {
    $messages = $this->utilisateur->getMessages();
    $vue = new Vue("Message");
    $vue->generer(array('messages' => $messages));
  }
  //ajoute un message à l'utilisateur connecté.
  public function ajouterMessage($message) {
      $this->utilisateur->addMessage($message);
      $this->messages();
  }
  //deconnecte l'utilisateur courant.
  public function deconnexion()
  {
    $this->utilisateur->deconnexion();
  }
}
