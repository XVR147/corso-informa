<?php
   require_once("database.php");
   
   $data = $_POST['datapre'];
   $orainizio = $_POST['orainiziopre'];
   $oraplus = $_POST['orafinepre'];
   json_encode($_POST);
   $tempofine = date("H:i:s", strtotime($orainizio) + strtotime($oraplus) + 10800);

   $query = "SELECT * FROM `ct_prenotazioni` WHERE `data_prenotazione` = '$data' AND NOT ((`orario_fine` <= '$orainizio') OR (`orario_inizio` >= '$tempofine'))";
   $prenotazioni = $db->query($query);
   

   $notesclusi = "SELECT * FROM `ct_campi`" ;
   $risultati = $db ->query($notesclusi);
   $campi = [];
   foreach($risultati as $risultato){
      array_push($campi, $risultato['id']);
   }
   //print_r($campi);

   $prenCampo = [];
   foreach($prenotazioni as $prenotazione){
     $prenCampo[] = $prenotazione['id_campo_prenotato'];
      //array_splice($campi,$prenotazione['id_campo_prenotato'],1);
   }
   $campi_prenotabili= array_diff($campi,$prenCampo);
   

   $prenCampoPren=[];
   foreach($campi_prenotabili as $campo_prenotabile){
      $queryCampiPren = "SELECT * FROM `ct_campi` WHERE `id`=".$campo_prenotabile."";
      $resultCampiPren = $db->query($queryCampiPren)->fetch_array(MYSQLI_ASSOC);
      $prenCampoPren[] = $resultCampiPren;
   }
   echo json_encode($prenCampoPren);


 

   // function setDataFine($orario,$tempo){
//         if($tempo==1){
//             $orario= date('H:i',strtotime('+1 hours',$orario));
//         }elseif($tempo==2){
//             $orario= date('H:i',strtotime('+2 hours',$orario));
//         }elseif($tempo==3){
//             $orario= date('H:i',strtotime('+3 hours',$orario));
//         }elseif($tempo==4){
//             $orario= date('H:i',strtotime('+4 hours',$orario));
//         }
//         return $orario;
//     }
// echo setDataFine($inizio,$oraplus);


// $time = "13:00";
//     $periodo = 3;

//     $timeFin = (int) $time;

//     echo $timeFin;

//     $timeFin = $timeFin + $periodo;

//     $timeFin = (string) $timeFin.":00";

//     echo $timeFin;


//CON CLASSE

// $data = $_POST['data'];

// 	$tempo = $_POST['orariinizio'];

//     $periodo = $_POST['orariprenotazioni'];

//     $tempo = date('H:i:s', strtotime($tempo));

//     $time = new DateTime($tempo);

// 	$time->add(new DateInterval("PT{$periodo}H"));

// 	$newTime = $time->format('H:i:s');

