# Proxi App - Aplicación de proximidad

**Ver en vivo ->** https://proxi.depuntos.net

## Alcance de la aplicación

La idea principal era poder crear una aplicación **web** que fuera capaz de poder detectar la ubicación actual del usuario, y además, poder verificar si hay otro usuario **logeado** usando la aplicación dentro del rango estabelcido. 

Entonces, la función esperada del programa es que el usuario sea capaz de ver su ubicación en un mapa, ver el rango de búsqueda de las personas cercanas marcado por un círculo en rojo, y por último que pueda verificar si tiene o no usuarios cercanos usando la aplicación. 

## Funcionalidades de la aplicación

1. Crear un nuevo usuario
2. Ingresar dentro de la aplicación
3. Actualizar los datos del usuario 
4. Obtener la ubicación del usuario
5. Guardar la ubicación de ese momento del usuario en la base de datos 
6. Crear un rango a partir de la ubicación del usuario
7. Mostrar la ubicación del usuario dentro de un mapa de Google Maps con un marcador 
8. Buscar usuario que estén utilizando la aplicación
9. Mostrar si ese usuario que está usando la aplicación está o no cerca de la posición del usuario

## Tecnologías utilizadas 

Para este proyecto se utilizaron las siguientes tecnologías:

- PHP -> 7.0.33
- Angular.js -> 1.7.8
- Bootstrap -> 4.5.0
- MySQL -> 5.6.33
- JQuery -> 3.5.1

## Guía para utilización

1. Ir a https://proxi.depuntos.net
2. Click en "Entrar" o en "Iniciar" 
3. Ingresar datos de usuario y constraseña para un nuevo usuario en sección "Crear una cuenta" y darle al botón "Crear Cuenta"
4. Ingresar los mismos datos de usuario y contraseña creados en el paso anterior en la parte de "Ingresar" y click en "Entrar"
5. Presionar los botones en el siguiente orden: "Actualizar mi ubicación", "Guardar mi ubicación", "Imprimir mapa", "Crear Rangos", "Buscar Proximidad", "Mostrar proximidad"

## Puntos importantes a tomar en cuenta 

1. Angular no se instala, se usa por medio del CDN 
2. Se necesita **una cuenta de Google Cloud** para poder usar como KEY y que el mapa de Google se muestre
3. Para replicar la base de datos se deben colocar los datos en el archivo de //db/conexion.php

## Replicar base de datos 

Este proyecto se hizo con MySQL utilizando PHPMyAdmin. Para replicar la base de datos de manera local se deben crear la siguiente tabla: 

- Usuarios

Esta tabla debe contener los siguientes campos: 

- ID
- Usuario
- Password
- Nombre
- Apellido
- Correo 
- Celular 
- Activo 
- Latitud
- Longitud

## Explicación de archivos 

### //package.json

Json con las especificaciones de los elementos usados en este proyecto. 

### //index.php

Esta página es de configuración. Muestra todas las dependencias necesarias para que Angular funcione de manera correcta. Al mismo modo permite mostrar el contenido de las otras páginas de manera dinámica. 

### //Componentes/Cuenta.php

Esta página es la que permite al usuario actualizar sus datos. Permite del mismo modo realizar las funciones principales de ubicación y búsqueda de personas cercanas. 

### //Componentes/footer.php

Muestra el footer en las páginas

### //Componentes/Home.php

Muestra un Landing page para que el usuario vea las posibilidades del sistema. 

### //Componentes/Login.php

Muestra la página para que el usuario pueda ingresar y registrarse en la aplicación.

### //Componentes/Logout.php

Esta página sirve para borrar la sesión actual del usuario 

### //Componentes/Nav.php

Este página es el navbar principal de la aplicación

### //Componentes/navInterno.php

Esta página es el navbar que se muestra en Cuenta.php

### //Controladores/index.js

Este archivo es la que redirige las páginas dentro de la aplicación para que no recarguen toda la página. 

### //Controladores/Cuenta/cuenta_controller.js

Este archivo es el controlador de la página de Cuenta. Contiene las funciones para poder actualizar los datos del usuario, al igual que que otras funciones respectivas para la parte de la localización. 

### //Controladores/Cuenta/script.js

Este archivo contiene toda la lógica de cómo obtener la localización, cómo llamar el mapa para que se despliegue en la página Cuenta, cómo crear los rangos y el punto de origen del usuario, entre otras funciones del mapa. 

### //Controladores/Login/login_controller.js

Este archivo es el controlador de la página de Login. Contiene las funciones para poder crear un nuevo usuario, al igual que las funciones necesarias para realizar el login en la página. 

### //CSS/css.css

Este es el CSS creado personalizado para la página. 

### //CSS/login.css

CSS creado especialmente para la página de Login

### //DB/conexion.php

Este archivo es de suma importancia. Es la conexión que se requiere para poder conectarse a la base de datos. Se debe llenar con los datos de la base de datos propia que se esté usando. Esta ya esquemado para ser usado con una MySQL. 

### //DB/Cuenta/ActualizarDatos.php

Archivo de DB para actualizar datos del usuario

### //DB/Cuenta/ActualiarUbicación.php

Archivo de DB para actualizar la ubicación guardada del usuario en la BD o guardarla por primera vez. 

### //DB/Cuenta/BuscarProximidad.php

Archivo de DB para buscar usuarios activos que estén usando la aplicación. Si están dentro del rango establecido de proximidad se alerta al usuario y si no lo están de igual manera se alerta al usuario. Por último muestra la ubicación de este otro usuario. 

### //DB/Cuenta/GetDatos.php

Archivo de DB que obtiene los datos del usuario para desplegarlos en la página de Cuenta. 

### //DB/Login/Crear_Usuario.php

Archivo de DB para crear un nuevo usuario en la BD. 

### //DB/Login/Login.php

Archivo de DB para la verificación del Login. 

### //DB/Funciones/Globales/f_globales.php 

Funciones de PHP creadas para ser utilizadas en cualquier parte del código. Son generales. 

### //DB/Funciones/Home/f_home.php 

Funciones de PHP creadas para ser utilizadas en la página de Home

### //DB/Funciones/Login/f_login.php 

Funciones de PHP creadas para ser utilizadas en la página de Login. 

