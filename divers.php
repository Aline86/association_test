<?php
session_start();
if(isset($_POST['un_champ_du_formulaire']))
{
$_SESSION['formulaire'] = $_POST;
 
//visualisation pour contrôle durant le développement
echo '<pre>';
print_r($_SESSION['formulaire']);
echo '</pre>';
}