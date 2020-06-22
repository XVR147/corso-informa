<?php
	require_once("database.php");



	$data = $_POST['data'];

	$tempo = $_POST['orariinizio'];

    $periodo = $_POST['orariprenotazioni'];

    $tempo = date('H:i:s', strtotime($tempo));

    $time = new DateTime($tempo);

	$time->add(new DateInterval("PT{$periodo}H"));

	$newTime = $time->format('H:i:s');


    $query = "SELECT * FROM `ct_prenotazioni` WHERE `data_prenotazione` = '$data' AND NOT ((`orario_fine` <= '$tempo') OR ( `orario_inizio` >= '$newTime'))";

   	$prenota = $db->query($query);

   	$notex = "SELECT * FROM `ct_campi`";

   	$risul = $db->query($notex);

   	$campo = array();

   	foreach ($risul as $ri) {
   		array_push($campo, array(
   			"id"=>$ri['id'],
   			"nome"=>$ri['nome_campo']));
   	}

    foreach ($prenota as $pr) {

    	array_splice($campo, $pr['id_campo_prenotato'], -1);
    	 
    }

print_r($campo);




?>