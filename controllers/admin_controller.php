<?php

class AdminController{
    public function showAdmin(){
        require_once('views/pages/adminconnexion.php');
          
        } 
    public function adminverif(){
        $login=isset($_POST['login'])?$_POST['login']:"";
        $password=isset($_POST['password'])?$_POST['password']:"";
        if($login!="" AND $password!=""){
            $admin=Admin::check($login, $password);
            if($admin==TRUE){
               
                $niveaux=Niveau::ListeNiveau();
                $eleves=Eleve::getList();

                require_once('views/pages/admin.php');
            }else{
                require_once('views/pages/adminconnexion.php');
            }
        }
    }
    public function connected(){
        $niveaux=Niveau::ListeNiveau();
        $eleves=Eleve::getList();
        require_once('views/pages/admin.php');
    }
   
   
}