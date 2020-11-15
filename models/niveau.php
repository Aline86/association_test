<?php
class Niveau{
    public $id_niveau;
    public $libelle_niveau;
    private function __construct($id_niveau, $libelle_niveau)
    {
      $this->id_niveau=$id_niveau;
      $this->libelle_niveau=$libelle_niveau;
    }

    public static function listeNiveau(){
        $niveaux = [];
        $db = Db::getInstance();       
        $q = $db->query('SELECT * FROM niveau ORDER BY id_niveau ASC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
           
        $niveaux[] = new Niveau($donnees['id_niveau'], $donnees['libelle_niveau']);
 
        }
        return $niveaux;
      
    }
    public static function libelle_niveau($idniveau){
      $niveaux = [];
      $db = Db::getInstance();       
      $q = $db->query('SELECT * FROM niveau WHERE id_niveau="'.$idniveau.'"');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
         
      $niveau[] = new Niveau($donnees['id_niveau'], $donnees['libelle_niveau']);

      }
      return $niveau;
    
  }
     
}