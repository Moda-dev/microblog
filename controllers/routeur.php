<?php


require_once 'controllers/controllerAccueil.php';
require_once 'controllers/controllerMessage.php';
require_once 'vues/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlBillet = new controllerMessage();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
        if ($_GET['action'] == 'message') {
          if (isset($_GET['id'])) {
            $idMessage = intval($_GET['id']);
            if ($idMessage != 0) {
              $this->ctrlBillet->message($idMessage);
            }
            else
              throw new Exception("Identifiant de message non valide");
          }
          else
            throw new Exception("Identifiant de message non défini");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}
