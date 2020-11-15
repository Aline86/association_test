<?php
require_once 'traitementfichier.php';
ob_start();

class TelechargementController{
    public function ajout_telechargement(){
        $prof=$_SESSION['id'];
        $id_cours=isset($_GET['id_cours'])?$_GET['id_cours']:"";
        $level=isset($_GET['level'])?$_GET['level']:"";
        $cours_a_tel=Telechargement::get($id_cours);
        $telechargement=Telechargement::check_telechargement($cours_a_tel);
        if($telechargement===FALSE){
            Telechargement::add($cours_a_tel);
        }else{
            Telechargement::update($cours_a_tel);
        }        
        $date_cours_level=Date::getListCoursDate($level, $prof);
        $cours_level=Cours::getListCours($level, $prof);
        $niveaux=Niveau::ListeNiveau();
        $professeurs=Professeur::getList();
        require_once('views/pages/professeur.php');
       
    }
    public function supprimer(){
        $id=isset($_GET['id'])?$_GET['id']:"";
        $level=isset($_GET['level'])?$_GET['level']:"";
        $prof=$_SESSION['id'];
        $cours_level=Cours::getListCours($level, $prof);
        $date_cours_level=Date::getListCoursDate($level, $prof);
        $telechargements=Telechargement::getTelechargement($level);
        $niveaux=Niveau::ListeNiveau();
        $professeurs=Professeur::getList();
        $telechargements=Telechargement::delete($id);
        require_once('views/pages/professeur.php');
    }
    public function modifier(){
        $id=isset($_GET['id'])?$_GET['id']:"";
        $telechargement=Telechargement::get_telechargement($id);
        require_once('views/pages/modifier_telechargement.php');
    }
    public function modifierresult(){
        echo $libelle=isset($_POST['libelle'])?$_POST['libelle']:"";
        echo $id=isset($_POST['id_telechargement'])?$_POST['id_telechargement']:"";
        $level=isset($_POST['niveau'])?$_POST['niveau']:"";
        $prof=$_SESSION['id'];
        echo $telechargement=isset($_FILES['telechargement']['name'])?traitementImage($_FILES['telechargement']['name'], $_FILES['telechargement']['tmp_name'], $_FILES['telechargement']['type']):"";
        Telechargement::update_telechargement($libelle, $id, $telechargement);
        $cours_level=Cours::getListCours($level, $prof);
        $date_cours_level=Date::getListCoursDate($level, $prof);
        $telechargements=Telechargement::getTelechargement($level);
        $niveaux=Niveau::ListeNiveau();
        $professeurs=Professeur::getList();
        require_once('views/pages/professeur.php');
    }
}