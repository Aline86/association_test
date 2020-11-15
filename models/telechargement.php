<?php
 require_once 'connection.php';
    ob_start();

  class Telechargement {
    public $id_telechargement;
    public $id_prof;
    public $niveau;
    public $contenu;
    public $libelle_telechargement;
    public function __construct($id_telechargement, $id_prof, $niveau, $contenu, $libelle_telechargement)
    {
      $this->id_telechargement=$id_telechargement;
      $this->id_prof=$id_prof;
      $this->niveau=$niveau;
      $this->contenu=$contenu;
      $this->libelle_telechargement=$libelle_telechargement;
    }
   
    public static function get($id_cours)
    {
        
       
        $db = Db::getInstance();
        $q = $db->query('SELECT id_cours, id_professeur, id_niveau, telechargement, libelle_cours FROM cours WHERE id_cours= '.$id_cours);
    
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Telechargement($donnees['id_cours'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['telechargement'], $donnees['libelle_cours']);
        var_dump($cours);
     
         
    }
    public static function get_telechargement($id_telechargement)
    {
        
       
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM telechargement WHERE id_telecharment= '.$id_telechargement);
    
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Telechargement($donnees['id_telecharment'], $donnees['id_prof'], $donnees['niveau'], $donnees['contenu'], $donnees['libelle_telechargement']);
        var_dump($cours);
     
         
    }
    public static function add(Telechargement $cours)
    {   
        
       
        $db = Db::getInstance();
        
        $qe = $db->prepare('INSERT INTO telechargement(id_prof, niveau, contenu, libelle_telechargement) VALUES(:id_prof, :niveau, :contenu, :libelle)');

        $qe->bindValue(':niveau', $cours->niveau);
        $qe->bindValue(':id_prof', $cours->id_prof);
        $qe->bindValue(':contenu', $cours->contenu);
        $qe->bindValue(':libelle', $cours->libelle_telechargement);
        $qe->execute(); 
    }
    public static function check_telechargement($cours){
       
        $db = Db::getInstance();
        $q = $db->prepare('SELECT * FROM telechargement WHERE libelle_telechargement= "'.$cours->libelle_telechargement.'"');
        $q->execute();
        $count=$q->rowcount();
        if($count>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $db->exec('DELETE FROM telechargement WHERE id_telecharment = '.$id);
    }
    

    public static function getTelechargement($level)
    {
     
        $db = Db::getInstance();
        
     
        $q = $db->query('SELECT * FROM telechargement WHERE niveau="'.$level.'"');
        $telechargement=[];
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $telechargement[] = new Telechargement($donnees['id_telecharment'], $donnees['id_prof'], $donnees['niveau'], $donnees['contenu'], $donnees['libelle_telechargement']);
     
        }

        return $telechargement;
     
    }
    public static function update(Telechargement $telechargement){
        $db = Db::getInstance();

        $requete='UPDATE telechargement SET  contenu="'.$telechargement->contenu.'", libelle_telechargement="'.$telechargement->libelle_telechargement.'" WHERE libelle_telechargement="'.$telechargement->libelle_telechargement.'"';
        $query=$db->query($requete);
    }
    public static function update_telechargement($libelle, $id, $telechargement){
        $db = Db::getInstance();

        $requete='UPDATE telechargement SET  contenu="'.$telechargement.'", libelle_telechargement="'.$libelle.'" WHERE id_telecharment="'.$id.'"';
        $query=$db->query($requete);
    }
    
}  
?>
