<?php

class ProfesseurController{
    public function professeur() {
        require_once('views/pages/professeur.php');
        }
    public function erreur() {
        require_once('views/pages/connexionproferreur.php');
        }
    public function connexion() {
        require_once('views/pages/connexionprof.php');
        }
    public function levelAndProfSelect(){
        $level=isset($_POST['level'])?$_POST['level']:"";
        $profs=isset($_POST['prof'])?$_POST['prof']:"";
        $prof=$_SESSION['id'];
        if($level=="" AND $profs==""){
            $cours_du_prof=Cours::getListCoursProf($prof);
            $date_cours_du_prof=Date::getListCoursProfDate($prof);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');
        }elseif($level!="" AND $prof==$profs){
            $cours_level=Cours::getListCours($level, $prof);
            $date_cours_level=Date::getListCoursDate($level, $prof);
            $telechargements=Telechargement::getTelechargement($level);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');
        }elseif($level=="" AND $prof==$profs){
            $cours_level=Cours::getListCoursProf($prof);
            $date_cours_level=Date::getListCoursProfDate($prof);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');
        }elseif($level=="" AND $prof!=$profs){
            $cours=Cours::getListCoursProf($profs);
            $date_cours=Date::getListCoursProfDate($profs);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');   
        }elseif($level!="" AND $prof!=$profs){
            $cours=Cours::getListCours($level, $profs);
            $date_cours=Date::getListCoursDate($level, $profs);
            $niveaux=Niveau::ListeNiveau();
            $professeurs=Professeur::getList();
            require_once('views/pages/professeur.php');
        }
    }
    public function connexionverif(){
        $login=isset($_POST['login'])?$_POST['login']:"";
        $password=isset($_POST['password'])?$_POST['password']:"";
        $count=Professeur::profverif($login, $password);
        if($count==1){
    
            $id=Professeur::checkId($login, $password);
            session_start();
            $_SESSION['id']=$id;
            
            header('Location: index.php?controller=professeur&action=levelAndProfSelect');
            
        }else{
            header('Location: index.php?controller=professeur&action=erreur');
        }
    }
 
}
