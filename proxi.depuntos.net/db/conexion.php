<?php

function OpenCon() // Crea funcion OpenCon() para ser usada en los archivos de db 
 {
 $dbhost = ""; //Nombre del host de DB
 $dbuser = ""; //Nombre del usuario que usa la BD
 $dbpass = ""; //Pass del usuario que usa la BD
 $db = ""; //Nombre de la BD a acceder

 //conn va a ser un nuevo mysqli(funcion php) con los datos anteriores y sino entonces muestra error
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". mysql_error());

 return $conn; //devuelva esta conexion
 }

function CloseCon($conn) //funcion para cerrar conexion actual debe incluir la conn
 {
 $conn -> close(); //cierra conexion
 }

?>
