<?php require 'header.php'; ?>
<div class="container">
    
    <div class="content">
        <div id="parallax"></div>
        <div class="title">Cours de langues tous niveaux</div>
        <div class="languages">
            <div class="language">
                <div class="italian">Italien</div>
                <div class="polish">Polonais</div>
            </div>
            <div class="lipsit"><img src="images/itialie.png"></div>
            <div class="lipspl"><img src="images/pologne.png"></div>
        </div>
    </div>
    <div class="slideshow2">
        <ul>
            <li><img src="images/avocado.jpg" alt="" width="350" height="200" /></li>
            <li><img src="images/legumes.jpg" alt="" width="350" height="200" /></li>
            <li><img src="images/restaurant.jpg" alt="" width="350" height="200" /></li>
            <li><img src="images/tacos.jpg" alt="" width="350" height="200" /></li>
        </ul>
    </div>
</div>
<script>
    var js = document.createElement('script');
    js.type = 'text/javascript';
    js.src = 'scripts/slider.js' ;
    //Ajout de la balise dans la page
    document.body.appendChild(js);
</script> 
<?php require_once 'footer.php' ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src=https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js></script>