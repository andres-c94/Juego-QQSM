<?php 
include("scripts/conexion.php");

$item =  getasistentes();

$eleccion = rand(0, (sizeof($item)-1));

$participante = $item[$eleccion]["firstName"]." ".$item[$eleccion]["lastName"];











