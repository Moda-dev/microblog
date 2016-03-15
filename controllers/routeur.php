<?php


require_once 'controllers/controllerAccueil.php';
require_once 'controllers/controllerMessage.php';
require_once 'vues/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlMessage;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlMessage = new ControllerMessage();
  }

  // Traite une requête entrante
    public function routerRequete() {
        try
        {
            if (isset($_POST['action']))
            {
                if ($_POST['action'] == 'connexion')
                {
                    if (isset($_POST['login']) || isset($_POST['password']))
                    {
                        $this->ctrlMessage->connecterUtilisateur($_POST['login'], $_POST['password']);
                    }
                    else
                        throw new Exception("Identifiants non valides.");
                }
            }
            else {  // aucune action définie : affichage de l'accueil
                    $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e)
        {
            $this->erreur($e->getMessage());
        }
    }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}
