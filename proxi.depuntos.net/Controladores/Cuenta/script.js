///////////////////////////
//
//Variables
//
///////////////////////////

//Latitud y longitud actuales
var latitud = 1;
var longitud = 1;
/////////////////////////////

var rangoCircular = {} // ubicaciones para mostrar
var limites = 0; // limites del circulo
var marcador = { lat: 0, lng: 0 }; // marcador a añadir

var McDonalds = { lat: 9.962226, lng: -84.074271 }; //Coordenada de prueba

var map = new google.maps.Map(document.getElementById("demo"), {
  zoom: 14,
  center: { lat: 9.935711, lng: -84.109923 }
});


    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      latitud = position.coords.latitude;
      longitud = position.coords.longitude;
      console.log('Actualizar Ubicacion lista -> Coord Actuales -> ' + latitud, longitud);
      var coord = latitud + "," + longitud;
      
      //Mandar a cambiar el <p>
      var showLat = document.getElementById("showLat");
        showLat.innerHTML = latitud;
        
      var showLng = document.getElementById("showLng");
        showLng.innerHTML = longitud;
    }
    


////////////////////////////////////////////////////////////////////////////////////
//Crear rango circular
function crearRangos() {

  rangoCircular = {
    UBICACION: {
      center: {
        lat: latitud,
        lng: longitud
      },
      rango: 500
    }
  };
  console.log('circulos listos')

}
////////////////////////////////////////////////////////////////////////////////////


// Verifica si existe alguien cerca
function verificarProximidad() {

 var extLat = parseFloat(document.getElementById("extLat").innerHTML);
 var extLng = parseFloat(document.getElementById("extLng").innerHTML);
 //var extLat = document.getElementById("extLat").innerHTML;
 //var extLng = document.getElementById("extLng").innerHTML;

 var coordProximidad = { lat: extLat, lng: extLng };

console.log('lat -> /' + extLat + '/  Long -> /' + extLng + '/')

 var marker3 = new google.maps.Marker({
    position: coordProximidad,
    map: map
  });

  var verifica = limites.contains(coordProximidad);
  if (verifica) {
    alert('SI esta dentro del rango');
  } else {
    alert('NO esta dentro del rango');
  }

}


function iniciarMap() {

  //navigator.geolocation.watchPosition(showPosition);

}

//Crea el Mapa con la ubicacion del usuario
function Mapa() {
  var x = document.getElementById("demo");
  x.innerHTML = "listo";
  
  
  var coord = { lat: latitud, lng: longitud };
  map = new google.maps.Map(document.getElementById('demo'), {
    zoom: 14,
    center: coord
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map
  });
  
  for (var circulo in rangoCircular) {
    
    var Circulo = new google.maps.Circle({
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
      map: map,
      center: rangoCircular[circulo].center,
      radius: rangoCircular[circulo].rango
    });
    limites = Circulo.getBounds();

  }

}

    