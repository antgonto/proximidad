<?php //Abre etiqueta PHP
include('../Funciones/Globales/f_globales.php'); // Incluye las funciones globales 
verifica_login(); //Verifica si el usuario ya está logeado
    
?>

<html>

<head><meta charset="gb18030">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Proxis</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/css.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/one-page-wonder.min.css" rel="stylesheet">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<?php
include('navInterno.php'); //Incluye nav
?>

<body>
 <div class="container" ng-controller="cuenta_controller" data-ng-init="GetDatos()">
     <div class="row">
         <div class="padding">
            <div class="col-xl-12">
                <h1 class="display-4">Mi Cuenta</h1>    
            </div>
         </div>
     </div>
     <div class="row">
     <!-- ACTUALIZAR DATOS -->
         <div class="col-xs-12 col-md-6 col-xl-6">
             <div class="card" style="margin-bottom:30px;">
                <div class="card-header text-white bg-primary" style="text-align:center;">Datos</div>
                <div class="card-body">
                    <form method="POST">
                    <div class="row">
                    <!-- Form de de datos del usuario -->
                        <div class="col-xs-12 col-md-12 col-xl-12">
                            <div class="form-group">
                                <div class="card-title">Usuario: </div>
                                <input type="text" class="form-control" required="" autocomplete="off" ng-model="formCuenta.Usuario" readonly>
                            </div>
                            <div class="form-group">
                                <div class="card-title">Nombre: </div>
                                <input type="text" class="form-control" required="" autocomplete="off" ng-model="formCuenta.Nombre">
                            </div>
                            <div class="form-group">
                                <div class="card-title">Apellido: </div>
                                <input type="text" class="form-control" required="" autocomplete="off" ng-model="formCuenta.Apellido">
                            </div>
                            <div class="form-group">
                                <div class="card-title">Celular: </div>
                                <input type="text" class="form-control" required="" autocomplete="off" ng-model="formCuenta.Celular">
                            </div>
                            <div class="form-group">
                                <div class="card-title">Correo: </div>
                                <input type="text" class="form-control" required="" autocomplete="off" ng-model="formCuenta.Correo">
                            </div>
                            <input type="submit" class="btn btn-success" value="Actualizar datos" ng-click="ActualizarDatos()" />
                            <div id='success_update' class='alert alert-success fade' role='alert'>
                                Datos actualizados
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div id='fail_update' class='alert alert-danger fade' role='alert'>
                                No se pudo actualizar los datos
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div> 
         </div>
         <!-- MAPA -->
         <div class="col-xs-12 col-md-6 col-xl-6">
             <div class="card" style="margin-bottom:30px;">
                <div class="card-header text-white bg-primary" style="text-align:center;">Mapa</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-xl-12">
                            <div class="form-group">
                                <button class="btn btn-primary" onclick="getLocation();">Actualizar ubicación</button>    
                                <button class="btn btn-info" ng-click="guardarUbicacion();">Guardar mi ubicación</button>
                                <button class="btn btn-success" onclick="Mapa()">Imprimir mapa</button>    
                            </div>
                            <div class="form-group">
                                <button class="btn btn-warning" onclick="crearRangos()">Crear rangos</button>    
                                <button class="btn btn-success" ng-click="buscarProximidad()">Buscar proximidad</button>
                                <button class="btn btn-success" onclick="verificarProximidad()">Mostrar proximidad</button>
                            </div>
                            
                            
                            
                            
                            <br></br>
                    
                            <p id="showLat" hidden></p>
                            <p id="showLng" hidden></p>
                            <p id="extLat" hidden></p>
                            <p id="extLng" hidden></p>
	                        <p id="demo" style="width: 100%; height: 500px;"></p>
                        </div>
                    </div>
                </div>
            </div> 
         </div>
     </div>
 </div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
  


</body>

</html>
