<?php
include("database.php");
if(isset($_POST)){
    $soci=$_POST["soci"];
    $campi=$_POST["campi"];
    $dataPrenotazione=$_POST["datapre"];
    $orarioInizio=date("H:i",strtotime($_POST["orainiziopre"]));
    $orarioFine=date("H:i",strtotime($_POST["orafinepre"]));
    $query="INSERT INTO `ct_prenotazioni`( `data_prenotazione`,`orario_inizio`,`orario_fine`, `id_campo_prenotato`, `id_socio_prenotazione`) VALUES ('$dataPrenotazione','$orarioInizio','$orarioFine','$campi','$soci')";
    $result = $db->query($query);
    echo $result;
     if($result){
                header("location:index.php?successPre");
     }else{
                header("location:index.php?error");
     }
    
   
}