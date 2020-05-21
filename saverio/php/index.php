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
          <input type="password" name="pwd" class="form-control" />
        </div>
        <br />
      </form>
      <br />
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

      $("#login").change(function () {
        $("#box1").show();
        $("#box2").hide();
      });

      $("#login2").change(function () {
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
            console.log(res);
            var dati = JSON.parse(res);
            console.log(dati["success"]);
            if (dati["success"] == 0) {
              if(!dati["username"]){
                alert("Errore, username errato");
              }
              if(!dati["mail"]){
                alert("Errore, mail errata");
              }
              if(!dati["password"]){
                alert("Errore, password errata");
              }
            } else {
              alert("Tutto ok");
            }
          },
        });
      });
    </script>

  </body>
</html>
