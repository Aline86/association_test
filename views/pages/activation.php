<?php require 'header.php'; ?>
<div class="container">
    <div class="activation_form">
    <?php foreach($eleve as $info){ ?>
        <form method="POST" action="index.php?controller=eleve&action=inscriptiondef" onchange="return traitement();"  ><!--<i class="fas fa-eye-slash"></i>-->
        <input type="hidden" name="id" value="<?php echo $info->id_eleve; ?>" />
        <input type="email" class="input" name="email" id="mail" placeholder="e-mail" />
        <span id="circlemail"><i class="fas fa-check-circle"></i></span><span id="mailmessage">Veuillez remplir le champ</span>
        <br />
        <input type="email" class="input" name="emailconfirmation" id="mailconfirmation" placeholder="confirmation email" />
        <span id="circlemailconfirmation"><i class="fas fa-check-circle"></i></span><span id="mailmessageconfirmation">Veuillez confirmer</span>
        <br />
        <input type="password" class="input" name="password" id="pass1" placeholder="mot de passe" /><button class="button" id="oeil1" onclick=" visible(); return false"><i class="fas fa-eye"></i></button>
        <span id="pass1circle"><i class="fas fa-check-circle"></i></span><span id="pass1result">Mot de passe entre 7 et 16 caractères</span>
        <br />
        <input type="password" class="input" name="passwordconfirmation" id="pass2" placeholder="confirmation mot de passe" /><button class="button" id="oeil2" onclick="visible1(); return false"><i class="fas fa-eye"></i></button>
        <span id="pass2circle"><i class="fas fa-check-circle"></i></span><span id="pass2result">Veuillez confirmer</span>
        <br />
        <input class="input" type="submit" value="Valider" />
        </form>
    <?php } ?>
    </div>
</div>
<?php 
if(isset($erreur)) {
    if($erreur==1){
        echo 'Veuillez confirmer vos mail et mot de passe';
    }
    if($erreur==2){
        echo 'Veuillez remplir tous les champs';
    }
}
    ?>

<script>
    var js = document.createElement('script');
    js.type = 'text/javascript';
    js.src = 'scripts/activation.js' ;
    //Ajout de la balise dans la page
    document.body.appendChild(js);
</script> 