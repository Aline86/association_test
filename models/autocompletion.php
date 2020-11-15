<?php try
    {
        $db = new PDO("mysql:host=localhost;dbname=association2;charset=utf8", "root", "", 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die("Erreur : " . $e->getMessage());
    }
    $nom=isset($_GET['id'])?$_GET['id'].'%':"";
    $sth2 = 'SELECT * FROM eleve WHERE nom_eleve LIKE "'.$nom.'"';
    $reponse = $db->query($sth2);
    
    $donnees=$reponse->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($donnees);