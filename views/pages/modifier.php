<?php require_once 'header.php'; ?>
<form method="POST" enctype="multipart/form-data" action="index.php?controller=cours&action=modifierresult">
<div class="container">
<?php

?>
<input type="hidden" name="id_cours" value="<?php echo $cours->id_cours; ?>" />
<input type="text" name="libelle" value="<?php echo $cours->libelle_cours; ?>" />
<br />
<input type="text" name="date" value="<?php echo $cours->date; ?>" />
<br />
<input type="file" name="telechargement" value="<?php echo $cours->telechargement; ?>" />
<br />
<input type="text" name="horaire" value="<?php echo $cours->horaire; ?>" />
<br />
<input type="hidden" name="id_professeur" value="<?php echo $cours->id_professeur; ?>" />
<br />
<input type="text" name="id_niveau" value="<?php echo $cours->id_niveau; ?>" />
<br />
<input type="submit" />
<?php

?>
</form>
</div>