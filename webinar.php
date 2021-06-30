<?php

//INICIO DE DE SESION
session_start();

$session = $_SESSION['user'];

if($session == null || $session= "" ){
  header("location:index.php");
  die();
}


include("scripts/validacion_webkey.php");

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
  <button class="btnx" id="ayuda" data-toggle="tooltip" data-placement="bottom" title="Ingrese el id del webinar para iniciar." >Ayuda <i class="fas fa-question-circle"></i></button>
  <button class="btnx" id="ayuda" onclick="volverInicio3()">Salir<br><i class="fas fa-sign-out-alt"></i></button>
  </div>
  <div class="logo2">
      <img src="img/logoesri.png" width=100%>
    </div>
    <div class="logo3">
      <img src="img/cuelogo1.png" width=100%>
    </div>
  <div>
    <!--<div class="logo">
      <img src="img/logo2.png" width=26.5%>
    </div>-->
    <div class="logo">
      <img src="img/logofinal.png" width=40.5%>
    </div>
    
    <div class="contenedor">

      <div class="pregunta">
        Para empezar ingrese el codigo <br>  de la reunion de Go to Webinar:
      </div>
    </div>
  </div>
  <script src="index.js"></script>
  <div class="grid-container">
  </div>
  
  <div class="millonarioindex">
    <!-- Primera fila de botones -->
   
    <form action="" method="post">


<input class="input1" type="number" name="Wk">
<input class="btnxingreso2" type="submit" value="Validar" name="submit">
</form>
  </div>

</body>

<footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Diseñado por el Semillero de Innovación Geográfica GeoGeeks - 2021
  </div>
</footer>

</html>