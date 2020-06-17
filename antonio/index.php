<?php
require("database.php");
include("classitennis.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stile.css">
    <title>Circolo Tennis</title>
  </head>
  <body>
  
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand"  id="logo" href="index.php">Circolo Tennis Bari</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="clicksoci()">Soci</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="clickcampi()">Campi da gioco</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="clickprenotazioni()">Prenotazioni</a>
      </li>
    </ul>
  </div>
  <div id="bottoni" class="btnsss" style="display:none;">
    <button id="addSoci" class="btn btn-success" onclick="add()">Aggiungi socio</button>
  </div>
</nav>

<!--Carosello-->
<div id="carosello">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="campi.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="tennisg.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="sfondo2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <p class="textover" id="testo">Benvenuto nell'aria riservata ai nostri dipendenti</p>
</div>
</div>

<!--Tabella soci tramite query-->
<div id="soci" style="display:none;">
<!--Successo-->
<div id="successo" style="display:none;"><span style="color:green;">Registrazione effettuata con successo</span></div>
<?php
$tabSoci=new soci($db);
$tabSoci->getSoci();
?>
</div>
<!--Errore-->
<div id="errore" style="display:none;"><span style="color:red;">Registrazione non effettuata! Riprova</span></div>
<!--Successo modifica-->
<div id="successoMod" style="display:none;"><span style="color:green;">Socio numero: <?php if(isset($_GET["success2"])){echo $_GET["id"];} ?> modificato con successo</span></div>
<!--Tabella campi tramite query-->
<div id="campi" style="display:none;">
  <?php
$tabCampi=new campi($db);
$tabCampi->getCampi();
?>
</div>

<!-- Tabella prenotazioni -->
<div id="prenotazioni" style="display:none;">

</div>


<!--Form aggiungi socio-->
<div id="formAdd"class="container" style="display:none;">
  <form id="formagg"action="nuovisoci.php" method="POST">
    <div class="form-group">
      <label for="nome">Nome<small style="color:red;">*</small></label>
      <input type="text"  class="form-control" id="nome" aria-describedby="emailHelp" name="name">
      <small id="smallnomeaggiungi"></small>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Cognome<small style="color:red;">*</small></label>
    <input type="text" class="form-control" id="surname"name="surname">
    <p id="messaggioerrore2" style="display:none;">Cognome inserito non corretto</p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Codice fiscale<small style="color:red;">*</small></label>
    <input type="text" class="form-control" id="codicefisc"name="codice">
    <p id="messaggioerrore3" style="display:none;">Codice fiscale inserito non corretto</p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Data di nascita<small style="color:red;">*</small></label>
    <input type="date" class="form-control" id="datadinascita"name="birthday">
    <p id="messaggioerrore4" style="display:none;">Data di nascita inserita non corretta</p>
  </div>
</form><br>
<div class="posizione">
  <button type="submit" class="btn btn-primary" onclick="salva()">Aggiungi</button>
  <button type="submit" class="btn btn-danger float-right" onclick="annulla()">Annulla</button>
</div>
</div>

<!--Form modifica socio-->
<div id="formMod"class="container" style="display:none;">
  <form id="formUp"action="modifica.php" method="POST">
    <input type="hidden" id="getId">
    <div class="form-group">
      <label for="exampleInputEmail1">Nome<small style="color:red;">*</small></label>
      <input type="text"  class="form-control" id="nomeUp" aria-describedby="emailHelp" name="nameUp">
      <p id="messaggioerrore1Up" style="display:none;">Nome inserito non corretto</p>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Cognome<small style="color:red;">*</small></label>
    <input type="text" class="form-control" id="surnameUp"name="surnameUp">
    <p id="messaggioerrore2Up" style="display:none;">Cognome inserito non corretto</p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Codice fiscale<small style="color:red;">*</small></label>
    <input type="text" class="form-control" id="codicefiscUp"name="codiceUp">
    <p id="messaggioerrore3Up" style="display:none;">Codice fiscale inserito non corretto</p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Data di nascita<small style="color:red;">*</small></label>
    <input type="date" class="form-control" id="datadinascitaUp"name="birthdayUp">
    <p id="messaggioerrore4Up" style="display:none;">Data di nascita inserita non corretta</p>
  </div>
</form><br>
<div class="posizione">
  <button class="btn btn-primary" id="salvaModifica">Salva</button>
  <button type="submit" class="btn btn-danger float-right" onclick="annulla()">Annulla</button>
</div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
  </html>
  <script>

function clicksoci(){
  $("#carosello").hide();
  $("#soci").fadeIn();
  $("#bottoni").fadeIn();
  $("#formAdd").hide();
  $("#campi").hide();
  $("#formMod").hide();
  $("#successoMod").hide();
}
function add(){
  $("#soci").hide();
  $("#bottoni").hide();
  $("#formAdd").fadeIn();
  $("#successoMod").hide();

}
function annulla(){
  $("#formAdd").hide();
  $("#soci").fadeIn();
  $("#bottoni").fadeIn();
  $("#formMod").hide();
  $("#successoMod").hide();
}
function clickcampi(){
$("#carosello").hide();
$("#campi").fadeIn();
$("#soci").hide();
$("#bottoni").hide();
$("#successo").hide();
$("#successoMod").hide();
}
function salva(){
  let nomesocio=$("#nome");
  let cognomesocio=$("#surname");
  let cfsocio=$("#codicefisc");
  let nascitasocio=$("#datadinascita");
  let contatore=validation(nomesocio,cognomesocio,cfsocio,nascitasocio);
  if (contatore==0){
    $('#formagg').submit();
  }
}
      function update(id,nome,cognome,data,codicef){
      $("#formMod").fadeIn();
      $("#soci").hide();
      $("#getId").val(id);
      $("#nomeUp").val(nome);
      $("#surnameUp").val(cognome);
      $("#datadinascitaUp").val(data);
      $("#codicefiscUp").val(codicef);
        };

     $("#salvaModifica").click(function(){
       let id=$("#getId").val();
       let nomemod=$("#nomeUp");
       let cognomemod=$("#surnameUp");
       let datamod=$("#datadinascitaUp");
       let codicemod=$("#codicefiscUp");
       let contatore=validation(nomemod,cognomemod,codicemod,datamod);
       console.log(cognomemod);
       if (contatore==0){

        $.ajax({
         url:"modifica.php",
         method:"POST",
         data:"id="+id+"&nome="+nomemod.val()+"&cognome="+cognomemod.val()+"&datamod="+datamod.val()+"&codicemod="+codicemod.val(),
        type:JSON,
        success:function(data){
        data=JSON.parse(data);
        console.log(data);
        if(data["risultato"]){
        window.location.href="index.php?success2&id="+data["id"];
        
        }
        }

      }) }
     }) 

     function validation(inputnome,inputcognome,inputcodicef,inputdata){
      let contatore=0;
      let datanascita=new Date(inputdata.val());
      annonascita=datanascita.getFullYear();
      let dataoggi=new Date();
      dataoggi=dataoggi.getFullYear();
      let maggioranza=dataoggi-annonascita;
      /* labelattuale = labelattuale+"Errore!";
      dovelodevimettere.html(labelattuale); */

      if(inputnome.val().length<3 || inputnome.val().length>64){
       contatore+=1;
       $('#gastema').remove();
       inputnome.css("border-color","red");
       inputnome.after('<p id="gastema" style="color:red;">Nome inserito non corretto</p>');
     }else{
       inputnome.css("border-color","black");
       $('#gastema').remove();
     }
     if(inputcognome.val().length<1 || inputcognome.val().length>128){
      contatore+=1;
      $('#gastema2').remove();
      inputcognome.css("border-color","red");
      inputcognome.after('<p id="gastema2" style="color:red;">Cognome inserito non corretto</p>');
     }else{
      inputcognome.css("border-color","black");
      $('#gastema2').remove();
      
     }
     if(inputcodicef.val().length!=16){
      contatore+=1;
      $('#gastema3').remove();
      inputcodicef.css("border-color","red");
      inputcodicef.after('<p id="gastema3" style="color:red;">Codice fiscale inserito non corretto</p>');
     }else{
      inputcodicef.css("border-color","black");
      $('#gastema3').remove();
      
     }
     if(maggioranza<18 || inputdata.val()==""){
      contatore+=1;
      $('#gastema4').remove();
      inputdata.css("border-color","red");
      inputdata.after('<p id="gastema4" style="color:red;">Data inserita non corretto</p>');
     }else{
      inputdata.css("border-color","black");
      $('#gastema4').remove();
     }
     return contatore;
     }

function cancella(iddelete){
  
  var result = confirm("Sei sicuro di voler cancellare questo campo?");
  if (result){

      $.ajax({
          url:"elimina.php",
          method:"POST",
          data:"id="+iddelete,
          type:JSON,
          success:function(data){
            data=JSON.parse(data);
            console.log(data);
            if(data["risultato"]){
            window.location.href="index.php?successdelete&id="+data["id"];
          
            }
          }

      })
  }     
}

function clickprenotazioni(){
  $("#carosello").hide();
  $("#campi").hide();
  $("#soci").hide();
  $("#prenotazioni").show();
    $.ajax({
      url:"prenotazioni.php",
      method:"POST",
      type:JSON,
      success:function(response){
        var risp = JSON.parse(response);
        let tabella = '<table class="table table-bordered"><thead><tr><th scope="col">#</th><th scope="col">Data prenotazione</th><th scope="col">Nome campo</th><th scope="col">Tipo campo</th><th scope="col">Socio</th></tr></thead><tbody>';
        for(let i=0; i<risp.length; i++){
          tabella += '<tr><th scope="col">'+risp['id']+'</th><td>'+risp['data_prenotazione']+'</td><td>'+risp['nome_campo']+'</td><td>'+risp['tipo_campo']+'</td><td>'+risp['nome_socio']+'</td></tr>';
        }
        tabella += '</tbody></table>';
        $('#prenotazioni').append(tabella);
      }
    })
  }
      

</script>
<?php
if(isset($_GET["success"])){
      echo '<script>  
          clicksoci();
          $("#successo").fadeIn();
          </script>';
          }

if(isset($_GET["error"])){
     echo '<script>$(document).ready(function(){
             clicksoci();
               add();
                $("#errore").fadeIn();
                 })</script>';
              }
if(isset($_GET["success2"])){
      echo '<script>  
          clicksoci();
          $("#successoMod").fadeIn();
          </script>';
          }
if(isset($_GET["successdelete"])){
  echo '<script>  
      clicksoci();
      $("#successo").fadeIn();
      </script>';
      }
?>