<?php
include_once("database.php");
if(isset($_POST)){
  // echo json_encode($_POST);
  $id=$_POST["id"];
  $nome=$_POST["nome"];
  $cognome=$_POST["cognome"];
  $datanascita=$_POST["datamod"];
  $codice=$_POST["codicemod"];
  $tipoabb=$_POST["tipoabbo"];
  $dataendabbo=$_POST["dataendabb"];
  $messaggio="";
  $update="UPDATE ct_soci SET nome='$nome',cognome='$cognome',data_nascita='$datanascita',codice_fiscale='$codice'  WHERE id='$id';";
  $update.="UPDATE ct_tessera SET scadenza_tessera='$dataendabbo',tipo_abbonamento='$tipoabb' WHERE id_user= '$id'";

  $result=$db->multi_query($update);
    if($result){
      $messaggio=["risultato"=>1,"id"=>$id];  
      echo json_encode($messaggio);
    }else{
      $messaggio=["risultato"=>0];  
      echo json_encode($messaggio);
    }
}
