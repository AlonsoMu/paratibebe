<?php

require_once 'Conexion.php';

class Correo extends Conexion{

  private $accesoBD; // Tendrá la conexion de la base de datos

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion(); //El valor de retorno de esta funcion ha sido asignada a este objeto. Si getConexion devuelve el retorno al acceso.
  }
  
  public function iniciarSesion($correo = ""){
    try{
      //1. Preparamos la consulta
      $consulta = $this->accesoBD->prepare("CALL spu_usuarios_login(?)");
      //2. Ejecutamos la consulta 
      $consulta->execute(array($correo));
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        die($e->getMessage());
        }
    }

    public function listarUsuarios(){
      try {
        // 1. Preparamos la consulta
       $consulta = $this->accesoBD->prepare("CALL spu_listar_usuario()");
       // 2. Ejecutamos la consulta
       $consulta->execute();
       // 3. Devolvemos el resultado
       return $consulta->fetchAll(PDO::FETCH_ASSOC);
      } 
      catch (Exception $e) {
        die($e->getMessage());
      }
     }

     public function registrarUsuario($datos = []){
      try {
        $consulta = $this->accesoBD->prepare("CALL spu_registrar_usuario(?,?,?,?)");
        $consulta->execute(
          array(
            $datos["nombres"],
            $datos["apellidos"],
            $datos["correo"],
            $datos["clave"]
          )
        );
      } 
      catch (Exception $e) {
        die($e->getMessage());
      }
     }

     public function actualizarUsuario($datos = []){
      try {
        // 1. Preparamos la consulta
        $consulta = $this->accesoBD->prepare("CALL spu_actualizar_usuario(?,?,?)");
        // 2. Ejecutamos la consulta
        $consulta->execute(
          array(
            $datos["idusuario"],
            $datos["nombres"],
            $datos["apellidos"]
          )
        );
      } 
      catch (Exception $e) {
        die($e->getMessage());
      }
     }
}