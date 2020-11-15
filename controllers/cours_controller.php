<?php
require_once 'traitementfichier.php';
ob_start();
class CoursController{
    public function frdeb(){
        require_once('views/pages/frdeb.php');
    }
    public function frint(){
        require_once('views/pages/frint.php');
    }
    public function frava(){
        $date_cours_du_prof=Date::getListCoursLevel(6);
        $cours_level=Cours::getListCoursLevel(6);
        require_once('views/pages/frava.php');
    }
    public function itdeb(){
        require_once('views/pages/itdeb.php');
    }
    public function itint(){
        require_once('views/pages/itint.php');
    }
    public function itava(){
        require_once('views/pages/itava.php');
    }
    public function addcourse(){
        require_once('views/pages/add.php');
    }
    public function supprimer(){
 
        $id=isset($_GET['id'])?$_GET['id']:"";
        $prof=isset($_GET['prof'])?$_GET['prof']:"";
        $level=isset($_GET['level'])?$_GET['level']:"";
        if($_SESSION['id']==$prof){
            if($level!=""){
                Cours::delete($id);
                $cours_level=Cours::getListCours($level);
                $niveaux=Niveau::ListeNiveau();
                $professeurs=Professeur::getList();
                $date_cours_du_prof=Date::getListCoursProfDate($prof);
                require_once('views/pages/professeur.php');
            }elseif($prof!=""){
                Cours::delete($id);
                $cours_du_prof=Cours::getListCoursSimple($prof);
                $niveaux=Niveau::ListeNiveau();
                $professeurs=Professeur::getList();
                $date_cours_du_prof=Date::getListCoursProfDate($prof);
                require_once('views/pages/professeur.php');
            }

        }else{
            $cours=Cours::getListCoursSimple($_SESSION['id']);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            $date_cours_du_prof=Date::getListCoursProfDate($prof);
            require_once('views/pages/professeur.php');
        }
    }
    public function modifier(){
        $id=$_GET['id'];
        $cours=Cours::get($id);
        require_once('views/pages/modifier.php');
    }
    public function modifierresult(){
        
        $prof=$_SESSION['id'];
        $libelle=isset($_POST['libelle'])?$_POST['libelle']:"";
        $date=isset($_POST['date'])?$_POST['date']:"";
        echo $telechargement=isset($_FILES['telechargement']['name'])?traitementImage($_FILES['telechargement']['name'], $_FILES['telechargement']['tmp_name'], $_FILES['telechargement']['type']):"";
        $horaire=isset($_POST['horaire'])?$_POST['horaire']:"";
        $id_professeur=isset($_POST['id_professeur'])?$_POST['id_professeur']:"";
        $id_niveau=isset($_POST['id_niveau'])?$_POST['id_niveau']:"";
        $id_cours=isset($_POST['id_cours'])?$_POST['id_cours']:"";
       
            Cours::update($libelle, $date, $telechargement, $horaire, $id_professeur, $id_niveau, $id_cours);
            $cours_du_prof=Cours::getListCoursProf($prof);
            $date_cours_du_prof=Date::getListCoursProfDate($prof);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');
        
            
        }
    public function ajouter(){
        $niveaux=Niveau::ListeNiveau();
        require_once('views/pages/ajouter.php');
    }
    public function ajouterresult(){
        
        $prof=$_SESSION['id'];
        $libelle=isset($_POST['libelle'])?$_POST['libelle']:"";
        $date=isset($_POST['date'])?$_POST['date']:"";
        $telechargement=isset($_FILES['telechargement']['name'])?traitementImage($_FILES['telechargement']['name'], $_FILES['telechargement']['tmp_name'], $_FILES['telechargement']['type']):"";
        $horaire=isset($_POST['horaire'])?$_POST['horaire']:"";
        $id_professeur=$_SESSION['id'];
        $id_niveau=isset($_POST['id_niveau'])?$_POST['id_niveau']:"";
        if($libelle!="" AND $date!="" AND $horaire!="" AND $id_professeur!="" AND $id_niveau!="" ){
            Cours::add($libelle, $date, $telechargement, $horaire, $id_professeur, $id_niveau);
            $cours_du_prof=Cours::getListCoursProf($prof);
            $date_cours_du_prof=Date::getListCoursProfDate($prof);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');
        }
            
    }
}
