
<?php require_once 'header.php';?>
<div class="container">
    <div class="space">
        <div class="titre"><?php echo '<h2>Bienvenue '.$eleve->prenom_eleve.' Il vous reste : '.$eleve->nb_cours. ' cours </h2>'; ?></div>
        <div class="content">
            <div class="langue1" onload="Refresh()">
                <div class="horaires"><?php echo '<h2>Prochain cours : '; foreach($niveau1 as $niveau){echo utf8_encode($niveau->libelle_niveau).'</h2><br />';};setlocale(LC_TIME, "fr_FR", "French");  foreach($cours1 as $cours){echo '<h3> '.strftime("%d %B %G", strtotime($cours->date)).' '.$cours->horaire.' '.$cours->libelle_cours.'</h3><br />'; if($cours->libelle_cours==""){echo "pas de cours";}} ?></div>
                <div class="pdf"><p><h4>Liste des pdf du cours</h4> <?php foreach($niveau1 as $niveau){echo '<h4>'.utf8_encode($niveau->libelle_niveau).'</h4><br />';} ?></p><p> <?php
                    foreach($telechargement1 as $telechargement){
                    ?>
                    
                        <a href=<?php echo $telechargement->contenu; ?> title="Pdf" target="_blank"><?php echo $telechargement->libelle_telechargement.'<br />'; ?></a>
                        <?php
                    }
                    ?></p>
                </div>
            </div>
            <?php foreach($niveau2 as $niveau){ if($niveau->libelle_niveau!=""){ ?>
            <div class="langue2">
                <div class="horaires"><?php echo '<h2>Prochain cours : '; foreach($niveau2 as $niveau){echo utf8_encode($niveau->libelle_niveau).'</h2><br />';}; foreach($cours2 as $cours){echo '<h3> '.$cours->date.' '.$cours->horaire.' '.$cours->libelle_cours.'</h3><br />'; if($cours->libelle_cours==""){echo "pas de cours";}} ?></div>
                <div class="pdf">
                    <p>Liste des pdf du cours <?php foreach($niveau2 as $niveau){echo utf8_encode($niveau->libelle_niveau).'<br />';} ?></p>
                        <?php
                        foreach($telechargement2 as $telechargement){
                            ?>
                            <a href="<?php echo $telechargement->contenu; ?>" title="Pdf" target="_blank"><?php echo $telechargement->libelle_telechargement.'<br />';?></a>
                       
                   
                </div>
                <?php
                        }
            }else{
                echo '<div class="option">Vous pouvez suivre les cours du deuxième niveau. Si vous êtes intéressé, contactez-nous !<div>';
            }
        }
    
                ?>
            </div>
        </div>
    </div>
</div>
<script>

 

   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'scripts/eleve.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);
   
</script>







    