<?php
echo json_encode($_POST);
$time = "13:00";
    $periodo = 3;

    $timeFin = (int) $time;

    echo $timeFin;

    $timeFin = $timeFin + $periodo;

    $timeFin = (string) $timeFin.":00";

    echo $timeFin;

    $query = "SELECT id_campi FROM prenotazioni WHERE NOT (data_inizio BETWEEN $time AND $timeFin)";




?>