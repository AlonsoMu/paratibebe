<?php

require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){
  $correo = new Correo();

  // IDENTIFICANFO LA OPERACION...
  if($_POST['operacion'] == 'login'){

    $registro = $correo->iniciarSesion($_POST['correo']);

    $_SESSION["login"] = true;

    //Objeto para contener el resultado
    $resultado = [
      "status"  => false,
      "mensaje" => ""
    ];

    if($registro){
      // El usuario si existe
      $claveEncriptada = $registro["clave"];
      
      // Validar la contraseña
      if(password_verify($_POST['claveIngresada'], $claveEncriptada)){
        $resultado["status"] = true;
        $resultado["mensaje"] = "Bienvenido al Proyecto";
        $_SESSION["login"] = true;
      }else{
        $resultado["mensaje"] = "Error en la contraseña";
      }
      
    }else{
      // El correo no existe
      $resultado["mensaje"] = "No encontramos el correo";
    }

    // Enviams el objeto resultado a la vista
    echo json_encode($resultado);
  }






  //-------------------------------------------------------------









  if($_POST['operacion'] == 'registrar'){

    $correocompare = 'alonsomunoz263@gmail.com';
    $coleo = 'alonsomunoz263@gmail.com';

    if($coleo == $correocompare):

      $datosForm = [
        "nombres"         => $_POST['nombres'],
        "apellidos"       => $_POST['apellidos'],
        "correo"          => $_POST['correo'],
        "clave"           => $_POST['clave'],   
      ];

      // Encripta la contraseña usando password_hash
      $claveEncriptada = password_hash($datosForm['clave'], PASSWORD_DEFAULT);

      // Actualiza el dato de la contraseña en el array
      $datosForm['clave'] = $claveEncriptada;

      // Llama al método de registro en tu modelo con los datos capturados
      $correo->registrarUsuario($datosForm);

      // Genera un token de activación único
      $token = $correo->generarToken(); // Genera un token aleatorio

      // Almacena el token en la base de datos
      $correo->almacenarTokenActivacion($datosForm['correo'], $token);

      // Devuelve una respuesta JSON al cliente
      $respuesta = [
          "status" => true,
          "mensaje" => "Registro exitoso"
      ];
      echo json_encode($respuesta);

    else:

      // Devuelve una respuesta JSON al cliente
      $respuesta = [
          "status" => true,
          "mensaje" => "Email existente"
      ];
      echo json_encode($respuesta);

    endif;
}









//-------------------------------------------------------------








  // Intercertar valores que llegan por la URL
  if (isset($_GET['operacion'])){

    if($_GET['operacion'] == 'finalizar'){
      session_destroy();
      session_unset(); // Libera cualquier cosa o accion que el servidor haya creado.
      header('Location:../index.php');
    }
  }
}