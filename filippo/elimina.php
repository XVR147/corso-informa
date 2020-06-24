<?php
include_once("database.php");
if (isset($_POST)){
    $id = $_POST['id'];
    $delete = "UPDATE ct_soci SET stato = 0 WHERE id = $id";
    $result = $db->query($delete);
    if ($result){
        $messaggio = ["risultato"=>1,"id"=>$id];
        echo json_encode($messaggio);
    }else{
        $messaggio = ["risultato"=>0];
        echo json_encode($messaggio);
    }
}