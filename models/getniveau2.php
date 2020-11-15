<?php try
    {
        $db = new PDO("mysql:host=localhost;dbname=association2;charset=utf8", "root", "", 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die("Erreur : " . $e->getMessage());
    }
    $niveau2=isset($_GET['option2'])?$_GET['option2']:"";
    $reponse = $db->query('SELECT libelle_niveau FROM niveau INNER JOIN eleve ON niveau.id_niveau=eleve.niveau_2 WHERE eleve.niveau_2="'.$niveau2.'"');
            
    $donnees=$reponse->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($donnees);