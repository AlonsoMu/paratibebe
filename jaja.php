<?php
$host       = "localhost";        // Servidor
  $port       = "3306";            // Puerto de comunicación BD
  $database   = "logingoogle";         // Nombre BD
  $charset    = "UTF8";          // Codificación (idioma)
  $user       = "root";         // Usuario (raíz)
  $password   = "";            // Contraseña
  

  $conect = mysqli_connect($host, $user, $password, $database);

  if(!$conect){
    die("chocame una verga" . mysqli_connect_error());
  }

  echo "Ingrese";

  $misql = "INSERT INTO usuarios (correo, nombres, apellidos, claveacceso, fecha_nacimiento, sexo) VALUES ('saasscorreo', 'saanombres', 'saapellidos', 'saclaveacceso', '1990-05-15', 'M')";
  
  if(mysqli_query($conect, $misql)){
    echo "Se creo conexion";
  } else{
    echo "Error" . $misql . "<br>" . mysqli_error($conect);
  }

  mysqli_close($conect);

  
  ?>