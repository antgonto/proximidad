<!DOCTYPE html>
<html>

<head>
    
    <!-- Se incluye el archivo Script para el uso de los mapas -->
    <script src="../Controladores/Cuenta/script.js"></script>

    <!-- Se llama la funcion getLocation() y se ejecuta el mapa. En la parte YOUR_KEY debe estar la Key propia que da Google -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEYcallback=getLocation"></script>
</head>

<body>

  <p>Objetener coordenadas.</p>

  <button onclick="getLocation()">Try It</button>
  <button onclick="Mapa()">Print It</button>

<!-- Aqui se muestra el mapa -->
  <p id="demo" style="width: 300px; height: 300px;"></p>

</body>

</html>