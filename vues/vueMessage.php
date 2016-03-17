<?php $this->titre = "Mon Blog - " . $_SESSION['user']; ?>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Microblog</a>
        </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
          </ul>
        </div>
    </nav>

<div class='container content'>
   <!--Formulaire d'ajout d'un message-->
    <form class='poster' action="index.php" method="post">
        <fieldset>
            <legend>Exprimez-vous : </legend>
            <input type='text' size='70' name='message'>
            <span class="help-block">Maximum 140 caractères</span>
            <input type="hidden" name="action" value="poster">
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </fieldset>
    </form>

    <!--liste des messages -->
    <?php foreach ($messages as $message): ?>
    <div class='message'>
        <p class='auteur'><?= $message['login'] ?> dit :</p>
        <p class='contenu'><?= $message['texte'] ?></p>
        <p class='date'><?= $message['date'] ?></p>

    </div>
    <?php endforeach; ?>
</div>
