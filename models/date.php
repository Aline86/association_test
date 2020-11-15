<?php
class Date{
    public $date;
    
    public function __construct($date)
    {
      $this->date=$date;
    }
    public static function getListCoursDate($level, $prof)
    {
        $cours = [];
        $db = Db::getInstance();
        
       
        $q = $db->query('SELECT DISTINCT date FROM cours WHERE id_niveau="'.$level.'" AND id_professeur="'.$prof.'"');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $cours[] = new Date($donnees['date']);
     
        }

        return $cours;
     
    }
    public static function getListCoursLevel($level)
    {
        $cours = [];
        $db = Db::getInstance();
        
       
        $q = $db->query('SELECT DISTINCT date FROM cours WHERE id_niveau="'.$level.'"');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $cours[] = new Date($donnees['date']);
     
        }

        return $cours;
     
    }
    public static function getListCoursProfDate($prof)
    {
   
        $cours = [];
        $db = Db::getInstance();
        $q = $db->query('SELECT DISTINCT date FROM cours WHERE id_professeur="'.$prof.'"');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $cours[] = new Date( $donnees['date']);
     
        }

        return $cours;
     
    }
        public static function getListCoursSimpleDate(){
            
           
            $cours = [];
            $db = Db::getInstance();
            $id=$_SESSION['id'];
            $q = $db->query('SELECT DISTINCT date FROM cours');

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
            $cours[] = new Date($donnees['date']);
            
            }

            return $cours;
        }
}