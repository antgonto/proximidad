<?php

/**
 * Nombre: ActualizarUbicacion
 * URL: db/Cuenta/ActualizarUbicacion.php
 * Actualizar Coordenadas del usuario
 */
 
include ('../conexion.php');
include('../../Funciones/Globales/f_globales.php');
$conn = OpenCon();

$respuesta = '';
$Usuario = Get_SessionID();

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$Latitud = $request->Latitud;
@$Longitud = $request->Longitud;


    $sql = " UPDATE Usuarios 
             SET Latitud = '$Latitud', Longitud = '$Longitud'
             WHERE Usuario = '$Usuario' ";
             
    if($result = mysqli_query($conn,$sql))
    {
        
        $respuesta .= 'OK';
        
    }
    else
    {
      $respuesta .= 'NOK';
    }
    
    echo $respuesta;
 ?>
