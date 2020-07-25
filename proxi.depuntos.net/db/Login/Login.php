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
  $hash = $datos['Password'];
  
      
  //Si contrasena coincide
  if(password_verify($Pass, $hash)) {
    session_set_cookie_params(1 * 60, "/");
    session_start();
    
    
    //VARIABLES DE SESSION
    $_SESSION['nombre'] = $usuario_tabla;
    $_SESSION['session'] = true;
    
    $respuesta .= 'OK';
    
    $update_activo = "  UPDATE Usuarios 
                        SET Activo = 'Y' 
                        WHERE Usuario = '$usuario_tabla' ";
                        
    $res = mysqli_query($conn, $update_activo);
    
  }else{
      
    //$message = "Datos: ID -> ".$Usuario." / Pass-> ".$Pass. " / Correct Pass -> " .$pass_verificar;
    $respuesta .= 'NOK';
    
  }
  
  echo $respuesta;

 ?>

