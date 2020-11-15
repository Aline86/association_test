<?php require_once 'header.php';?>
  
<div class="container" >
<?php if($eleves!=FALSE){?>
<table class="table" id="table">
  <thead>
    <tr>
        <th colspan="4"><input id="student_name" type="text" placeholder="Nom élève" value="" /></th>
        <form method="POST" action="index.php?controller=eleve&action=show_student_level">
        
            <th colspan="4">
                <select name="level" id="level" name="level">
                    <option value="">Sélection niveau</option>          
                    <?php
                    foreach($niveaux AS $niveau){
                    ?>  
                        <option value="<?php echo $niveau->id_niveau; ?>"><?php echo $niveau->libelle_niveau; ?></option>     
                    <?php
                    }
                    ?>
                </select>  
            </th>
                        
      <th colspan="2"><input type="submit" /></th>
 
    </form>
        <th colspan="2"><=Filtres</th>
    </tr>
  </thead>
    
  <tbody>

  <?php foreach($eleves as $eleve){
     
      ?>
      
    <tr>
      <td colspan="4"><div class="student" value="<?php echo $eleve->nom_eleve; ?>" ><?php echo $eleve->nom_eleve; ?></div></td>
      <td colspan="4"> 
            <form method="POST" action="index.php?controller=eleve&action=update_niveau">
              <input type="hidden" class="id" name="id_eleve" value="<?php echo $eleve->id_eleve; ?>" />
              <select name="level1" >
              <option id="niveau" class="niveau1" value="<?php echo $eleve->niveau_1 ?> "selected='selected'></option>          
                  <?php
                  foreach($niveaux AS $niveau){
                  ?>  
                      <option class="choix1" value="<?php echo $niveau->id_niveau; ?>"><?php echo utf8_encode($niveau->libelle_niveau); ?></option>     
                  <?php
                  }
                  ?>
              </select>
              <select name="level2" id="level" >
              <?php 
                  ?>
                  <option id="niveau" class="niveau2" value="<?php echo $eleve->niveau_2 ?> "selected='selected'></option>          
                  <?php
                  foreach($niveaux AS $niveau){
                  ?>  
                      <option  value="<?php echo $niveau->id_niveau; ?>"><?php echo utf8_encode($niveau->libelle_niveau); ?></option>     
                  <?php
                  }
                  ?>
              </select>
              <input type="submit" value="valider" />
            </form>
              
      </td>
     
      <td colspan="1"><form><input class="plus" type="submit"  value="+1"/><input type="hidden" value="<?php echo $eleve->id_eleve; ?>" /></form></td>
      <td colspan="1"><form><input class="moins" type="submit" value="-1"/><input type="hidden" value="<?php echo $eleve->id_eleve; ?>" /></form></td>
      <td colspan="2"><span class="reste">cours restants</span><input class="id" type="hidden" value="<?php echo $eleve->id_eleve; ?>"/></td>
    </tr>
   
    <?php
  }

  ?>
  <tr>
   
  </tbody >
  </tr>
</table>
<?php } else{
    echo "Il n'y a pas d'élève";
    ?>
    <form method="POST" action="index.php?controller=admin&action=connected">
        <input type="submit" value="réinitialiaser" />
    </form>
    <?php
}
?>
</div>
<script>
   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'scripts/autocompletion.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);
</script>
<script>
   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'scripts/niveau.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);  
</script>
<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>