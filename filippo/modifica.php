<?php
include_once("database.php");
if(isset($_POST)){
  // echo json_encode($_POST);
  $id=$_POST["id"];
  $nome=$_POST["nome"];
  $cognome=$_POST["cognome"];
  $datanascita=$_POST["datamod"];
  $codice=$_POST["codicemod"];
  $messaggio="";
  $update="UPDATE ct_soci SET nome='$nome',cognome='$cognome',data_nascita='$datanascita',codice_fiscale='$codice' WHERE id='$id'";
  $result=$db->query($update);
  if($result){
    $messaggio=["risultato"=>1,"id"=>$id];  
    echo json_encode($messaggio);
  }else{
    $messaggio=["risultato"=>0]; 
    echo json_encode($messaggio);
  }

}
