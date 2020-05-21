<?php

class User {
    private $username;
    private $mail;
    private $password;
    public $errors = array();

    public function __construct($newUsername,$newMail,$newPassword){
        $this->setUsername($newUsername);
        $this->setMail($newMail);
        $this->setPassword($newPassword);
    }

    public function setUsername($newUsername){
        $controllo = false;
        if($controllo){
            $this->username = $newUsername;
            $this->errors['username'] = true;
        }else{
            // dopo
            $this->errors['username'] = false;
        }
    }

    public function setMail($newMail){
        $controllo = true;
        if($controllo){
            $this->mail = $newMail;
            $this->errors['mail'] = true;
        }else{
            $this->errors['mail'] = false;
        }
    }

    public function setPassword($newPassword){
        $controllo = false;
        if($controllo){
            $this->password = $newPassword;
            $this->errors['password'] = true;
        }else{
            $this->errors['password'] = false;
        }
    }

    public function getUsername(){
        return $this->username;
    }

    public function getMail(){
        return $this->mail;
    }

    public function getPassword(){
        return $this->password;
    }

};

$user = new User($_GET['username'],$_GET['mail'],$_GET['pwd']);

if(empty($user->errors)){
    echo json_encode(array('success'=>1,'username'=>$user->getUsername(),'mail'=>$user->getMail(),'password'=>$user->getPassword()));
}else{
    echo json_encode(array('success'=>0,$user->errors['username'],$user->errors['mail'],$user->errors['password']));
}