index.controller("cuenta_controller", function ($scope, $http) {

    //Datos usuarios
    $scope.formCuenta = {}; //Almacena datos de Form Cuenta
    $scope.Imprimir = ""; // Imprime datos importantes

    //Actualizar datos
    //Se pasan los datos por POST hacia el doc con los datos del form y si responde el file OK entonces muestra un modal 
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
        }).then(function mySuccess(response) {
            if (response.data.trim() == 'OK') {
                $(document).ready(function () {
                    $('#success_update').fadeTo(1200, 500).slideUp(500, function () {
                        $('#success_update').slideUp(500);
                    });
                });
            } else {
                $(document).ready(function () {
                    $('#fail_update').fadeTo(1200, 500).slideUp(500, function () {
                        $('#fail_update').slideUp(500);
                    });
                });
            }

        }, function myError(response) {
            console.log(response.data);
        })

    }

    //Obtener datos
    //Se obtienen los datos del usuario y se guardan en fromCuenta para luego ser desplegados
    $scope.GetDatos = function () {

        $http({
            method: "GET",
            url: "db/Cuenta/GetDatos.php",
        }).then(function mySuccess(response) {
            console.log(response.data);
            $scope.formCuenta = response.data;

        }, function myError(response) {
            console.log(response.data);
        })
    }

    //Otro
    //Se ve la localizacion del usuario
    $scope.getLocation = function () {


        if (navigator.geolocation) {
            navigator.geolocation.watchPosition($scope.showPosition());
        } else {
            $scope.Imprimir = "Geolocation is not supported by this browser.";
        }


    }

    //Muestra la posicion del usuario
    $scope.showPosition = function (position) {

        $scope.Imprimir = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;


    }

    //Guardar Ubicacion
    //Guarda la ubicacion del usuario, jala los datos de 2 <p> que son hidden en el codigo y que contienen las coord del user
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
        }).then(function mySuccess(response) {
            if (response.data.trim() == 'OK') {
                $(document).ready(function () {
                    $('#success_update').fadeTo(1200, 500).slideUp(500, function () {
                        $('#success_update').slideUp(500);
                    });
                });
                console.log('Las coord actuales han sido actualizadas')
            } else {
                $(document).ready(function () {
                    $('#fail_update').fadeTo(1200, 500).slideUp(500, function () {
                        $('#fail_update').slideUp(500);
                    });
                });
            }

        }, function myError(response) {
            console.log(response.data);
        })




    }

    //Buscar personas cercanas
    //Obtiene datos de las personas que estan cerca, pone las coordenadas en 2 <p>
    $scope.buscarProximidad = function (position) {

        $http({
            method: "GET",
            url: "db/Cuenta/BuscarProximidad.php",
        }).then(function mySuccess(response) {
            document.getElementById("extLat").innerHTML = response.data.Latitud;
            document.getElementById("extLng").innerHTML = response.data.Longitud;
            console.log('Coordenadas de amigos' + response.data)

        }, function myError(response) {
            console.log(response.data);
        })

    }

});