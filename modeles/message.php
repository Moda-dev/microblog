<?php

require_once 'modeles/modele.php';

class message extends Modele {

  // Renvoie la liste des billets du blog
  public function getMessages() {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $messages = $this->executerRequete($sql);
    return $messages;
  }

  // Renvoie les informations sur un billet
  public function getMessage($idMessage) {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' where BIL_ID=?';
    $message = $this->executerRequete($sql, array($idMessage));
    if ($message->rowCount() == 1)
      return $message->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun messge ne correspond à l'identifiant '$idMessage'");
    }
}
