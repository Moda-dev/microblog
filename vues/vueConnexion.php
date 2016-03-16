<?php $this->titre = "Connexion"; ?>
<div class="container">

    <form action="index.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputLogin" class="form-control" placeholder="Login" name="login" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

        <input type="hidden" name="action" value="connexion">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    </form>

</div>
