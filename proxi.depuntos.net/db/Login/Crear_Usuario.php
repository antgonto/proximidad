<?php

/**
 * Nombre: Crear_Usuario
 * URL: db/Login/Crear_Usuario.php
 * Crear Usuario
 */

//Abre conexion y prepara respuesta
include ('../conexion.php'); 
include('../../Funciones/Globales/f_globales.php');
$conn = OpenCon();
$respuesta = '';

//Obtiene datos enviados
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$Usuario = $request->Usuario;
@$Pass = $request->Pass;

////////////////////////////
//
//PASSWORD ENCRYPTION
//
$passHash = password_hash($Pass, PASSWORD_DEFAULT);
////////////////////////////

//Verifica si ya existe
$qr = "SELECT Usuario from Usuarios WHERE Usuario='$Usuario'";
$result = $conn->query($qr);
if(mysqli_num_rows($result) > 0){

    $respuesta = 'NOK';
    
}else{
    $query = "INSERT INTO Usuarios (Usuario, Password, Activo)
            VALUES ('$Usuario', '$passHash', 'N') ";
  
  
  if(mysqli_query($conn, $query)){
        $respuesta = 'OK';
    }else{
        $respuesta = 'NOK';
    }
    
}


echo $respuesta;



 ?>
