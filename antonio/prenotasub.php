<?php
require_once("database.php");

if(isset($_POST)){
	$soci = $_POST['soci'];
	$campi = $_POST['campi'];
	$dataPre = $_POST['prenota'];
	//$dataPre = date('F d, Y h:mA', strtotime($dataPre));

	print_r($_POST);
	
	$query="INSERT INTO `ct_prenotazioni`(`data_prenotazione`, `id_campo_prenotato`, `id_socio_prenotazione`) VALUES ('$dataPre', '$campi', '$soci')";

	$invio = $db->query($query);

	if($invio = 1){
             header("location:index.php?successPre=true");
        }else{
            header("location:index.php?errorPre");
        }
}
	


?>