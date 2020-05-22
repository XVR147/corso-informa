<?php
if(isset($_POST['controllo'])){
include('classi.php');
$var= new Registrazione2();
$var2= new controlloEcho();
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    </head>
    <body>
        <div id="div1" style="padding-left:1%; padding-top:1%; display:none;" >
            <form id="forma" action="" method="POST"  >
                <label for="nome">Nome</label></br>
                <input type="text" id="nome" name="nome" value="<?php if(isset($_POST['controllo'])){ $var2->setNome($nome);}?>" 
                onkeydown = "if (event.keyCode == 13)$('#butt2').trigger('click')">
                    <span id="p1"><?php if(isset($_POST['controllo'])){$var->setNome($nome);}?> </span> </br>
                <label for="cognome">Cognome</label></br>
                <input type="text" id="cognome" name="cognome" value="<?php if(isset($_POST['controllo'])){$var2->setCognome($cognome);}?>"
                onkeydown = "if (event.keyCode == 13)$('#butt2').trigger('click')">
                    <span id="p2"><?php if(isset($_POST['controllo'])){$var->setCognome($cognome);}  ?> </span> </br>
                <label for="email">Email</label></br>
                <input type="email" id="email" name="email" value="<?php if(isset($_POST['controllo'])){ $var2->setEmail($email);}?>"
                onkeydown = "if (event.keyCode == 13)$('#butt2').trigger('click')">
                    <span id="p3"><?php if(isset($_POST['controllo'])){$var->setEmail($email);} ?> </span> </br>
                <label for="password">Password</label></br>
                <input type="password" name="password" id="password" 
                onkeydown = "if (event.keyCode == 13)$('#butt2').trigger('click')">
                    <span id="p4"><?php if(isset($_POST['controllo'])){$var->setPassword($password);}    ?> </span> </br>
                <input type="hidden" name="controllo" value="1">
              
                <!--<button id="invia"></button>-->
            </form></br>
            <button type="submit"  id="butt2" class="btn btn-success">Invia</button>
            <button class="btn btn-primary" id="ricarica"> Svuota</button>

        </div>
        



    </body>
    <script type="text/javascript">
         $(document).ready(function(){ 
             $('#div1').fadeIn();
        });
     
        $("#butt2").click(function(){
                $("#forma").submit();
            
        });
        $("#ricarica").click(function(){
           $("#p1,#p2,#p3,#p4").empty();
        });
       


        </script>
</html>

