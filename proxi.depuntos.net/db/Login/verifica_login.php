<?php

/**
 * Nombre: verifica_login
 * URL: db/Login/verifica_login.php
 * Verificar Login
 * 
 */

include '../conexion.php';
$conn = OpenCon();

$html = '';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$ID_normal = $request->id;
@$password = $request->pass;
    
  //Separa la cedula en '-'
  $ID_1 = substr($ID_normal, 0, 1);
  $ID_2 = substr($ID_normal, 1, 4);
  $ID_3 = substr($ID_normal, 5, 8);
  $ID = $ID_1."-".$ID_2."-".$ID_3;
  
  
  //Realiza la consulta de la cedula en usuarios
  
  $query = "SELECT ID,Password from Usuarios WHERE ID='$ID'";
  $result = $conn->query($query);
  $verifica_contrasena = mysqli_fetch_assoc($result);
  $hash = $verifica_contrasena['Password'];
  
  date_default_timezone_set('America/Costa_Rica');
  $fecha = date('Y-m-d H:i:s');
      
  //Si contrasena coincide
  if(password_verify($password, $hash)) {
    session_start();
    
    $nombre = "SELECT ID,Nombre from Personas WHERE ID='$ID' ";
    $resultado = $conn->query($nombre);
    $row = mysqli_fetch_assoc($resultado);
    
    
    $Rol = "SELECT Rol,Genero from Usuarios WHERE ID='$ID' ";
    $res_rol = $conn->query($Rol);
    $row1 = mysqli_fetch_assoc($res_rol);
    
    
    //INSERTAR REGISTRO LOGIN
    if($ID != "1-1706-0321"){
        $query = "INSERT INTO Registro_Login (ID_Ingreso, Fecha) VALUES ('$ID', '$fecha')";
        $conn->query($query);   
    }
    
    
    //VARIABLES DE SESSION
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['nombre'] = $row['Nombre'];
    $_SESSION['session'] = true;
    $_SESSION["rol"] = $row1['Rol'];
    $_SESSION["genero"] = $row1['Genero'];
    $html .= 'OK';
    
  }else{
      
    $message = "Datos: ID -> ".$ID." / Pass-> ".$password;
    $html .= 'NOK';
    
  }
  
  echo $html;

 ?>

