
<?php require 'header.php'; ob_start() ?>

<div class="container">
   <div id="calendar" class="calendar"></div>
</div>
<?php
    $var="";
foreach($cours_level AS $lescours){
?>
<input type="hidden" id="var" value="<?php $var.= $lescours->date.' '; ?>" />
<?php
}
?>
   <input type="hidden" id="variable" value="<?php echo $var;?>"/>
<script>

   var js = document.createElement('script');
   js.type = 'text/javascript';
   js.src = 'scripts/tooltip.js' ;
   //Ajout de la balise dans la page
   document.body.appendChild(js);
   
</script>