<?php

//INICIO DE DE SESION
session_start();

$session = $_SESSION['user'];

if($session == null || $session= "" ){
  header("location:index.php");
  die();
}



include("scripts/validacion_webkey.php");
//$fp = fopen("webkey.txt", "r");
//$contents = fread($fp, filesize("webkey.txt"));
//echo $contents;
getSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/abrirPestañas.js"></script>
  <script src="https://kit.fontawesome.com/479e83529b.js" crossorigin="anonymous"></script>
  <title>¿Quién quiere ser millonario?</title>
</head>

<body>
  <div class="menu">
  <button class="btnx" id="ayuda" data-toggle="tooltip" data-placement="bottom" title="Dele click a buscar participante para iniciar.">Ayuda <i class="fas fa-question-circle"></i></button>
    <button class="btnx" id="ayuda" onclick="volverInicio2()">Volver<br><i class="fas fa-arrow-left"></i></button>
    
  </div>
  <div class="logo2">
      <img src="img/logoesri.png" width=100%>
    </div>
    <div class="logo3">
      <img src="img/cuelogo1.png" width=100%>
    </div>
  <div id="ventana" class="ventana">
    <a href="javascript:cerrarInstrucciones()"><div id="cerrar"> <img src="img/cerrar.png" alt=""> </div></a>
    <div>
      <span style="font-size: 230%; font-weight: bold;" class="amarillo">I</span>
    </div>
    <div>
      <br>
      <span style="font-weight: bold;" class="amarillo">1.</span> El sistema seleccionara un participante del Go To Webinar al azar para jugar <br>
      Quien quiere ser millonario y ganar increibles premios, debes estar atento pues tu nombre podrá 
      aparecer en la pantalla. <br> <br>
      <span style="font-weight: bold;" class="amarillo">2.</span> Una vez el sistema seleccione la persona a participar, se debe dar click 
      al boton "Jugar". <br> <br>
      <span style="font-weight: bold;" class="amarillo">3.</span> En el tablero encontraras la pregunta, y debajo las 4 posibles respuestas, una vez se tengas la respuesta,<br>
      se la indicaras al presentador, el cual dara click a la opción correspondiente.<br> <br>
      <span style="font-weight: bold;" class="amarillo">4.</span> Si la respuesta es correcta seguiras avanzando, podras ver en la parte derecha de la pantalla, en que<br>
      pregunta te encuentras y las faltantes para el premio mayor.<br><br>
      <span style="font-weight: bold;" class="amarillo">5.</span> Tienes 3 ayudas, la llamada a un panelista, el 50/50 y la ayuda del publico, en el momento que desees usarla,<br>
      debes informar al presentador, recuerda que solo podras utilizar cada ayuda solo una vez durante el juego.<br>
      
    </div>
  </div>
  <div>
    <div class="logo">
      <img src="img/logofinal.png" width=40.5%>
    </div>
    <div class="contenedor">

      <div class="pregunta">
        Bienvenido al juego de Quien quiere ser millonario, <br> elija una opción:
      </div>
    </div>
  </div>
  <script src="index.js"></script>
  <div class="grid-container">
  </div>

  <div class="millonarioinicio">

    <!-- Primera fila de botones -->
    <div class="millonario__item">
      <div class="opciones">
        <div class="opciones__item">
          <button id="btn" class="button fondoA" onclick="abrirInstrucciones()"><span class="amarillo">A:</span>
            Instrucciones</button>
        </div>

        <div class="opciones__item">
          <button id="btn" class="button fondoB" onclick="abrirEscogerJugador()"><span class="amarillo">B:</span> Buscar
            participante</button>
        </div>
      </div>
    </div>
  </div>
</body>
<footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Diseñado por el Semillero de Innovación Geográfica GeoGeeks - 2021
  </div>
</footer>

</html>