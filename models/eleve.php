<?php
 require_once 'connection.php';
  class Eleve {
    public $id_eleve;
    public $nom_eleve;
    public $prenom_eleve;
    public $mail;
    public $password;
    public $langue_maternelle;
    public $message;
    public $niveau_1;
    public $niveau_2;
    public $inscrit;
    public $id_civilite;
    public $code_activation;
    public $nb_cours;
    public function __construct($id_eleve, $nom_eleve, $prenom_eleve, $mail, $password, $langue_maternelle, $message, $niveau_1, $niveau_2, $inscrit, $id_civilite, $code_activation, $nb_cours)
    {
      $this->id_eleve=$id_eleve;
      $this->nom_eleve=$nom_eleve;
      $this->prenom_eleve=$prenom_eleve;
      $this->mail=$mail;
      $this->password=$password;
      $this->langue_maternelle=$langue_maternelle;
      $this->message=$message;
      $this->niveau_1=$niveau_1;
      $this->niveau_2=$niveau_2;
      $this->inscrit=$inscrit;
      $this->id_civilite=$id_civilite;
      $this->code_activation=$code_activation;
      $this->nb_cours=$nb_cours;
    }
    public static function add($nom_eleve, $prenom_eleve, $mail, $langue_maternelle, $message, $id_civilite, $activation)
    {
        require_once 'connection.php';
        $db = Db::getInstance();
        $q = $db->prepare('INSERT INTO eleve(nom_eleve, prenom_eleve, mail, langue_maternelle, message, inscrit, id_civilite, code_activation) VALUES(:nom_eleve, :prenom_eleve, :mail, :langue_maternelle, :message, :inscrit,  :id_civilite, :activation)');

        $q->bindValue(':nom_eleve', $nom_eleve);
        $q->bindValue(':prenom_eleve', $prenom_eleve);
        $q->bindValue(':mail', $mail);
        $q->bindValue(':langue_maternelle', $langue_maternelle);
        $q->bindValue(':message', $message);
        $q->bindValue(':inscrit', 0);
        $q->bindValue(':id_civilite', $id_civilite);
        $q->bindValue(':activation', $activation);
        $q->execute();   
    }
    public static function delete($id)
    {
        $db = Db::getInstance();
        $db->exec('DELETE FROM eleve WHERE id_eleve = '.$id);
    }
    public static function get($id)
    {
        $id = (int) $id;
        $post=[];
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM eleve WHERE id_eleve= '.$id);
    
        $donnees = $q->fetch(PDO::FETCH_ASSOC);


        return new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
    }

    public static function getList()
    {
      
        $db = Db::getInstance();
       
            $q = $db->query('SELECT * FROM eleve');
            $count = $q->rowCount();
                if($count >=1){
                    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                    {
                        $eleves[] = new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
                    
                    }

                return $eleves;
                }else{
                    $eleves=FALSE;
                }
            
    }
    public static function listeNiveauId($level1){
        $niveaux = [];
        $db = Db::getInstance();       
        $q = $db->query('SELECT * FROM eleve WHERE niveau_1="'.$level1.'" OR niveau_2="'.$level1.'"');
        $count=$q->rowCount();
        if($count>=1){
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
            
            $eleves[] = new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
    
            }
            return $eleves;
        }else{
            if($level1==""){
            $q = $db->query('SELECT * FROM eleve');
            $count=$q->rowCount();
            if($count>=1){
                while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                {
                
                $eleves[] = new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
        
                }
                return $eleves;
            }
        }else{
            return $eleve=False;
        }
        }
    }
    public static function update($nom_eleve, $prenom_eleve, $langue_maternelle, $inscrit, $id_civilite)
    { 
        $db = Db::getInstance();

        $requete='UPDATE cours SET nom_eleve="'.$nom_eleve.'", prenom_eleve="'.$prenom_eleve.'", langue_maternelle="'.$langue_maternelle.'", inscrit="'.$inscrit.'", id_civilite="'.$id_civilite.'" WHERE id_eleve="'.$id.'"';
        $query=$db->query($requete);
    
        if($query===TRUE){
        echo 'ok';
        }else{
        echo 'nok';
        }
    
    }
    public static function updatelogin($email, $password, $id)
    { 
        $db = Db::getInstance();
        
        $requete='UPDATE eleve SET mail="'.$email.'", pass="'.$password.'" WHERE id_eleve="'.$id.'"';
        $query=$db->query($requete);
    
    }
    public static function check($activation){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM eleve WHERE code_activation="'.$activation.'"');
     
        $count=$q->rowCount();
        if($count==1){
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $eleve[] = new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
            
            }
            return $eleve;
        }else{
            return $eleve=False;
        }
        
    }
    public static function checkid($id){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM eleve WHERE id_eleve="'.$id.'"');
     
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $eleve[] = new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
            
            }
            return $eleve;
        
    }
  public static function update_niveau($niveau1, $niveau2, $id)
    { 
        $db = Db::getInstance();
        
        $requete='UPDATE eleve SET niveau_1="'.$niveau1.'", niveau_2="'.$niveau2.'" WHERE id_eleve="'.$id.'"';
        $query=$db->query($requete);
    
    }
   
    public function get_niveau_eleve_1($id){
        $db = Db::getInstance();
        $q = $db->query('SELECT libelle_niveau FROM eleve INNER JOIN niveau ON niveau.id_niveau=eleve.niveau_1 WHERE niveau.id_niveau="'.$id.'"');
     
        $count=$q->rowCount();
        if($count==1){
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $eleve[] = new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
            
            }
            return $eleve;
        }else{
            return $eleve=False;
        }
    }
    public static function checklogin($mail, $password){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM eleve WHERE mail="'.$mail.'" AND pass="'.$password.'"');
        $count=$q->rowcount();
        if($count>0){
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
                {
                 return    new Eleve($donnees['id_eleve'], $donnees['nom_eleve'],  $donnees['prenom_eleve'], $donnees['mail'],  $donnees['pass'], $donnees['langue_maternelle'], $donnees['message'], $donnees['niveau_1'], $donnees['niveau_2'], $donnees['inscrit'], $donnees['id_civilite'], $donnees['code_activation'], $donnees['nb_cours']);
                
                }
                
        }else{
            return FALSE;
        }
    }


}  
