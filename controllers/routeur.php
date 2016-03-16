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
                //Si l'action est connexion
                if ($_POST['action'] == 'connexion')
                {
                    //Si les logins et mot de passe sont renseignés
                    if (isset($_POST['login']) || isset($_POST['password']))
                    {
                        //on tente une connexion avec les infos renseignées.
                        $this->ctrlMessage->connecterUtilisateur(htmlentities($_POST['login']), htmlentities($_POST['password']));
                    }
                    else
                        //En cas d'échac de la connexion, on retourne une erreure.
                        throw new Exception("Identifiants non valides.");
                }
                //Si l'action est 'poster'
                else if ($_POST['action'] == 'poster')
                {
                    if (isset($_POST['message']))
                    {
                        //Si le message ne dépasse pas les 140 caractères.
                        if(strlen($_POST['message']) < 140 )
                        {
                            //on enregistre le message.
                             $this->ctrlMessage->ajouterMessage(htmlentities($_POST['message']));
                        }
                        else
                            throw new Exception("message trop long. 140 caratères maximum.");
                    }
                }
            }
            else if (isset($_GET['action']))
            {
                if ($_GET['action'] == 'deconnexion')
                {
                    $this->ctrlMessage->deconnexion();
                    $this->ctrlAccueil->accueil();
                }
            }
            else {
                session_start();
                if(isset($_SESSION['user']) || isset($_SESSION['userId']))
                {
                    $this->ctrlMessage->messages();
                }
                else
                {
                    // aucune action définie : affichage de l'accueil
                    $this->ctrlAccueil->accueil();
                }
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
