<?php require 'header.php'; ?>
<div class="container">
    <div class="container">
        <div class="for_prof">
            <form method="POST" action="index.php?controller=professeur&action=connexionverif">
                <input type="text" name="login">
                <input type="password" name="password" />
                <input type=submit />
            </form>
            <p><?php echo 'Vous n\'avez pas accès à l\'espace professeur'; ?></p>
        </div>

    </div>
</div>