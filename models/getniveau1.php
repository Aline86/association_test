<?php try
    {
        $db = new PDO("mysql:host=localhost;dbname=association2;charset=utf8", "root", "", 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die("Erreur : " . $e->getMessage());
    }
    $niveau1=isset($_GET['option1'])?$_GET['option1']:"";
    $reponse = $db->query('SELECT libelle_niveau FROM niveau INNER JOIN eleve ON niveau.id_niveau=eleve.niveau_1 WHERE eleve.niveau_1="'.$niveau1.'"');
    
    $donnees=$reponse->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($donnees);
 
    
       
  