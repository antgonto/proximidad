<?php 

include('Funciones/Home/f_home.php');
include('Funciones/Globales/f_globales.php');
//verifica_login();

?>
    
    <!doctype html>
    <html ng-app="m_index">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- Favicon -->
        <!--link rel='icon' href="img/Logo_favicon_32.ico" type='image/x-icon'/ -->
        
        <!-- Iconos y letra -->
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        
        <!-- Tema CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/css.css" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="css/one-page-wonder.min.css" rel="stylesheet">
        
        <!-- Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-route.min.js"></script> <!-- Router Link para que direccione sin recargar -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-animate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.7.8/angular-sanitize.min.js"></script> <!-- Para que sirva el ng-bind-html -->
        
        <!-- Angular Controladores -->
        <script src="Controladores/index.js"></script>
        <script src="Controladores/Login/login_controller.js"></script>
        <script src="Controladores/Home/c_personas.js"></script>
        <script src="Controladores/Cuenta/cuenta_controller.js"></script>
        <script src="Controladores/Cuenta/script.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
        
        
        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      </head>
      
      <!-------------------- SECCION DINAMICA --------------------->
      <body>
      <!-- NAV -->
      <?php //include ('Componentes/nav.php'); ?>
      <div>
          <!-- IMPRIME LA SECCION DINAMICA -->
        <div ng-view></div>
      </div>
      
      
      <!--------------------- REFERENCIAS  ---------------------->
      
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
      </body>
      
      <!-------------------- Footer ----------------------->
      <footer>
          <?php include ('Componentes/footer.php'); ?>
      </footer>
    </html>

<?php 

//header('location: ejemplo.php');

?>