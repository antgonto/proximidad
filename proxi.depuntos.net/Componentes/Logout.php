<?php

include ('../db/conexion.php'); // Inlcuye el archivo de conexion
$conn = OpenCon(); //Se abre la conexion
include('../Funciones/Globales/f_globales.php'); //Incluye las funciones globales   
session_start(); //Inicia la sesion para poder ver el $_SESSION
$Usuario = $_SESSION['nombre']; //Usuario es igual al nombre de la persona de la sesion

//Se actualiza la tabla usuarios y se coloca como N el campo activo donde el usuario sea igual al de la sesion
$update_activo = "  UPDATE Usuarios 
                        SET Activo = 'N' 
                        WHERE Usuario = '$Usuario' ";
                        
    $res = mysqli_query($conn, $update_activo);



// remove all session variables
session_unset();

// destroy the session
session_destroy();

//Se redirije al main site
header('Location: https://proxi.depuntos.net/');



?>
