<?php

require_once 'modeles/modele.php';

class utilisateur extends Modele {

    private $userId;
    private $userName;

    //connect un utilisateur à l'application
    public function connexion($login, $mdp)
    {
        $sql = 'select * from utilisateurs where login = ? AND motdepasse = ?';
        $res = $this->executerRequete($sql, array($login, sha1($mdp)));

        if ($res->rowCount() >= 1)
        {
            $utilisateur =  $res->fetch(PDO::FETCH_ASSOC);  // Accès à la première ligne de résultat
            session_start();
            $this->userId =  $utilisateur['id'];
            $this->userName = '' . $utilisateur['prenom'] . ' ' . $utilisateur['nom'] .'';
            $_SESSION['user'] = $this->userName;
            $_SESSION['userId'] = $this->userId;
        }
        else
        {
          throw new Exception("Problème de connexion. contacter l'admin." . $utilisateur);
        }
        return $utilisateur;
    }

    // Renvoie la liste des message de l'utilisateur, et des personnes qu'il suit.
    //Un utilisateur possède au moins un abonnement, lui-même.
    public function getMessages() {
        $sql = 'select date, texte, login as auteur from messages, utilisateurs where messages.auteur=utilisateurs.id and messages.auteur in (select suivi from abonnements where abonne='.$_SESSION['userId'].') order by date';
        $messages = $this->executerRequete($sql);
        return $messages;
    }

        // Renvoie la liste des message de l'utilisateur, et des personnes qu'il suit.
    //Un utilisateur possède au moins un abonnement, lui-même.
    public function addMessage($message) {
        session_start();
        $sql = 'insert into messages( texte, date, auteur) values ( ?, now(), ?)' ;
        $this->executerRequete($sql, array($message, $_SESSION['userId']));
    }

    public function deconnexion()
    {
        session_start();
         // suppression des variables de sessions
         session_unset();
         // On détruit la session
         session_destroy();
    }
}
