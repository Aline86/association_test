<?php require_once 'header.php'; ?>
<div class="container">
    <div id="form2" class="form4">
        <h3>Logins Connexion administrateur</h3>
        <form action="index.php?controller=admin&action=adminverif" method="POST">
            <input class="input4" type="text" placeholder="Login" name="login">
            <input class="input4" type="password" placeholder="Password" name="password">
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>