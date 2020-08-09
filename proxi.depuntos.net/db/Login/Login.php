<?php

/**
 * Nombre: Login
 * URL: db/Login/Login.php
 * Login
 */

include ('../conexion.php');  //Incluye archivo de conexion
include('../../Funciones/Globales/f_globales.php'); //Incluye archivo de funciones globales
$conn = OpenCon(); //abre conexion
$respuesta = ''; //Crea respuesta

//Obtiene datos enviados
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$Usuario = $request->Usuario; //usuario = usuario enviado
@$Pass = $request->Pass; //Pass = pass enviado 
  
  //Realiza la consulta de la contrasena
  //SELECT -> Usuario y pass DESDE -> Tabla usuarios DONDE -> usuario sea igual al actual
  $query = "SELECT Usuario,Password 
            FROM Usuarios 
            WHERE Usuario = '$Usuario' ";
  $result = $conn->query($query);
  $datos = mysqli_fetch_assoc($result);
  $usuario_tabla = $datos['Usuario']; //De los datos obtenidos del query usuarios tabla = usuario
  $hash = $datos['Password']; //De los datos obtenidos del query hash = password. Esto para el encriptado
  
      
  //Funcion password_verify para ver si el pass enviado es igual hash que es la contrasena encriptada en la BD
  if(password_verify($Pass, $hash)) {
    session_start(); //Abre la sesion
    
    
    //VARIABLES DE SESSION
    $_SESSION['nombre'] = $usuario_tabla; //sesion nombre es igual al usuario de la BD
    $_SESSION['session'] = true; // sesion sesion es igual a true 
    
    $respuesta .= 'OK'; //respuesta es OK
    
    //UPDATE -> Usuarios DIGA -> Activo es igual a 'Y' DONDE -> usuario = usuario de DB
    $update_activo = "  UPDATE Usuarios 
                        SET Activo = 'Y' 
                        WHERE Usuario = '$usuario_tabla' ";
                        
    //haga el query                    
    $res = mysqli_query($conn, $update_activo);
    
  }else{
    
    $respuesta .= 'NOK'; // respuesta es NOK
    
  }
  
  echo $respuesta; //Envia respuesta

 ?>

