<?php
$databeseconf=[
    "host"=>"localhost",
    "username"=>"root",
    "password"=>"",
    "nome"=>"circolo_tennis",
];
$db=new mysqli($databeseconf["host"],$databeseconf["username"],$databeseconf["password"],$databeseconf["nome"]);

if(!$db){
    echo "Problemi di connessione";
}

?>