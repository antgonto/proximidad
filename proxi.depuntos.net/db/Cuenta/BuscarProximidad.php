<?php

/**
 * Nombre: BuscarProximidad
 * URL: db/Cuenta/BuscarProximidad.php
 * Buscar si hay usuarios cercanos
 */
 
include ('../conexion.php');//Incluye file de conexion
include('../../Funciones/Globales/f_globales.php'); // Incluye el file de funciones globales
$conn = OpenCon(); //Abre la conexion

$respuesta = ''; //Crea respuesta
$Usuario = Get_SessionID(); //El usuario es igual al usuario de la sesion actual. Funcion en globales

$listaUsuarios = []; //Crea lista de usuarios

    //SELECT -> Lat y Long desde -> Tabla usuarios -> Donde Actvo sea 'Y' Y ADEMAS -> Usuario sea  diferente al usuario actual 
    $sql = " SELECT Latitud, Longitud
             FROM Usuarios 
             WHERE Activo = 'Y'
             AND Usuario != '$Usuario' ";
    
    $result = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($result);
    //Si el resultado del query es mayor a 0 
    if($rowcount > 0)
    {
      //Mientras hayan datos
        while($row = mysqli_fetch_assoc($result))
      {
        
        $listaUsuarios['Latitud'] = $row['Latitud']; // Agregue a listaUsuarios[Latitud] el campo Latitud del query
        $listaUsuarios['Longitud'] = $row['Longitud']; // Agregue a listaUsuarios[Longitud] el campo Longitud del query
        
      }
        
        echo json_encode($listaUsuarios); //Envia el encode de la lista para que se pueda mostrar biene en el JS 
        
    }
    else
    {
      http_response_code(404); //Sino envie error 404
    }
    
 ?>
