<?php require_once 'header.php'; ?>
<form method="POST" enctype="multipart/form-data" action="index.php?controller=telechargement&action=modifierresult">
<div class="container">
<?php

?>
<input type="hidden" name="id_telechargement" value="<?php echo $id; ?>" />
<input type="hidden" name="niveau" value="<?php echo $telechargement->niveau; ?>" />
<input type="text" name="libelle" value="<?php echo $telechargement->libelle_telechargement; ?>" />
<br />
<input type="file" name="telechargement" value="<?php echo $telechargement->contenu; ?>" />
<br />
<input type="submit" />
<?php

?>
</form>
</div>
