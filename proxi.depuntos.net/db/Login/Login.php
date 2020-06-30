<?php

/**
 * Nombre: Login
 * URL: db/Login/Login.php
 * Login
 */

//Abre conexion y prepara respuesta
include ('../conexion.php'); 
include('../../Funciones/Globales/f_globales.php');
$conn = OpenCon();
$respuesta = '';
$message = '';


//Obtiene datos enviados
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$Usuario = $request->Usuario;
@$Pass = $request->Pass;
    
  
  //Realiza la consulta de la contrasena
  
  $query = "SELECT Usuario,Password 
            FROM Usuarios 
            WHERE Usuario = '$Usuario' ";
  $result = $conn->query($query);
  $datos = mysqli_fetch_assoc($result);
  $pass_tabla = $datos['Password'];
  $usuario_tabla = $datos['Usuario'];
  
      
  //Si contrasena coincide
  if($pass_tabla == $Pass) {
    session_start();
    
    
    //VARIABLES DE SESSION
    $_SESSION['nombre'] = $usuario_tabla;
    $_SESSION['session'] = true;
    //$respuesta .= $_SESSION['nombre'].'-';
    //$respuesta .= $_SESSION['session'].'-';
    $respuesta .= 'OK';
    
  }else{
      
    $message = "Datos: ID -> ".$Usuario." / Pass-> ".$Pass. " / Correct Pass -> " .$pass_verificar;
    $respuesta .= 'NOK';
    
  }
  
  echo $respuesta;

 ?>

