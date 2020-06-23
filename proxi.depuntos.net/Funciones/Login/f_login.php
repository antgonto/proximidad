<?php

    function verifica_login(){
        session_start();

        if(isset($_SESSION['session']) && $_SESSION['session'] == true){
            
            header('location: Home.php');

        }else{
            
        }
    }

?>