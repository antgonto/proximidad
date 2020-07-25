index.controller("cuenta_controller", function($scope,$http){
    
    //Datos usuarios
    $scope.formCuenta = {};
    
    $scope.Imprimir = "ejemplo";
    $scope.showCoord = "hola";
    
    //Actualizar datos
    $scope.ActualizarDatos = function () {
        $http({
        method: "POST",
        url: "db/Cuenta/ActualizarDatos.php",
        data: {
            Nombre: $scope.formCuenta.Nombre,
            Apellido: $scope.formCuenta.Apellido,
            Celular: $scope.formCuenta.Celular,
            Correo: $scope.formCuenta.Correo
        }
        }).then(function mySuccess(response){
            if(response.data.trim() == 'OK'){
                $(document).ready(function() {
                    $('#success_update').fadeTo(1200, 500).slideUp(500, function() {
                      $('#success_update').slideUp(500);
                    });
                });
            }else{
                $(document).ready(function() {
                    $('#fail_update').fadeTo(1200, 500).slideUp(500, function() {
                      $('#fail_update').slideUp(500);
                    });
                });    
            }
            
        }, function myError(response){
            console.log(response.data);
        })
        
    }
    
    //Obtener datos
    $scope.GetDatos = function () {
        
        $http({
        method: "GET",
        url: "db/Cuenta/GetDatos.php",
        }).then(function mySuccess(response){
            console.log(response.data);
            $scope.formCuenta = response.data;
            
        }, function myError(response){
            console.log(response.data);
        })
    }
    
    //Otro
    $scope.getLocation = function () {
        
        
          if (navigator.geolocation) {
            navigator.geolocation.watchPosition($scope.showPosition());
          } else {
            $scope.Imprimir = "Geolocation is not supported by this browser.";
          }
        
        
    }
    
    $scope.showPosition = function (position) {
        
        $scope.Imprimir = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
        
        
    }
    
    
    //Actualiza las coordenadas en la BD
    $scope.hooola = function () {

        
        


    }
    
    //Guardar Ubicacion
    $scope.guardarUbicacion = function (position) {
        
        $scope.latitud = document.getElementById("showLat").innerHTML;
        $scope.longitud = document.getElementById("showLng").innerHTML;
        console.log('Ubicacion actual cargada -> ' + $scope.latitud + "," + $scope.longitud);
        
        $http({
        method: "POST",
        url: "db/Cuenta/ActualizarUbicacion.php",
        data: {
            Latitud: $scope.latitud,
            Longitud: $scope.longitud
        }
        }).then(function mySuccess(response){
            if(response.data.trim() == 'OK'){
                $(document).ready(function() {
                    $('#success_update').fadeTo(1200, 500).slideUp(500, function() {
                      $('#success_update').slideUp(500);
                    });
                });
                console.log('Las coord actuales han sido actualizadas')
            }else{
                $(document).ready(function() {
                    $('#fail_update').fadeTo(1200, 500).slideUp(500, function() {
                      $('#fail_update').slideUp(500);
                    });
                });    
            }
            
        }, function myError(response){
            console.log(response.data);
        })
        
        
        
        
    }
    
    //Buscar personas cercanas
    $scope.buscarProximidad = function (position) {
        
        
        $http({
        method: "GET",
        url: "db/Cuenta/BuscarProximidad.php",
        }).then(function mySuccess(response){
            document.getElementById("extLat").innerHTML = response.data.Latitud;
            document.getElementById("extLng").innerHTML = response.data.Longitud;
            console.log('Coordenadas de amigos' + response.data)
            
        }, function myError(response){
            console.log(response.data);
        })
        
        
        
        
    }
    
    
    
    
    
    
    
    
});