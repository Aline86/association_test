<?php require '../connection.php';

$id=isset($_GET['id'])?$_GET['id']:"";

    $db = Db::getInstance(); 
    $q = $db->query('SELECT nb_cours FROM eleve WHERE id_eleve="'.$id.'"');
    
   
    
    $donnees=$q->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($donnees);
    
