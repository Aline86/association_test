<?php require 'header.php'; ob_start() ?>



<div class="container">
   <div id="calendar" class="calendar"></div>
   <br />
   <br />
  <form method="POST" action="index.php?controller=professeur&action=levelAndProfSelect">
      <select name="prof" id="prof"  onchange="sessionStorage.message1=this.value">
         <option value="">Sélection prof</option>
         
      <?php
      var_dump($professeurs);
      foreach($professeurs AS $professeur){
      ?>  
         <option value="<?php echo $professeur->id_professeur; ?>"><?php echo $professeur->nom.' '.$professeur->prenom; ?></option>    
      <?php
      }
      ?>
         </select>
         <select name="level" id="level"  onchange="sessionStorage.message2=this.value">
            <option value="">Sélection niveau</option>          
         <?php
         foreach($niveaux AS $niveau){
         ?>  
            <option value="<?php echo $niveau->id_niveau; ?>"><?php echo utf8_encode($niveau->libelle_niveau); ?></option>     
         <?php
         }
         ?>
            </select>
            <input type="submit" id="refresh" value="Supprimer les ancien cours" />
            <input type="submit" />
      </form>
   <?php
      $var="";
      ?>
      <table class="table">
        
         <tbody>
      <tr>
      <?php
      if(isset($cours_du_prof)){
         ?>
         <div class="ajout">
         <a href="index.php?controller=cours&action=ajouter">Ajouter un cours</a>
         </div>
         <br />
         <?php
         foreach($cours_du_prof AS $lescours){
            echo '<tr><th scope="col">'.$lescours->libelle_cours.'</th><th><a href="'.$lescours->telechargement.'" title="Pdf" target="_blank"> Télécharger le pdf (.pdf) /</a></th><th scope="col"> <a href="index.php?controller=telechargement&action=ajout_telechargement&id_cours='.$lescours->id_cours.'&level='.$lescours->id_niveau.'">Mettre le téléchargement à disposition des élèves</a></th><th scope="col"><a href="index.php?controller=cours&action=modifier&id='.$lescours->id_cours.'"><i class="fas fa-pencil-alt"></i></a></th><th scope="col"><a href="index.php?controller=cours&action=supprimer&id='.$lescours->id_cours.'&prof='.$lescours->id_professeur.'"><i class="fas fa-minus-circle"></i></a></th></tr><br />';
           
         }
       
         foreach($date_cours_du_prof AS $lescours){
            ?>
            <input type="hidden" id="var" value="<?php $var.= $lescours->date.' '; ?>" />
            <?php
         }
         ?>
         
         <?php
      }elseif(isset($cours_level)){
         foreach($cours_level AS $lescours){
            echo '<tr><th scope="col">'.$lescours->libelle_cours.'<th><a href="'.$lescours->telechargement.'" title="Pdf" target="_blank"> Télécharger le pdf (.pdf) </a></th scope="col"><th><a href="index.php?controller=telechargement&action=ajout_telechargement&id_cours='.$lescours->id_cours.'">Mettre le téléchargement à disposition des élèves</a></th><th scope="col"><a href="index.php?controller=cours&action=modifier&id='.$lescours->id_cours.'"><i class="fas fa-pencil-alt"></i></a></th><th><a href="index.php?controller=cours&action=supprimer&id='.$lescours->id_cours.'&prof='.$lescours->id_professeur.'"><i class="fas fa-minus-circle"></i></a></th></tr><br />';
            
         }
         if(isset($telechargements)){
            foreach($telechargements as $telechargement){
               echo '<tr><th scope="col-3">anciens telechargements : '.$telechargement->libelle_telechargement.'</th><th scope="col-3"><a href="'.$telechargement->contenu.'" title="Pdf" target="_blank"> Télécharger le pdf (.pdf) </a></th><th scope="col-3"><a href="index.php?controller=telechargement&action=modifier&id='.$telechargement->id_telechargement.'"><i class="fas fa-pencil-alt"></i></a></th><th scope="col-3"><a href="index.php?controller=telechargement&action=supprimer&id='.$telechargement->id_telechargement.'&level='.$telechargement->niveau.'"><i class="fas fa-minus-circle"></i></a></th></tr><br />';

            }
         }
         foreach($date_cours_level AS $lescours){
            ?>
            <input type="hidden" id="var" value="<?php $var.= $lescours->date.' '; ?>" />
            <?php
         }
        
         ?>
         <div class="ajout">
         <a href="index.php?controller=cours&action=ajouter">Ajouter un cours</a>
         </div>
         <br />
         
         <?php
        
       
      }elseif(isset($cours)){
         foreach($cours AS $lescours){
            echo '<tr><th scope="col">'.$lescours->libelle_cours.'</th scope="col"></th scope="col"><th><a href="'.$lescours->telechargement.'" title="Pdf" target="_blank">Télécharger le pdf (.pdf)</a></th></tr><br />';
           
         }
         foreach($date_cours AS $lescours){
            ?>
            <input type="hidden" id="var" value="<?php $var.= $lescours->date.' '; ?>" />
            <?php
         }
       
      }elseif(isset($cours_prof_niveau)){
         foreach($cours_prof_niveau AS $lescours){
            echo '<tr><th>'.$lescours->libelle_cours.'</th><th>'.$lescours->date.'</th scope="col"><th>'.$lescours->horaire.'</th scope="col"><th><a href="'.$lescours->telechargement.'" title="Pdf" target="_blank">Télécharger le pdf (.pdf)</a></th></tbody><br />';
           
         }
         foreach($date_cours_level AS $lescours){
            ?>
            <input type="hidden" id="var" value="<?php $var.= $lescours->date.' '; ?>" />
            <?php
         }
       
      }
   ?>
   
   <input type="hidden" id="variable" value="<?php echo $var;?>"/>
   
</div>
<script>

   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'scripts/script.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);
   
</script>
<script>

   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'scripts/refresh.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);
   
</script>