var index = angular.module('m_index', ['ngRoute', 'ngSanitize']);

index.config(function($routeProvider, $locationProvider) {
      $routeProvider
      .when('/', {
        templateUrl : 'Componentes/Home.php'
      })
      .when('/Login', {
        templateUrl : 'Componentes/Login.php'
      })
      .when('/Logout', {
        templateUrl : 'Logout.php'
      })
      .otherwise({
        templateUrl : 'Componentes/Home.php'
      });
      
      $locationProvider.hashPrefix('');
      
    });


