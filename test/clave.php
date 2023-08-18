<?php

//Tabla
$claveUsuario = "Alonso123";

$claveMD5 = md5($claveUsuario);
$claveSHA = sha1($claveUsuario);
$claveHASH = password_hash($claveUsuario, PASSWORD_BCRYPT);

//Clave de acceso (LOGIN)
$claveAcceso = "Alonso123";

var_dump($claveHASH);

//Validar la clave HASH
if(password_verify($claveAcceso, $claveHASH)){
  echo "Acceso correcto";
}