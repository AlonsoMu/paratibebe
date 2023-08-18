<?php

?>

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

     <!-- ÍCONOS FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!-- INICIO DE CARD -->
        <div class="card">
          <div class="card-header bg-info text-light">
           <strong>Inicio de sesión</strong>
          </div>
          
          <div class="card-body">
            <!--<img src="views/img/fotografias/programador.png">-->
            <form action="" autocomplete="off">
              <div class="mb-3">
                <label for="correo" class="form-label">
                  <i class="fa-solid fa-user"></i>
                  Correo Electrónico:
                </label>
                <input type="text" id="correo" class="form-control form-control-sm"  placeholder="Ingrese su correo">
              </div>
              <div class="mb-3">
                <label for="clave" class="form-label">
                  <i class="fa-solid fa-lock"></i>
                  Contraseña:
                </label>
                <input type="password" id="clave" class="form-control form-control-sm" placeholder="******">
              </div>
            </form>
          </div>
          <div class="card-footer text-center">
            <!--<button type="button" id="crear-correo" class="btn btn-sm btn-warning">Crear Usaurio</button>-->
            <button type="button" id="iniciar-sesion" class="btn btn-sm btn-success" >Iniciar Sesión <i class="fa-solid fa-right-to-bracket"></i></button>
            <button type="button" id="iniciar-sesion" class="btn btn-sm btn-warning" >Registrarse <i class="fa-solid fa-right-to-bracket"></i></button>
          </div>
        </div>
        <!-- FIN DE CARD-->
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<script>
    $(document).ready(function (){

      function iniciarSesion() {
        const correo = $("#correo").val();
        const clave = $("#clave").val();
        
        if (correo != "" && clave != "") {

          $.ajax({
          url: 'controllers/usuario.controller.php',
          type: 'POST',
          data: {
            operacion: 'login',
            correo: correo,
            claveIngresada: clave
          },
          dataType: 'JSON',
          success: function (result) {
            console.log(result);
            if (result["status"]) {
              Swal.fire({
              icon: 'success',
              title: 'Inicio de sesión exitoso',
              text: 'Redirigiendo al inicio...',
              showConfirmButton: false,
              timer: 2000
              }).then((result) => {
                window.location.href = "views/index.php";
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Inicio de sesión fallido',
                text: result["mensaje"],
                confirmButtonText: 'Cerrar'
              });

            }
          }
          });
        }
      }
      $("#iniciar-sesion").click(iniciarSesion);

    });
  </script>


</html>