<?php

if(!count($_GET) > 4){
    die();
}

class User {
    private $username;
    private $mail;
    private $password;
    public $errors;

    public function __construct($newUsername,$newMail,$newPassword){
        $this->setUsername($newUsername);
        $this->setMail($newMail);
        $this->setPassword($newPassword);
        $errors = array();
    }

    public function setUsername($newUsername){
        $controllo = true;

        if(!strlen($newUsername) < 4){
            $this->username = $newUsername;
            $this->errors['username'] = false;
        }else{
            $this->errors['username'] = true;
        }
    }

    public function setMail($newMail){
        $controllo = true;
        if($controllo){
            $this->mail = $newMail;
            $this->errors['mail'] = false;
        }else{
            $this->errors['mail'] = true;
        }
    }

    public function setPassword($newPassword){
        if(!strlen($newPassword) < 6){
            $this->password = $newPassword;
            $this->errors['password'] = false;
        }else{
            $this->errors['password'] = true;
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

class Studente extends User{
    private $matricola;

    public function __construct($newUsername,$newMail,$newPassword, $newMatricola){
        parent::__construct($newUsername,$newMail,$newPassword);
        $this->setMatricola($newMatricola);
    }

    public function setMatricola($newMatricola){
        if(!strlen($newMatricola) < 5){
            $this->matricola = $newMatricola;
            $this->errors['matricola'] = false;
        }else{
            $this->errors['matricola'] = true;
        }
    }
    
    public function getMatricola(){
        return $this->matricola;
    }
}

class Docente extends User{
    private $materia;

    public function __construct($newUsername,$newMail,$newPassword, $newMateria){
        parent::__construct($newUsername,$newMail,$newPassword);
        $this->setMateria($newMateria);
    }

    public function setMateria($newMateria){
        if($newMateria != 0){
            $this->materia = $newMateria;
            $this->errors['materia'] = false;
        }else{
            $this->errors['materia'] = true;
        }
    }
    
    public function getMateria(){
        return $this->materia;
    }
}

if($_GET['user-type'] == 0){
    $user = new Studente($_GET['username'],$_GET['mail'],$_GET['password'],$_GET['matricola']);
    $rel = "matricola";
    $controllo = false;
    foreach($user->errors as $error){
        if($error){
            $errors = $user->errors;
            $controllo = true;
            break;
        }
    }
    if(!$controllo){
       echo json_encode(array('success'=>1,'username'=>$user->getUsername(),'mail'=>$user->getMail(),'password'=>$user->getPassword(), $rel => $user->getMatricola()));
    }else{
       echo json_encode(array('success'=>0,'username'=>$errors['username'],'mail'=>$errors['mail'],'password'=>$errors['password'],$rel => $errors['matricola']));
    }
    }else{
    $user = new Docente($_GET['username'],$_GET['mail'],$_GET['password'],$_GET['materia']);
    $rel = "materia";
    $controllo = false;
    foreach($user->errors as $error){
        if($error){
            $errors = $user->errors;
            $controllo = true;
            break;
        }
    }
    if(!$controllo){
       echo json_encode(array('success'=>1,'username'=>$user->getUsername(),'mail'=>$user->getMail(),'password'=>$user->getPassword(), $rel => $user->getMateria()));
    }else{
        echo json_encode(array('success'=>0,'username'=>$errors['username'],'mail'=>$errors['mail'],'password'=>$errors['password'],$rel => $errors['materia']));
    }
}