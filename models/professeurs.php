<?php
 require_once 'connection.php';

  class Professeur {
    public $id_professeur;
    public $nom;
    public $prenom;
    public $matiere;
    public $login;
    public $password;
    public function __construct($id_professeur, $nom, $prenom, $matiere, $login, $password)
    {
      $this->id_professeur=$id_professeur;
      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->matiere=$matiere;
      $this->login=$login;
      $this->password=$password;
    }
    public static function add($nom, $prenom, $matiere, $login, $password)
    {
        require_once 'connection.php';
        $db = Db::getInstance();
        $q = $db->prepare('INSERT INTO professeur(nom, prenom, matiere, login, password) VALUES(:nom, :prenom, :matiere, :login, :password)');

        $q->bindValue(':nom', $nom);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':matiere', $matiere);
        $q->bindValue(':login', $login);
        $q->bindValue(':password', $password);
        $q->execute();   
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $db->exec('DELETE FROM professeur WHERE id_professeur = '.$id);
    }
    public static function get($id)
    {
        $id = (int) $id;
        $post=[];
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM professeur WHERE id_professeur= '.$id);
    
        $donnees = $q->fetch(PDO::FETCH_ASSOC);


        return new Professeur($donnees['id_professeur'], $donnees['nom'],  $donnees['prenom'], $donnees['matiere'], $donnees['login'], $donnees['password']);
    }

    public static function getList()
    {   
        $professeurs = [];
        $db = Db::getInstance();
  
        $q = $db->query('SELECT * FROM professeur');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
        $professeurs[] = new Professeur($donnees['id_professeur'], $donnees['nom'],  $donnees['prenom'], $donnees['matiere'], $donnees['login'], $donnees['password']);
      
        }
       
        return $professeurs;
       
    }
    public static function update($nom, $prenom, $matiere, $login, $password)
    { 
        $db = Db::getInstance();

        $requete='UPDATE cours SET nom="'.$nom.'", prenom="'.$prenom.'", matiere="'.$matiere.'", login="'.$login.'", password="'.$password.'" WHERE id_professeur="'.$id.'"';
        $query=$db->query($requete);
    
        if($query===TRUE){
        echo 'ok';
        }else{
        echo 'nok';
        }
    }
    public static function profverif($login, $password){
        $db = Db::getInstance();
        $requete="SELECT * FROM professeur WHERE login='".$login."'AND password='".$password."'";
        $reponse = $db->query($requete);
        $count = $reponse->rowCount();
        return $count;
    }
    public static function checkId($login, $password){
 
        $db = Db::getInstance();
        $requete="SELECT id_professeur FROM professeur WHERE login='".$login."'AND password='".$password."'";
        $reponse = $db->query($requete);
        $donnees = $reponse->fetch(PDO::FETCH_ASSOC);
        return $donnees['id_professeur'];
      }
}  
?>