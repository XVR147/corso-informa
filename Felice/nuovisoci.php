<?php
include("database.php");
include("classitennis.php");
if(isset($_POST)){
 $nomeNewSocio=$_POST["name"];
 $cognomeNewSocio=$_POST["surname"];
 $codicefiscNewSocio=$_POST["codice"];
 $datanascitaNewSocio=$_POST["birthday"];
 $datainizioabb=$_POST["dataStart"];
 $datafineabb=$_POST["dataend"];
 $tipoabbonamento=$_POST["tipiabb"];
 $card=new soci($db);

 $query="INSERT INTO `ct_soci`(`nome`, `cognome`, `data_nascita`, `codice_fiscale`) VALUES (?,?,?,?)";
 $query2="INSERT INTO `ct_tessera`(`data_rilascio_tessera`, `scadenza_tessera`, `codice_tessera`, `id_user`, `tipo_abbonamento`) VALUES (?,?,?,?,?)";


 if($stmt=$db->prepare($query)){
     $stmt->bind_param("ssss",$nomeNewSocio,$cognomeNewSocio,$datanascitaNewSocio,$codicefiscNewSocio);
     if($stmt->execute()){
         $last_id = $db->insert_id;
         $tessera=$card->getCard($last_id);
      if($stmt=$db->prepare($query2)){
          $stmt->bind_param("sssss",$datainizioabb,$datafineabb,$tessera,$last_id,$tipoabbonamento);
          if($stmt->execute()){
            header("location:index.php?success"); 
          }else{
            header("location:index.php?error");
          }
      }
        }else{
            header("location:index.php?error");
        }
        }
    }





?>