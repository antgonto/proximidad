index.controller("login_controller", function($scope,$http){
    
    //Login de usuario
    $scope.formLogin = {};
    
    //Crear usuario
    $scope.formAsistencia = {};
    
    
    
    
    //Login
    $scope.Login = function () {
        
        $http({
        method: "POST",
        url: "db/Login/Login.php",
        data: {
            Usuario: $scope.formLogin.usuario,
            Pass: $scope.formLogin.pass
        }
        }).then(function mySuccess(response){
            
            $scope.estado = response.data;
              if($scope.estado.trim() == "OK"){
                location.href = "#Cuenta";
              }else{
                $(document).ready(function() {
                        $('#fail_login').fadeTo(1200, 500).slideUp(500, function() {
                          $('#fail_login').slideUp(500);
                        });
                });
              }
            
        }, function myError(response){
            $(document).ready(function() {
                        $('#fail_login').fadeTo(1200, 500).slideUp(500, function() {
                          $('#fail_login').slideUp(500);
                        });
                });
        })
     
        
    }
    
    
    //Crear usuario
    $scope.CrearUsuario = function () {
        $http({
        method: "POST",
        url: "db/Login/Crear_Usuario.php",
        data: {
            Usuario: $scope.formAsistencia.usuario,
            Pass: $scope.formAsistencia.pass
        }
        }).then(function mySuccess(response){
            if(response.data.trim() == 'OK'){
                $(document).ready(function() {
                    $('#success_register').fadeTo(1200, 500).slideUp(500, function() {
                      $('#success_register').slideUp(500);
                    });
                });
            }else{
                $(document).ready(function() {
                    $('#fail_register').fadeTo(1200, 500).slideUp(500, function() {
                      $('#fail_register').slideUp(500);
                    });
                });    
            }
            
            
        }, function myError(response){
            $(document).ready(function() {
                    $('#fail_register').fadeTo(1200, 500).slideUp(500, function() {
                      $('#fail_register').slideUp(500);
                    });
            });
        })
    }
    
    
    
});