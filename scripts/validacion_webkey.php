<?php
include("conexion.php");

$WebinarKey = isset($_POST['Wk']) ? $_POST['Wk']:'';



if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  if(validarWebkey($WebinarKey) == true){
    
    $file = fopen("webkey.txt","w+")
    or die("problemas al crear archivo");
    fputs($file, $WebinarKey);
    header("Location: inicio.php");

  }else{
    echo "<script>alert('No se encontro el webbinar');</script>";
  }
  
}

?>