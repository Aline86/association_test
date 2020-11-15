<?php
 require_once 'connection.php';
    session_start();

  class Cours {
    public $id_cours;
    public $libelle_cours;
    public $date;
    public $telechargement;
    public $horaire;
    public $id_professeur;
    public $id_niveau;
    public $visible;
    public function __construct($id_cours, $libelle_cours, $date, $telechargement, $horaire, $id_professeur, $id_niveau, $visible)
    {
      $this->id_cours=$id_cours;
      $this->libelle_cours=$libelle_cours;
      $this->date=$date;
      $this->telechargement=$telechargement;
      $this->horaire=$horaire;
      $this->id_professeur=$id_professeur;
      $this->id_niveau=$id_niveau;
      $this->visible=$visible;
    }
   
    public static function add($libelle_cours, $date, $telechargement, $horaire, $id_professeur, $id_niveau)
    {
        require_once 'connection.php';
        $db = Db::getInstance();
        $q = $db->prepare('INSERT INTO cours(libelle_cours, date, telechargement, horaire, id_professeur, id_niveau, visible) VALUES(:libelle_cours, :date, :telechargement, :horaire, :id_professeur, :id_niveau, :visible)');

        $q->bindValue(':libelle_cours', $libelle_cours);
        $q->bindValue(':date', $date);
        $q->bindValue(':telechargement', $telechargement);
        $q->bindValue(':horaire', $horaire);
        $q->bindValue(':id_professeur', $id_professeur);
        $q->bindValue(':id_niveau', $id_niveau);
        $q->bindValue(':visible', 1);
        $q->execute();   
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $db->exec('DELETE FROM cours WHERE id_cours = '.$id);
    }
    public static function get($id)
    {
        $id = (int) $id;
        $post=[];
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM cours WHERE id_cours= '.$id);
    
        $donnees = $q->fetch(PDO::FETCH_ASSOC);


        return new Cours($donnees['id_cours'], $donnees['libelle_cours'],  $donnees['date'], $donnees['telechargement'], $donnees['horaire'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['visible']);
    }

    public static function getListCours($level, $prof)
    {
        $cours = [];
        $db = Db::getInstance();
        
       
        $q = $db->query('SELECT * FROM cours WHERE id_niveau="'.$level.'" AND id_professeur="'.$prof.'"');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $cours[] = new Cours($donnees['id_cours'], $donnees['libelle_cours'],  $donnees['date'], $donnees['telechargement'], $donnees['horaire'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['visible']);
     
        }

        return $cours;
     
    }
    public static function getListCoursLevel($level)
    {
        $cours = [];
        $db = Db::getInstance();
        
       
        $q = $db->query('SELECT * FROM cours WHERE id_niveau="'.$level.'"');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $cours[] = new Cours($donnees['id_cours'], $donnees['libelle_cours'],  $donnees['date'], $donnees['telechargement'], $donnees['horaire'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['visible']);
     
        }

        return $cours;
     
    }
    public static function getListCoursProf($prof)
    {
   
        $cours = [];
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM cours WHERE id_professeur="'.$prof.'"');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $cours[] = new Cours($donnees['id_cours'], $donnees['libelle_cours'],  $donnees['date'], $donnees['telechargement'], $donnees['horaire'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['visible']);
     
        }

        return $cours;
     
    }
    
        public static function getListCoursSimple(){
            
           
            $cours = [];
            $db = Db::getInstance();
            $id=$_SESSION['id'];
            $q = $db->query('SELECT * FROM cours');

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
            $cours[] = new Cours($donnees['id_cours'], $donnees['libelle_cours'],  $donnees['date'], $donnees['telechargement'], $donnees['horaire'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['visible']);
            
            }

            return $cours;
        }
    public static function update($libelle_cours, $date, $telechargement, $horaire, $id_professeur, $id_niveau, $id_cours)
    { 
        $db = Db::getInstance();

        $requete='UPDATE cours SET libelle_cours="'.$libelle_cours.'", date="'.$date.'", telechargement="'.$telechargement.'", horaire="'.$horaire.'", id_professeur="'.$id_professeur.'", id_niveau="'.$id_niveau.'" WHERE id_cours="'.$id_cours.'"';
        $query=$db->query($requete);
    
    }

    public static function get_dernier_cours($id){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM cours WHERE id_niveau= "'.$id.'"  ORDER BY date ASC');
    
        $cours=[];
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){

            $cours[] =  new Cours($donnees['id_cours'], $donnees['libelle_cours'],  $donnees['date'], $donnees['telechargement'], $donnees['horaire'], $donnees['id_professeur'], $donnees['id_niveau'], $donnees['visible']);
        }
        return $cours;
    }
  
}  
?>