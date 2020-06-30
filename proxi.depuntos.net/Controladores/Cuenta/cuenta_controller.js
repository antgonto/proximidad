index.controller("cuenta_controller", function($scope,$http){
    
    //Datos usuarios
    $scope.formCuenta = {};
    
    $scope.Imprimir = "ejemplo";
    
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
        
        console.log('llamado');
          if (navigator.geolocation) {
            navigator.geolocation.watchPosition($scope.showPosition());
          } else {
            $scope.Imprimir = "Geolocation is not supported by this browser.";
          }
        
        
    }
    
    $scope.showPosition = function (position) {
        console.log('hello');
        $scope.Imprimir = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
        
        
    }
    
    
 
    
    
    
    
    
    
    
    
    
});