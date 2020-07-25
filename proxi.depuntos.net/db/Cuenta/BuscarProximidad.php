<?php

/**
 * Nombre: BuscarProximidad
 * URL: db/Cuenta/BuscarProximidad.php
 * Buscar si hay usuarios cercanos
 */
 
include ('../conexion.php');
include('../../Funciones/Globales/f_globales.php');
$conn = OpenCon();

$respuesta = '';
$Usuario = Get_SessionID();

$listaUsuarios = [];

    $sql = " SELECT Latitud, Longitud
             FROM Usuarios 
             WHERE Activo = 'Y'
             AND Usuario != '$Usuario' ";
    
    $result = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0)
    {
        while($row = mysqli_fetch_assoc($result))
      {
          
        $listaUsuarios['Latitud'] = $row['Latitud'];
        $listaUsuarios['Longitud'] = $row['Longitud'];
        
      }
        
        echo json_encode($listaUsuarios);
        
    }
    else
    {
        echo $rowcount;
      //http_response_code(404);
    }
    
 ?>
