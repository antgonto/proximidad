<?php

include ('../db/conexion.php');
$conn = OpenCon();
include('../Funciones/Globales/f_globales.php');
session_start();
$Usuario = $_SESSION['nombre'];

$update_activo = "  UPDATE Usuarios 
                        SET Activo = 'N' 
                        WHERE Usuario = '$Usuario' ";
                        
    $res = mysqli_query($conn, $update_activo);



// remove all session variables
session_unset();

// destroy the session
session_destroy();

//echo "All session variables are now removed, and the session is destroyed.";

header('Location: https://proxi.depuntos.net/');



?>
