<!doctype html>
<html lang="es">

<head>
  <title>Bienvenido</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <div class="row mt-3">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!--Inicio de CARD-->
        <div class="card">
          <div class="card-header bg-primary text-light">
            <strong>Inicio de sesion</strong>
          </div>
          <div class="card-body">
            <form action="" autocomplete="off">
            <label for="" class="form-label form-control-sm">Usuario</label>
            <input type="text" id="usuario" class="form-control form-control-sm" autofocus>
          </div>
        </form>
          <div class="card-body">
            <label for="clave" class="form-label form-control-sm">Contraseña</label>
            <input type="password" id="clave" class="form-control form-control-sm">
          </div>
          <div class="card-footer text-end">
            <button type="button" id="iniciar-sesion" class="btn btn-sm btn-success" >Iniciar sesion</button>
          </div>
          <div class="enlace">
         <?php require ('autentificacion.php')?>
        <!-- <a href="<?php echo $client->createAuthUrl() ?>">Iniciar sesión con Google</a> -->
      </div>
        </div>
        <!--Fin de CARD-->
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


  <script>
    $(document).ready(function (){

      function iniciarSesion(){
        const usuario = $("#usuario").val();
        const clave = $("#clave").val();

        if(usuario != "" && clave != ""){
          $.ajax({
            url:'controllers/usuario.controller.php',
            type: 'POST',
            data: {
              operacion       : 'login',
              correo   : usuario,
              claveIngresada  : clave
            },
            dataType: 'JSON',
            success: function (result){
              console.log(result);
              if(result["status"]){
                window.location.href = "views/index.php";
              }else{
                alert(result["mensaje"]);
              }
            }
          });
        }


      }

      $("#iniciar-sesion").click(iniciarSesion);


    });
  </script>


</body>

</html>