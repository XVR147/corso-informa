<?php
require_once("database.php");
$prenotazioni = "SELECT * FROM `ct_prenotazioni`";
$result = $db->query($prenotazioni);
// print_r(json_encode($result));

$prenotazione = array();
foreach($result as $ris){
    // print_r($ris);
    $campi = "SELECT * FROM `ct_campi` WHERE id = ".$ris['id_campo_prenotato'];
    $soci = "SELECT * FROM `ct_soci` WHERE id = ".$ris['id_socio_prenotazione'];
    $risultato = $db->query($campi)->fetch_array(MYSQLI_ASSOC);
    $risultato2 = $db->query($soci)->fetch_array(MYSQLI_ASSOC);
    $var = $ris['data_prenotazione'];
    $date = str_replace('-', '/', $var);
    $dataita = date('d-m-Y  H:i', strtotime($date));
    array_push($prenotazione, array(
        'id' => $ris['id'],
        'nome_campo' => $risultato['nome_campo'],
        'tipo_campo' => $risultato['tipo_campo'],
        'nome_socio' => $risultato2['nome']." ".$risultato2['cognome'],
        'data_prenotazione' => $dataita
    ));
}
/* foreach($prenotazione as $prenot){
    print_r($prenot);
} */
echo json_encode($prenotazione);



?> 