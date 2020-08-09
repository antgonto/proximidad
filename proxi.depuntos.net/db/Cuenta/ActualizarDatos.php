<?php

/**
 * Nombre: ActualizarDatos
 * URL: db/Cuenta/ActualizarDatos.php
 * Actualizar Datos del Usuario
 */
 
include ('../conexion.php'); //Incluye file de conexion
include('../../Funciones/Globales/f_globales.php'); // Incluye el file de funciones globales
$conn = OpenCon(); //Abre la conexion

$respuesta = ''; //Crea respuesta
$Usuario = Get_SessionID(); //El usuario es igual al usuario de la sesion actual. Funcion en globales

$postdata = file_get_contents("php://input"); // Necesario para obtener datos desde Angular en el JS
$request = json_decode($postdata); // Necesario para obtener datos desde Angular en el JS
@$Nombre = $request->Nombre; //Nombre del Angular.js es igual a Nombre
@$Apellido = $request->Apellido; //Apellido del Angular.js es igual a Apellido
@$Celular = $request->Celular; //Celular del Angular.js es igual a Celular
@$Correo = $request->Correo; //Correo del Angular.js es igual a Correo

    //UPDATE ->  Tabla usuarios y diga que Nombre es var_Nombre, Apellido es var_Apellido, etc. Donde el user sea igual al user de la sesion
    $sql = " UPDATE Usuarios SET Nombre = '$Nombre', Apellido = '$Apellido', Celular = '$Celular', Correo = '$Correo'
             WHERE Usuario = '$Usuario' ";
    if($result = mysqli_query($conn,$sql))
    {
        //Si todo salio bien respuesta es OK 
        $respuesta .= 'OK';
        
    }
    else
    {
      //Si algo salio mal respuesta es NOK
      $respuesta .= 'NOK';
    }
    
    //Mande respuesta
    echo $respuesta;
 ?>
