<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Form</h1>
      <form action="classi.php" method="POST" id="form">
        <div class="form-group">
          <label for="username">Username</label>
          <input
            type="text"
            name="username"
            class="form-control"
            value="Username"
          />
        </div>
          <div class="form-group">
            <label for="mail">E-mail</label>
            <input
              type="mail"
              name="mail"
              id="mail"
              class="form-control"
              value="mail@gmail.com"
            />
          </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" name="password" class="form-control" value="asdasd"/>
        </div>
        <br />
        <h5>Tipo di registrazione</h5>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user-type" id="studente" value="0" checked>
          <label class="form-check-label" for="user-type">Studente</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user-type" id="docente" value="1">
          <label class="form-check-label" for="user-type">Docente</label>
        </div>
        <br>
        <div id="box1" class="">
          <div class="form-group">
          <label for="matricola" style="font-weight:500;font-size:0.95em">Matricola</label>
          <input type="number" name="matricola" id="matricola" class="form-control" value="700000">
          </div>        
        </div>
        <div id="box2" class="hidden">
        <h6>Materia</h6>
          <div class="form-check">
          <input type="radio" name="materia" id="null" class="form-check-input" value="0">
          <label for="mat" class="form-check-label">Seleziona una materia</label>
          </div>
          <div class="form-check">
          <input type="radio" name="materia" id="info" class="form-check-input" value="1">
          <label for="mat" class="form-check-label">Informatica</label>
          </div>
          <div class="form-check">
          <input type="radio" name="materia" id="mate" class="form-check-input" value="2">
          <label for="mat" class="form-check-label">Matematica</label>
          </div>
          <div class="form-check">
          <input type="radio" name="materia" id="bdd" class="form-check-input" value="3">
          <label for="mat" class="form-check-label">Basi di dati</label>
          </div>
          <div class="form-check">
          <input type="radio" name="materia" id="prog" class="form-check-input" value="4">
          <label for="mat" class="form-check-label">Programmazione</label>
          </div>
          <div class="form-check">
          <input type="radio" name="materia" id="aeso" class="form-check-input" value="5">
          <label for="mat" class="form-check-label">Architettura e Sistemi operativi</label>
          </div>
          <div class="form-check">
          </div>        
        </div>
      </form>
      <p id="error-box"></p>
      <button id="invio" class="btn btn-primary">Invia</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>

    <script type="text/javascript">
      // Tipo di login

      $("#studente").change(function () {
        $("#box1").show();
        $("#box2").hide();
      });

      $("#docente").change(function () {
        $("#box2").show();
        $("#box1").hide();
      });

      // Richiesta ajax

      $("#invio").click(function () {
        console.log("onclick");
        var password = $("#pwd").val();
        console.log(password);
        $.ajax({
          url: "classi.php",
          data: $("#form").serialize(),
          success: function (res) {
            var dati = JSON.parse(res);
            console.log(dati);
            if (dati["success"] == 0) {
              var errorDisplay = $('#error-box');
              var error = "Errore, ricontrolla i seguenti campi: <br>"; 
              var n = 0;
              if(dati["username"]){
                error += "Username<br>";
              }
              if(dati["mail"]){
                error += "Mail<br>";
              }
              if(dati["password"]){
                error += "Password";
              }
              errorDisplay.html(error);

            } else {
              alert("Registrazione completata");
            }
          },
        });
      });
    </script>

  </body>
</html>
