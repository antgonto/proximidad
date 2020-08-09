<?php
include('../Funciones/Login/f_login.php'); // Incluye las funciones globales 
verifica_login(); //Verifica si el usuario ya está logeado
?>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <title>Proxi App Login</title>
    
    <!-- Bootstrap y Jquery -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap y Jquery -->
    <link href="../css/loginCSS.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/one-page-wonder.min.css" rel="stylesheet">
  
  <!-- Bootsrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
</head>
<?php include ('nav.php'); //Incluye NAV ?>

<!------ Form de login ---------->
    <div ng-controller="login_controller" style="padding-top: 50px;" ng-init="cargar()">
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Ingresar</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" 
                                ng-model="formLogin.usuario"
                                class="form-control" 
                                placeholder="Usuario" 
                                required="" 
                                autocomplete="off" 
                            />
                        </div>
                        <div class="form-group">
                            <input 
                                ng-model="formLogin.pass"
                                type="password" 
                                class="form-control" 
                                placeholder="Contraseña" 
                                value="" 
                            />
                        </div>
                        <div class="form-group">
                            <input 
                                ng-click="Login()"
                                type="submit" 
                                class="btnSubmit" 
                                value="Entrar" 
                            />
                        </div>
                    <div id='fail_login' class='alert alert-danger fade' role='alert'>
                        Credenciales incorrectas
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Crear una cuenta</h3>
                    <form method="POST">
                        <div class="form-group">
                            <input 
                                ng-model="formAsistencia.usuario"
                                type="text" 
                                class="form-control" 
                                placeholder="Usuario" 
                                required
                                autocomplete="off"
                            />
                        </div>
                        <div class="form-group">
                            <input 
                                ng-model="formAsistencia.pass"
                                type="password" 
                                class="form-control" 
                                placeholder="Contraseña" 
                                required
                                autocomplete="off"
                            />
                        </div>
                        <div class="form-group">
                            <input 
                                ng-click="CrearUsuario()"
                                type="submit" 
                                class="btnSubmit" 
                                value="Crear cuenta" 
                            />
                        </div>
                        <div id='success_register' class='alert alert-success fade' role='alert'>
                            Usuario creado con exitosamente
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div id='fail_register' class='alert alert-danger fade' role='alert'>
                            Usuario ya existe
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</html>