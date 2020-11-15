<?php require '../connection.php';
class NbCours{
    private $nb_cours=0;
    public function __construct(){
        $this->nb_cours;  
    }
    public function getNb_cours()
    {
        return $this->nb_cours;
    }
    public function setNb_cours($nb_cours)
    {
        $this->nb_cours = $nb_cours;

        return $this;
    }
    public function cours_en_moins(){
        $cours=$this->getNb_cours()-1;
        $this->setNb_cours($cours);
    }
    public function cours_en_plus(){
        $cours=$this->getNb_cours()+1;
        $this->setNb_cours($cours);
    }
    public function cours($id){
        $db = Db::getInstance(); 
        $q = $db->query('SELECT nb_cours FROM eleve WHERE id_eleve="'.$id.'"');
        
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
            return $this->setNb_cours($donnees['nb_cours']);
            }
        }
    public function info(){
        return $this->getNb_cours();
        }
}
$id=isset($_GET['id'])?$_GET['id']:"";
$plus=isset($_GET['plus'])?$_GET['plus']:"";
$moins=isset($_GET['moins'])?$_GET['moins']:"";
if($moins!=""){
    $db = Db::getInstance();
  
    $nb=new NbCours();
    $nb->cours($id);
    $nb->cours_en_moins();
    $nb->info();
$requete='UPDATE eleve SET nb_cours="'.$nb->info().'" WHERE id_eleve="'.$id.'"';
$query=$db->query($requete);
}
if($plus!=""){
    $db = Db::getInstance();
  
    $nb=new NbCours();
    $nb->cours($id);
    $nb->cours_en_plus();
    $nb->info();
$requete='UPDATE eleve SET nb_cours="'.$nb->info().'" WHERE id_eleve="'.$id.'"';
$query=$db->query($requete);
}