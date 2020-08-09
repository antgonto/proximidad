<?php

    function verifica_login(){ //verifica si el usuario esta logeado 
        session_start(); //abre sesion

        //si el usuario esta logeado 
        if(isset($_SESSION['session']) && $_SESSION['session'] == true){
            
            header('location: Cuenta.php'); //vaya a la pagina de Cuenta

        }else{
            
        }
    }

?>