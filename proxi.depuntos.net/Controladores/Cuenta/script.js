///////////////////////////
//NOTA GENERAL 
//Todo lo que tenga console.log() solo imprime en consola algo 
///////////////////////////

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

//Aqui se crea el mapa previamente, esto para que exista y se pueda agregar un marker 
var map = new google.maps.Map(document.getElementById("demo"), {
  zoom: 14, //Que tan cerca debe estar la visualizacion
  center: { lat: 9.935711, lng: -84.109923 } //El centro del mapa donde el usuario va a ver
});

//Verifica si el navegador es compatible y llama la funcion showPosition()
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

//Obtiene la latitud y longitud y crea coord para cambiar el <p> hidden del html para mostrar las coord del usuario
function showPosition(position) {
  latitud = position.coords.latitude; //obtiene lat
  longitud = position.coords.longitude; //obtiene long
  console.log('Actualizar Ubicacion lista -> Coord Actuales -> ' + latitud, longitud);
  var coord = latitud + "," + longitud; // crea coord con lat, long

  //Mandar a cambiar el <p>
  var showLat = document.getElementById("showLat");
  showLat.innerHTML = latitud;

  var showLng = document.getElementById("showLng");
  showLng.innerHTML = longitud;
}



////////////////////////////////////////////////////////////////////////////////////
//Crear rango circular
function crearRangos() {

  //Crea una lista de objetos donde el primero se llama UBICACION. 
  //Cada uno de los objetos va a aparecer en el mapa con un marcador, por eso es importante solo crear uno con las coord del usuario
  rangoCircular = {
    UBICACION: { //Nombre del objeto. Puede ser cualquiera ej: Orlando, Paris, Barcelona, etc. 
      center: { //centro
        lat: latitud, //lat
        lng: longitud //long
      },
      rango: 500 //Esto indica que tan amplio va a ser el rango del circulo 
    }
  };
  console.log('circulos listos')

}
////////////////////////////////////////////////////////////////////////////////////


// Verifica si existe alguien cerca
function verificarProximidad() {

  var extLat = parseFloat(document.getElementById("extLat").innerHTML); //extLat contiene lo que tenia el <p> en el html y lo convierte a float
  var extLng = parseFloat(document.getElementById("extLng").innerHTML); //extLong contiene lo que tenia el <p> en el html y lo convierte a float

  //Las coordProximidad es la lat y long que estaban en el html 
  var coordProximidad = { lat: extLat, lng: extLng };

  console.log('lat -> /' + extLat + '/  Long -> /' + extLng + '/')

  //Crea un marcador con la posicion de coordProximidad en el mapa map 
  var marker3 = new google.maps.Marker({
    position: coordProximidad,
    map: map
  });

  //Verifica si esta o no dentro del circulo 
  var verifica = limites.contains(coordProximidad); //Funcion contain verifica si la coordProximidad esta dentro de los limites del circulo 
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
  var x = document.getElementById("demo"); //asigna a x demo, para que se muestre ahi lo que tenga x 
  x.innerHTML = "listo"; //Escribe listo en el html donde este el ID = demo 


  var coord = { lat: latitud, lng: longitud }; // Crea la coordenada con la del usuario
  //Aqui crea un nuevo mapa llamado map 
  map = new google.maps.Map(document.getElementById('demo'), {
    zoom: 14, //que tan cerca se ve el mapa
    center: coord //el punto donde vemos el mapa 
  });
  //Crea el marcador en la ubicacion del usuario para que se vea que esta ahi
  var marker = new google.maps.Marker({
    position: coord, //posicion del marker
    map: map //mapa en el cual imprime el marcador
  });

  //Por cada uno de los objetos que tenga el rangoCircular 
  for (var circulo in rangoCircular) {

    //Por cada objeto de rangoCircular crea Circulo, que crea un circulo en cada coord que este en rangoCircular
    var Circulo = new google.maps.Circle({
      strokeColor: "#FF0000", //Estilo
      strokeOpacity: 0.8, //Estilo
      strokeWeight: 2, //Estilo
      fillColor: "#FF0000", //Estilo
      fillOpacity: 0.35, //Estilo
      map: map, //Mapa en el que lo crea
      center: rangoCircular[circulo].center, // Dice cual es el centro del circulo
      radius: rangoCircular[circulo].rango //Dice que tan grande va a crear el circulo
    });
    limites = Circulo.getBounds(); //Crea limites para que sea los bordes del circulo. Para luego ver si hay otra coord dentro de este

  }

}

