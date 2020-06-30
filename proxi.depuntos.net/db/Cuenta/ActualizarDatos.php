<?php

/**
 * Nombre: ActualizarDatos
 * URL: db/Cuenta/ActualizarDatos.php
 * Actualizar Datos del Usuario
 */
 
include ('../conexion.php');
include('../../Funciones/Globales/f_globales.php');
$conn = OpenCon();

$respuesta = '';
$Usuario = Get_SessionID();

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$Nombre = $request->Nombre;
@$Apellido = $request->Apellido;
@$Celular = $request->Celular;
@$Correo = $request->Correo;

    $sql = " UPDATE Usuarios SET Nombre = '$Nombre', Apellido = '$Apellido', Celular = '$Celular', Correo = '$Correo'
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
