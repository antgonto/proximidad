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


  $query = "INSERT INTO Usuarios (Usuario, Password)
            VALUES ('$Usuario', '$Pass') ";
  
  
  if(mysqli_query($conn, $query)){
        $respuesta = 'OK';
    }else{
        $respuesta = 'NOK';
    }
    
echo $respuesta;



 ?>
