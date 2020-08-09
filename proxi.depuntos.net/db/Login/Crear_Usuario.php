<?php

/**
 * Nombre: Crear_Usuario
 * URL: db/Login/Crear_Usuario.php
 * Crear Usuario
 */

include ('../conexion.php');  //Incluye archivo de conexion
include('../../Funciones/Globales/f_globales.php'); //Incluye archivo de funciones globales
$conn = OpenCon(); //abre conexion
$respuesta = ''; //Crea respuesta

//Obtiene datos enviados
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$Usuario = $request->Usuario; //User = user enviado
@$Pass = $request->Pass; //Pass = pass enviado

////////////////////////////
//
//PASSWORD ENCRYPTION
//
$passHash = password_hash($Pass, PASSWORD_DEFAULT); //passHash = funcion(convierte pass enviado, en formato)
////////////////////////////

//Verifica si ya existe
//SELECT -> Usuario DESDE -> Tabla usuarios DONDE -> usuario = usuario actual
$qr = "SELECT Usuario from Usuarios WHERE Usuario='$Usuario'";
$result = $conn->query($qr);
//Si el resultado es mayor a 0, o sea obtuvo datos
if(mysqli_num_rows($result) > 0){

    $respuesta = 'NOK'; //Respuesta es NOK
    
}else{
    //INSERT -> Usuario nuevo con User, pass y activo EN -> Tabla usuarios CON VALORES -> (usuario actual, passHash cifrado, N como activo)
    $query = "INSERT INTO Usuarios (Usuario, Password, Activo)
            VALUES ('$Usuario', '$passHash', 'N') ";
  
  //Si pudo hacer el query
  if(mysqli_query($conn, $query)){
        $respuesta = 'OK'; //respuesta es OK
    }else{
        $respuesta = 'NOK'; //respuesta es NOK
    }
    
}


echo $respuesta; //Envia respuesta



 ?>
