<?php

/**
 * Nombre: Get_Datos
 * URL: db/Cuenta/Get_Datos.php
 * Get Datos de Usuario
 */
 
include ('../conexion.php');
include('../../Funciones/Globales/f_globales.php');
$conn = OpenCon();

$listaDatosUsuario = [];
$Usuario = Get_SessionID();

    $sql = " SELECT Usuario, Nombre, Apellido, Apellido, Celular, Correo
             FROM Usuarios
             WHERE Usuario = '$Usuario' ";
    if($result = mysqli_query($conn,$sql))
    {
      $i = 0;
      while($row = mysqli_fetch_assoc($result))
      {
          
        $listaDatosUsuario['Usuario'] = $row['Usuario'];
        $listaDatosUsuario['Nombre'] = $row['Nombre'];
        $listaDatosUsuario['Apellido'] = $row['Apellido'];
        $listaDatosUsuario['Celular'] = $row['Celular'];
        $listaDatosUsuario['Correo'] = $row['Correo'];
        $i++;
      }
      
        echo json_encode($listaDatosUsuario);
        
    }
    else
    {
      http_response_code(404);
    }
    
 ?>
