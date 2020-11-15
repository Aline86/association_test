<?php try
    {
        $db = new PDO("mysql:host=localhost;dbname=association2;charset=utf8", "root", "", 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die("Erreur : " . $e->getMessage());
    }
    $date=isset($_GET['cours'])?$_GET['cours']:"";
    $sth2 = 'SELECT horaire, date FROM cours WHERE date = "'.$date.'"';
    $reponse = $db->query($sth2);
    
    $donnees=$reponse->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($donnees);
    
