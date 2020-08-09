<?php

    function verifica_login(){ //Verifica si el usuario esta logeado 
        session_start(); //abre la sesion

        //Si el usuario esta logeado no haga nada 
        if(isset($_SESSION['session']) && $_SESSION['session'] == true){
            
    
        }else{ //Sino

            //Dirija usuario al Login
            echo "<script> alert('Por favor ingresar'); </script>";
            header('location: Login.php');
            
        }
    }
    
    //funcion logout 
    function Logout(){
        session_start(); //Abre sesion

        //Si el usuario esta logeado devuelva true
        if(isset($_SESSION['session']) && $_SESSION['session'] == true){
        
            return true;
    
        }else{ //sino false
            
            return false;
            
        }
    }
    
    //Funcion de obtener el sesion ID del usuario
    function Get_SessionID() {
        session_start(); //Abre la sesion 
        $Usuario = $_SESSION['nombre']; // El usuario es igual al nombre de usuario de la sesion 
        
        return $Usuario; //devuelva el usuario
        
    }
    
 
?>