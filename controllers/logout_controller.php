<?php

class DeconnectionController{
    public function deconnection(){
        session_start();
       unset($_SESSION['id']);
       unset($_SESSION['id_eleve']);
       header('Location: index.php?controller=pages&action=home');
    }
}