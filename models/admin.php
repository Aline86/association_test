<?php
 require_once 'connection.php';

class Admin{
    private $id_admin;
    private $login_admin;
    private $password_admin;

    public function __construct($id_admin, $login_admin, $password_admin){
        $this->id_admin=$id_admin;
        $this->login_admin=$login_admin;
        $this->password_admin=$password_admin;
    }

    public static function check($login, $password){
        $db = Db::getInstance();
        $q = $db->query('SELECT * FROM admin WHERE login_admin="'.$login.'" AND password_admin="'.$password.'"');
     
        $count=$q->rowCount();
        if($count==1){
            return $admin=TRUE;
        }else{
            return $admin=FALSE;
        }
    }
}