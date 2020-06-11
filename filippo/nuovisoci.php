<?php
include("database.php");
if(isset($_POST)){
 $nomeNewSocio=$_POST["name"];
 $cognomeNewSocio=$_POST["surname"];
 $codicefiscNewSocio=$_POST["codice"];
 $datanascitaNewSocio=$_POST["birthday"];
 
 $query="INSERT INTO `ct_soci`(`nome`, `cognome`, `data_nascita`, `codice_fiscale`) VALUES (?,?,?,?)";
 
 if($stmt=$db->prepare($query)){
    $stmt->bind_param("ssss",$nomeNewSocio,$cognomeNewSocio,$datanascitaNewSocio,$codicefiscNewSocio);
        if($stmt->execute()){
             header("location:index.php?success");
        }else{
            header("location:index.php?error");
        }
 }

}





?>