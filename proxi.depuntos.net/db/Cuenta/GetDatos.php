<?php

/**
 * Nombre: Get_Datos
 * URL: db/Cuenta/Get_Datos.php
 * Get Datos de Usuario
 */
 
include ('../conexion.php');//Incluye file de conexion
include('../../Funciones/Globales/f_globales.php'); // Incluye el file de funciones globales
$conn = OpenCon(); //Abre la conexion

$listaDatosUsuario = []; // Crea la lista de datos de usuario 
$Usuario = Get_SessionID(); //El usuario es igual al usuario de la sesion actual. Funcion en globales

    //SELECT -> Usuario, Nombre, etc DESDE -> Tabla usuarios DONDE -> Usuario sea igual al actual
    $sql = " SELECT Usuario, Nombre, Apellido, Apellido, Celular, Correo
             FROM Usuarios
             WHERE Usuario = '$Usuario' ";
    if($result = mysqli_query($conn,$sql))
    {
      //Mientras hayan datos
      while($row = mysqli_fetch_assoc($result))
      {
        //Se le agrega a la lista de datos el siguiente objeto
        $listaDatosUsuario['Usuario'] = $row['Usuario'];
        $listaDatosUsuario['Nombre'] = $row['Nombre'];
        $listaDatosUsuario['Apellido'] = $row['Apellido'];
        $listaDatosUsuario['Celular'] = $row['Celular'];
        $listaDatosUsuario['Correo'] = $row['Correo'];
        
      }
      
        echo json_encode($listaDatosUsuario); //Envia la lista de datos de usuario. El unico objeto con los datos del user
        
    }
    else
    {
      http_response_code(404); //Sino envia error 404 
    }
    
 ?>
