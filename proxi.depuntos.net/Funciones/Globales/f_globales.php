<?php

    function verifica_login(){
        session_start();

        if(isset($_SESSION['session']) && $_SESSION['session'] == true){
            
    
        }else{
            echo "<script> alert('Por favor ingresar'); </script>";
            header('location: Login.php');
            
        }
    }
    
    function Logout(){
        session_start();

        if(isset($_SESSION['session']) && $_SESSION['session'] == true){
        
            return true;
    
        }else{
            
            return false;
            
        }
    }
    
    
    function CalculaEdad($Fecha_nac){
        $cumpleanos = new DateTime($Fecha_nac);
        $hoy = new DateTime();
        $Edad = $hoy->diff($cumpleanos);
        
        return $Edad->y;
    }
    
    
    function FormatoFecha($fecha){
        
        $nuevafecha = date("d-m-Y", strtotime($fecha));
        
        return $nuevafecha;
    }
    
    function Get_SessionID() {
        session_start();
        $Usuario = $_SESSION['nombre'];
        
        return $Usuario;
        
    }
    
    function Get_ComunidadUsuario($ID) {
        
        
        $conn = OpenCon();
        $Comunidad = "";
        
        $sql = "SELECT ID_Comunidad Comunidad
                FROM Usuarios 
                WHERE ID = '$ID' ";
        
        if($result = mysqli_query($conn,$sql)){
            
            while($row = mysqli_fetch_assoc($result))
            {
                
                $Comunidad = $row["Comunidad"];
                
            }
        }
        
        return $Comunidad;
        
        
    }
   
?>