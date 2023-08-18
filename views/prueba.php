<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./styles.css">
    <title>FORmULARIO</title>
</head>
<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad, por favor inicia sesión con tus datos</p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una Cuenta</h2>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                </div>
                <p>o usa tu correo electrónico para registrarte</p>
                <form class="form">
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" id="nombres" placeholder="Nombres">
                    </label>
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" id="apellidos" placeholder="Apellidos">
                    </label>
                    <label>
                        <i class='bx bx-envelope' ></i>
                        <input type="text" id="correo" placeholder="Correo Electrónico">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" id="clave" placeholder="Contraseña">
                    </label>
                    <input type="submit" value="Registrarse" id="registro-button">
                </form>
                <p id="registro-mensaje"></p>
            </div>
        </div>
    </div>


    <div class="container-form login hide">
        <div class="information">
            <div class="info-childs">
                <h2>¡Bienvenido Nuevamente!</h2>
                <p>Para unirte a nuestra comunidad, por favor inicia sesión con tus datos</p>
                <input type="button" value="Registro" id="sign-up">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                </div>
                <p>Iniciar sesión con una cuenta</p>
                <form class="form" id="login-form"  >
                    <label>
                        <i class='bx bx-envelope' ></i>
                        <input type="text" id="correo-inicio" placeholder="Correo Electrónico">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" id="clave-inicio" placeholder="Contraseña">
                    </label>
                    <input type="submit" value="Iniciar Sesión">
                </form>
                
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
      <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <!-- SweetAlert2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>
    $(document).ready(function() {
            $("#registro-button").click(function(e) {
                e.preventDefault(); // Evita el envío tradicional del formulario

                var nombres = $("#nombres").val();
                var apellidos = $("#apellidos").val();
                var correo = $("#correo").val();
                var clave = $("#clave").val();

                // Verificar si todos los campos están llenos
                if (nombres === "" || apellidos === "" || correo === "" || clave === "") {
                    // Mostrar alerta con SweetAlert en caso de campos vacíos
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, completa todos los campos.',
                        confirmButtonText: 'Cerrar'
                    });
                } else {
                    // Enviar datos al servidor utilizando AJAX
                    $.ajax({
                        type: "POST",
                        url: "../controllers/usuario.controller.php",
                        data: {
                            operacion: "registrar",
                            nombres: nombres,
                            apellidos: apellidos,
                            correo: correo,
                            clave: clave
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status) {
                                // Mostrar alerta de éxito con SweetAlert
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Registro Exitoso',
                                    text: data.mensaje,
                                    confirmButtonText: 'Cerrar'
                                });

                                // Limpiar los campos del formulario
                                $("#nombres").val("");
                                $("#apellidos").val("");
                                $("#correo").val("");
                                $("#clave").val("");
                            } else {
                                // Mostrar alerta de error con SweetAlert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: data.mensaje,
                                    confirmButtonText: 'Cerrar'
                                });
                            }
                        }
                    });
                }
            });
        });





        $(document).ready(function() {
            // ... tu código actual ...

            $("#login-form").submit(function(e) {
            e.preventDefault(); // Evita el envío tradicional del formulario

            var correoInicio = $("#correo-inicio").val();
            var claveInicio = $("#clave-inicio").val();

            // Enviar datos al servidor utilizando AJAX
            $.ajax({
                type: "POST",
                url: "../controllers/usuario.controller.php",
                data: {
                    operacion: "login",
                    correo: correoInicio,
                    claveIngresada: claveInicio
                },
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        // Mostrar alerta de éxito con SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Inicio de sesión exitoso',
                            text: 'Redireccionando...',
                            showConfirmButton: false
                        });

                        // Redirigir al usuario a la página de inicio después de 3 segundos
                        setTimeout(function() {
                            window.location.href = "./index.php";
                        }, 3000); // 3000 milisegundos = 3 segundos
                    } else {
                        // Mostrar alerta de error con SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.mensaje,
                            confirmButtonText: 'Cerrar'
                        });
                    }
                }
            });
        });
    });


  </script>
</body>
</html>