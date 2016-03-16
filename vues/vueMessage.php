<?php $this->titre = "Mon Blog - " . $_SESSION['user']; ?>

<?php foreach ($messages as $message): ?>

    <p><?= $message['auteur'] ?> dit :</p>
    <p><?= $message['texte'] ?></p>
    <p><?= $message['date'] ?></p>

<?php endforeach; ?>
