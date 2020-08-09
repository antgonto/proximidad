var index = angular.module('m_index', ['ngRoute', 'ngSanitize']);

//Esto permite que las paginas sean accesibles sin necesidad de recargar los datos. 

index.config(function ($routeProvider, $locationProvider) {
  $routeProvider
    .when('/', { //Main site ej: Google.com
      templateUrl: 'Componentes/Home.php' //Pagina a mostrar con ese alias
    })
    .when('/Login', { //Pagina de login por ej: Google.com/Login
      templateUrl: 'Componentes/Login.php' //Muestra el login con ese alias
    })
    .when('/Cuenta', { //Pagina de Cuenta por ej: Google.com/Cuenta
      templateUrl: 'Componentes/Cuenta.php' //Muestra la cuenta del usuario con ese alias
    })
    .when('/Mapa', {
      templateUrl: 'Componentes/Mapa.php'
    })
    .when('/Logout', {
      templateUrl: 'Componentes/Logout.php'
    })
    .otherwise({
      templateUrl: 'Componentes/Home.php'
    });

  $locationProvider.hashPrefix(''); //Define el prefijo para que esto funcione, en este caso si no hay es #

});


