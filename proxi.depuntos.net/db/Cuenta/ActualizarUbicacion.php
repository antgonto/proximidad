<?php

/**
 * Nombre: ActualizarUbicacion
 * URL: db/Cuenta/ActualizarUbicacion.php
 * Actualizar Coordenadas del usuario
 */
 
include ('../conexion.php');//Incluye file de conexion
include('../../Funciones/Globales/f_globales.php'); // Incluye el file de funciones globales
$conn = OpenCon(); //Abre la conexion

$respuesta = ''; //Crea respuesta
$Usuario = Get_SessionID(); //El usuario es igual al usuario de la sesion actual. Funcion en globales

$postdata = file_get_contents("php://input"); // Necesario para obtener datos desde Angular en el JS
$request = json_decode($postdata);// Necesario para obtener datos desde Angular en el JS
@$Latitud = $request->Latitud; //Latitud del Angular.js es igual a Latitud
@$Longitud = $request->Longitud; //Long del Angular.js es igual a Long

    //UPDATE -> tabla usuarios diga Latitud es la latitud recibida y long es long recibida. Donde el user sea igual al de la sesion actual
    $sql = " UPDATE Usuarios 
             SET Latitud = '$Latitud', Longitud = '$Longitud'
             WHERE Usuario = '$Usuario' ";
             
    if($result = mysqli_query($conn,$sql))
    {
        
        $respuesta .= 'OK';//Si todo salio bien respuesta es OK 
        
    }
    else
    {
      $respuesta .= 'NOK'; //Si algo salio mal respuesta es NOK
    }
    
    echo $respuesta; //Mande respuesta
 ?>
