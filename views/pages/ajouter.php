<?php require_once 'header.php'; ?>
<form method="POST" enctype="multipart/form-data" action="index.php?controller=cours&action=ajouterresult">
<div class="container">
<?php

?>
<input type="text" name="libelle" placeholder="libelle" />
<br />
<input type="date" name="date" placeholder="date" />
<br />
<input type="file" name="telechargement" placeholder="telechargement" />
<br />
<input type="text" name="horaire" placeholder="horaire" />
<br />
<select name="id_niveau" id="level">
    <option value="">Sélection niveau</option>          
    <?php
    foreach($niveaux AS $niveau){
    ?>  
    <option value="<?php echo $niveau->id_niveau; ?>"><?php echo $niveau->libelle_niveau; ?></option>     
    <?php
    }
    ?>
</select>
<br />
<input type="submit" />
<?php

?>
</form>
</div>