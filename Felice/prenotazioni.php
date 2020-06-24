<?php
require_once("database.php");
$prenotazioni="SELECT * FROM `ct_prenotazioni` ORDER BY `data_prenotazione`,`orario_inizio` ";
$results = $db->query($prenotazioni);

$prenotazione = array();
foreach($results as $ris){
    $campi = "SELECT * FROM `ct_campi` WHERE id =".$ris['id_campo_prenotato'];
    $soci="SELECT * FROM `ct_soci` WHERE id =".$ris['id_socio_prenotazione'];
    $resultCampo = $db->query($campi)->fetch_array(MYSQLI_ASSOC);
    $resultSoci = $db->query($soci)->fetch_array(MYSQLI_ASSOC);
    $dataEng = str_replace('/','-',$ris['data_prenotazione']);
    $dataIta = date("d-m-Y", strtotime($dataEng));
    $timeInizio = date("H:i", strtotime($ris['orario_inizio']));
    $timeFine = date("H:i", strtotime($ris['orario_fine']));
    array_push($prenotazione, array(
            'id'=>$ris['id'],
           'nome'=>$resultSoci['nome']." ".$resultSoci['cognome'] ,
           'nome_campo'=>$resultCampo['nome_campo'],
           'tipo_campo'=>$resultCampo['tipo_campo'],
           'data_prenotazione'=>$dataIta,
           'orario_inizio'=>$timeInizio,
           'orario_fine'=>$timeFine
    ));
}
echo json_encode($prenotazione);

