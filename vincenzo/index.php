<?php
if(isset($_POST['controllo'])){
include('classi.php');
$var= new Registrazione();
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$email=$_POST['email'];
$password=$_POST['password'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prova</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="pages/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    </head>
    <body>
        <div id="div1" style="padding-left:1%; padding-top:1%;" >
            <form id="forma" action="" method="POST">
                <label for="">Nome</label></br>
                <input type="text" id="nome" name="nome">
                    <span id="p1"><?php if(isset($_POST['controllo'])){$var->setNome($nome);} ?> </span> </br>
                <label for="">Cognome</label></br>
                <input type="text" id="cognome" name="cognome">
                    <span id="p2"><?php if(isset($_POST['controllo'])){ $var->setCognome($cognome);} ?> </span> </br>
                <label for="">Email</label></br>
                <input type="email" id="email" name="email">
                    <span id="p3"><?php if(isset($_POST['controllo'])){$var->setEmail($email);} ?> </span> </br>
                <label for="">Password</label></br>
                <input type="password" name="password" id="password">
                    <span id="p4"><?php if(isset($_POST['controllo'])){$var->setPassword($password);} ?> </span> </br>
                <input type="hidden" name="controllo" value="1">
              
                <!--<button id="invia"></button>-->
            </form></br>
            <button type="submit"  id="butt2" class="btn btn-success">Invia</button>
            <button class="btn btn-primary" id="ricarica"> Svuota</button>

        </div>
        



    </body>
    <script type="text/javascript">
     
        $("#butt2").click(function(){
                $("#forma").submit();
            
        });
        $("#ricarica").click(function(){
           $("#p1,#p2,#p3,#p4").empty();
        });

        </script>
</html>

