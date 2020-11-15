<?php try
    {
        $db = new PDO("mysql:host=localhost;dbname=association2;charset=utf8", "root", "", 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die("Erreur : " . $e->getMessage());
    }
    
    $sth2 = 'SELECT * FROM cours';
    $reponse = $db->query($sth2);
    
    $donnees=$reponse->fetchAll(PDO::FETCH_ASSOC);
    foreach($donnees as $cours){
        if(($cours['date'])<date("Y-m-d") ){
            $db->exec('DELETE FROM cours WHERE id_cours = '.$cours['id_cours']);
            continue;
        }
    }
    echo "Les anciens cours ont bien été supprimés";
    