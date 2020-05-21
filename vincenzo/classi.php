<?php

class Registrazione{
    private $nome2;
    private $cognome2;
    private $email2;
    private $password2;
    
        public function setNome($nome){
            if(strlen($nome)==0){
            echo '<span style="color:red;">Compilare il campo Nome</span>';
            }else{
                $nome= filter_var($nome,FILTER_SANITIZE_STRING);
                $this->nome2=$nome;
                echo $this->nome2;
            }
        }
        public function setCognome($cognome){
            if(strlen($cognome)==0){
                echo '<span style="color:red;">Compilare il campo Cognome</span>';
            }else{
                $cognome= filter_var($cognome, FILTER_SANITIZE_STRING);
                $this->cognome2=$cognome;
                echo $this->cognome2;
            }
        }
        public function setEmail($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo '<span style="color:red;">Compilare correttamente il campo Email</span>';
            }elseif(!filter_var($email, FILTER_VALIDATE_DOMAIN)){
                echo '<span style="color:red;">Compilare correttamente il campo Email</span>';
            }
            else{
                $email= filter_var($email, FILTER_SANITIZE_EMAIL);
                $this->email2= $email;
                echo $this->email2;
            }
        }
        public function setPassword($password){
            if(strlen($password)==0){
                echo '<span style="color:red;">Compilare il campo Password</span>';
            }/*elseif(strlen($password)<8){
                echo '<span style="color:red;">La password deve essere formata da almeno 8 caratteri </span>';
            }*/elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)){
                echo '<span style="color:red;">La password deve avere almeno una lettera minuscola, una lettera maiuscola, un numero, un carattere speciale ed essere compresa fra 8 e 20 caratteri</span>';
            }
            else{
                $password= filter_var($password,FILTER_SANITIZE_STRING);
                $this->password2=$password;
                $this->password2=sha1($this->password2);
                echo $this->password2;
            }
        }
};
/*class Auto{
   public $colore= 'rosso';
   protected $alimentazione= 'gpl';
   function __construct($col_person)
   {
       $this->colore= $col_person;      
   }
   public function setAlim($nuova_alim){
       
       $this->alimentazione= $nuova_alim;
    
   }
   public function getAlim(){
       return $this->alimentazione;
   }
};

$var= new Auto('verde');
 


$var->setAlim('benzina');
$var->getAlim();
//print_r($var);
echo $var->getAlim();*/
     



?>


