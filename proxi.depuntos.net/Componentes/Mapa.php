<!DOCTYPE html>
<html>

<head>
    
    <script src="../Controladores/Cuenta/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=getLocation"></script>
</head>

<body>

  <p>Click the button to get your coordinates.</p>

  <button onclick="getLocation()">Try It</button>
  <button onclick="Mapa()">Print It</button>

  <p id="demo" style="width: 300px; height: 300px;"></p>

  <script>

function hola(){
    
    console.log('hola');
}
    
  </script>

</body>

</html>