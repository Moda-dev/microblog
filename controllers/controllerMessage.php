<?php

require_once 'modeles/message.php';
require_once 'vues/vue.php';

class ControllerMessage {

  private $message;

  public function __construct() {
    $this->message = new Message();
  }

  // Affiche les détails sur un billet
  public function message($idMessage) {
    $message = $this->message->getMessage($idMessage);
    $vue = new Vue("Message");
    $vue->generer(array('message' => $message));
  }
}
