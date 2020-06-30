var latitud = 1;
var longitud = 1;

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      latitud = position.coords.latitude;
      longitud = position.coords.longitude;
      console.log(latitud, longitud, ' listo');
      var coord = document.getElementById("coordenadas");
      coord.innerHTML = latitud + " , " + longitud;
    }
    
    
    function print(){
        var y = document.getElementById("demo");
        y.innerHTML = "listo";
    }


function iniciarMap() {

  navigator.geolocation.watchPosition(showPosition);

}

function Mapa() {
  var x = document.getElementById("demo");
  x.innerHTML = "listo";
  var coord = { lat: latitud, lng: longitud };
  var map = new google.maps.Map(document.getElementById('demo'), {
    zoom: 10,
    center: coord
  });
  var marker = new google.maps.Marker({
    position: coord,
    map: map
  });

}

    