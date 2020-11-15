<?php 
require_once 'header.php';
?>
<div class="container">
    <div class="content">
    <h4 class="text_activation">Afin d'accéder à votre compte, il faut être membre de l'association. Veuillez prendre contact avec l'association grâce au formulaire de contact.</h4>
    <div class="main">
        <div class="column">
            <div class="popup">
                <form class="form3" method="POST" action="index.php?controller=eleve&action=connexion">
                    <div class="column">
                        <div class="direction">
                            <input class="text"  type="text" name="activation" placeholder="code d'activation" />
                            <input class="submit" type="submit" />
                        </div>
                        <div class="error">
                            <?php if(isset($eleve)){
                                echo 'Le code n\'est pas valide';
                            } ?>
                        </div>
                    </div>
                </form> 
            </div>            
        </div>    
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

