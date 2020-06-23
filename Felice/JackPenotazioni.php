<?php
require_once("database.php");

$data = $_POST['datapre'];
$orainizio = $_POST['orainiziopre'];
$oraplus = $_POST['orafinepre'];
$tempofine = date("H:i:s", strtotime($orainizio) + strtotime($oraplus) + 10800);
$socio = $_POST['soci'];
$campo = $_POST['campi'];

$query ="INSERT INTO `ct_prenotazioni`( `data_prenotazione`, `orario_inizio`, `orario_fine`, `id_campo_prenotato`, `id_socio_prenotazione`) 
        VALUES ('$data', '$orainizio', '$tempofine', '$campo', '$socio')";
$result = $db->query($query);
echo json_encode($result);