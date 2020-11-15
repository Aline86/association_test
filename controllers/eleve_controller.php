<?php 
class Activation{
    private $code;
    public function __construct($code){
        $this->code=$code;
    }
    
    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    public function code_activation(){

        $lecodefinal=md5($this->getCode());
       $code=$this->setCode($lecodefinal);
       return $code;
       
    }
   public function __toString(){
    return $this->getCode();
   }
}

class Mail{
    private $nom;
    private $prenom;
    private $civilite;
    private $mail;
    private $langue_maternelle;
    private $message;
    

    public function __construct($nom, $prenom, $civilite, $mail, $langue_maternelle, $message){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->civilite=$civilite;
        $this->mail=$mail;
        $this->langue_maternelle=$langue_maternelle;
        $this->message=$message;
    }
   
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getCivilite()
    {
        return $this->civilite;
    }
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }
    public function getLangue_maternelle()
    {
        return $this->langue_maternelle;
    }
    public function setLangue_maternelle($langue_maternelle)
    {
        $this->langue_maternelle = $langue_maternelle;

        return $this;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
    public function envoi_mail(){
        $to      = 'ca.haestie@gmail.com';
        $subject = 'nouvel adhérent';
        $message = 'Un nouvel adhérent nous envoie un message :'.$this->getMessage().'Ses coordonées sont les suivantes: nom ->'.$this->getNom().' prenom -> '.$this->getPrenom().' civilite ->'.$this->getCivilite().' mail -> '.strval($this->getMail()).' langue materenelle -> '.$this->getLangue_maternelle();
        $headers = 'From: ca.haestie@gmail.com' . "\r\n" .
        'Reply-To: ca.haestie@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        }
}


class EleveController{
    public function eleve(){
        require_once('views/pages/eleve.php');
    }
    public function contact(){
        require_once('views/pages/contact.php');
    }
    public function eleveinscription(){
        $nom=isset($_POST['nom'])?$_POST['nom']:"";
        $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
        $mail=isset($_POST['mail'])?$_POST['mail']:"";
        $langue=isset($_POST['langue'])?$_POST['langue']:"";
        $message=isset($_POST['message'])?$_POST['message']:"";
        $civilite=isset($_POST['civilite'])?$_POST['civilite']:"";
        $activation=new Activation(strval(time()));
        $activation->code_activation();
        $envoi_mail=new Mail($nom, $prenom, $civilite, $mail, $langue, $message);
        $envoi_mail->envoi_mail();
        Eleve::add($nom, $prenom, $mail, $langue, $message, $civilite, $activation);
        require_once('views/pages/eleve.php');
    }
    public function connexion(){
        $activation=isset($_POST['activation'])?$_POST['activation']:"";
        if($activation!=""){
            $eleve=Eleve::check($activation);
            try {
                $reponse = False;
                if($eleve === $reponse) {
                    throw new Exception('Ce code d\'activation est incorrect !');
                }
            
            }
            catch(Exception $e)
            {
               echo '<script>window.open("views/pages/popup.php?mavar='.$e->getMessage().'", "popup", "width=400, height=200, left=100, top=100, location=no")</script>';
               
            }
            if($eleve===False){
                require_once('views/pages/eleve.php');
            }else{
                require_once('views/pages/activation.php');
            }
        }else{
            $eleve=Eleve::check($activation);
            require_once('views/pages/eleve.php');
        }
    }
    public function login(){
        $email=isset($_POST['email'])?$_POST['email']:"";
        $password=isset($_POST['password'])?$_POST['password']:"";
        
        if($email!="" OR $password!=""){
            if($email!="" AND $password!=""){
                $eleve=Eleve::checklogin($email, $password);
                if($eleve!=FALSE){ 
                    $id_niveau1=$eleve->niveau_1;
                    $id_niveau2=$eleve->niveau_2;
               
                    $_SESSION['id_eleve']=$eleve->id_eleve;
                    $cours1=Cours::get_dernier_cours($id_niveau1);
                    $niveau1=Niveau::libelle_niveau($id_niveau1);
                    $niveau2=Niveau::libelle_niveau($id_niveau2);
                    $cours2=Cours::get_dernier_cours($id_niveau2);
                    $telechargement1=Telechargement::getTelechargement($id_niveau1);
                    $telechargement2=Telechargement::getTelechargement($id_niveau2);
                    require_once('views/pages/student_space.php');
                }else{
                    $erreur=1;
                    require_once('views/pages/index.php');
                } 
            }            
        }else{
            $erreur=2;
            require_once('views/pages/index.php');
        }
    }
    public function inscriptiondef(){
        $email=isset($_POST['email'])?$_POST['email']:"";
        $emailconfirmation=isset($_POST['emailconfirmation'])?$_POST['emailconfirmation']:"";
        $password=isset($_POST['password'])?$_POST['password']:"";
        $passwordconfirmation=isset($_POST['password'])?$_POST['password']:"";
        $id=isset($_POST['id'])?$_POST['id']:"";
        
        if($email!="" OR $emailconfirmation!="" OR $password!="" OR $passwordconfirmation!=""){
            if($email==$emailconfirmation AND $password==$passwordconfirmation){
                Eleve::updatelogin($email, $password, $id);
                $eleve=Eleve::get($id);
                $id_niveau1=$eleve->niveau_1;
                $id_niveau2=$eleve->niveau_2;
                ob_start();
                $_SESSION['id_eleve']=$eleve->id_eleve;
                $cours1=Cours::get_dernier_cours($id_niveau1);
                foreach($cours1 as $cours){
                    if(($cours->date)<date("Y-m-d") ){
                        Cours::delete($cours->id_cours);
                    }
                }
                $niveau1=Niveau::libelle_niveau($id_niveau1);
                $niveau2=Niveau::libelle_niveau($id_niveau2);
                $cours2=Cours::get_dernier_cours($id_niveau2);
                $telechargement1=Telechargement::getTelechargement($id_niveau1);
                $telechargement2=Telechargement::getTelechargement($id_niveau2);
                foreach($cours2 as $cours){
                    if(($cours->date)<date("Y-m-d") ){
                        Cours::delete($cours->id_cours);
                    }
                }
                require_once('views/pages/student_space.php');
            }else{
                $eleve=Eleve::checkid($id);
                $erreur=1;
                require_once('views/pages/activation.php');
            }
            
        }else{
            $eleve=Eleve::checkid($id);
            $erreur=2;
            require_once('views/pages/activation.php');
        }
    }
    public function update_niveau(){
        $id_eleve=isset($_POST['id_eleve'])?$_POST['id_eleve']:"";
        echo $level1=isset($_POST['level1'])?$_POST['level1']:"";
        echo $level2=isset($_POST['level2'])?$_POST['level2']:"";
            ELeve::update_niveau($level1, $level2, $id_eleve);
            $niveaux=Niveau::ListeNiveau();
            $eleves=Eleve::ListeNiveauId($level1);
            require_once('views/pages/admin.php');
    }
    public function show_student_level(){
        $level=isset($_POST['level'])?$_POST['level']:"";
       
        $niveaux=Niveau::ListeNiveau();
    
        $eleves=Eleve::ListeNiveauId($level);
        require_once('views/pages/admin.php');
    }
    public function forget(){
        require_once('views/pages/forget.php');
    }
}