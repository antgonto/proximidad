index.controller("login_controller", function($scope,$http){
    $scope.estado = "OK";
    $scope.id = "";
    $scope.pass = "";
    
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
            location.href="http://proxi.depuntos.net";
          }else{
            console.log('error intentelo de nuevo')
          }
            
        }, function myError(response){
            console.log('todo mal');
        })
     
        
    }
    
    
    //Crear usuario
    $scope.CrearUsuario = function () {
        console.log('antes de enviar');
        $http({
        method: "POST",
        url: "db/Login/Crear_Usuario.php",
        data: {
            Usuario: $scope.formAsistencia.usuario,
            Pass: $scope.formAsistencia.pass
        }
        }).then(function mySuccess(response){
            console.log('todo bien');
            
        }, function myError(response){
            console.log('todo mal');
        })
    }
    
    
});