<?php


//Automatizacion del token de acceso

function getToken()
{

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.getgo.com/oauth/v2/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'grant_type=refresh_token&refresh_token=eyJraWQiOiJvYXV0aHYyLmxtaS5jb20uMDIxOSIsImFsZyI6IlJTNTEyIn0.eyJzYyI6ImNhbGxzLnYyLmluaXRpYXRlIG1lc3NhZ2luZy52MS53cml0ZSBpZGVudGl0eTpzY2ltLm9yZyBpZGVudGl0eTpzY2ltLm1lIHJlYWx0aW1lLnYyLm5vdGlmaWNhdGlvbnMubWFuYWdlIG1lc3NhZ2luZy52MS5ub3RpZmljYXRpb25zLm1hbmFnZSBzdXBwb3J0OiBtZXNzYWdpbmcudjEuc2VuZCBpZGVudGl0eTogd2VicnRjLnYxLndyaXRlIHdlYnJ0Yy52MS5yZWFkIG1lc3NhZ2luZy52MS5yZWFkIGNvbGxhYjogdXNlcnMudjEubGluZXMucmVhZCBjci52MS5yZWFkIiwibHMiOiIxYWQ2Yjk4OC03ZGQzLTQ1MTMtYTNjYy0xYmE5MzFjMmVkMGUiLCJvZ24iOiJwd2QiLCJhdWQiOiI4MGQxYTQxZC0yZTU2LTQ2NTktOTc3ZS0wNzljZWQ2NTEwMmIiLCJzdWIiOiIzMDAwMDAwMDAwMDA0NDYxMjMiLCJqdGkiOiI0NTU3ZTE2ZS05MTFhLTQ0MjQtYTRhZC1mNTRiNzUzYjA1NmMiLCJleHAiOjE2MjY0Njg0NjksImlhdCI6MTYyMzg3NjQ2OSwidHlwIjoiciJ9.g9oyvlmdJDBkd4_WAir9tunItnr3xTMKYz-Y_TQBuS4APQviz21u155IuLnZCDg6J38GQJLAbhfKvz1PWdkvJL7Mf6iXOwLhK1-WRVZy2wUKgyzGtrWwT-VIPwUjJOknl9JdummS11YSeQXCYnEbk_yHk3Xqwsf6nT_m5hfdYnyHpItIFBbbAWUtLw3WaSduIu_PVaEhQwy4qbVUpHk_sMbUnx-9gSxkstOTlXZNwyvBwJYE53hmzamnmGyMK7Ne_6O0QpMEM_-Bg50vVx0gIrpDznxYioaRFpP9q-KR5VL9N2k4OOI91D2SwiT5xhcdPwEjdqgJxVJ8aB7zNLykTw',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Basic ODBkMWE0MWQtMmU1Ni00NjU5LTk3N2UtMDc5Y2VkNjUxMDJiOm9EWkdIbElRUFVhMXNkWUFJaDRzSTNDRA=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;

  //Obtener token de acceso en una variable 
  $item = json_decode($response, true);
  return $item;
  
}



function conectar()
{

$item = getToken();
$token = $item["access_token"];
$organizerKey = $item["organizer_key"];
$accountsKey = $item["account_key"];
$token2 = "Bearer " . $token;
$urlwebinnars = 'https://api.getgo.com/G2W/rest/v2/organizers/'.$organizerKey.'/webinars?fromTime=2021-06-20T00:00:00Z&toTime=2022-06-21T00:00:00Z&page=0&size=64';



  //OBTENER TODOS LOS WEBINARS 
  
  $curl = curl_init();



curl_setopt_array($curl, array(

  CURLOPT_URL => $urlwebinnars,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: ' .$token2
  ),

));



$response2 = curl_exec($curl);



curl_close($curl);
  

$itemweb = json_decode($response2, true);
//echo $response2;
return $itemweb;



//echo $response2;

}





//Validar web key

function validarWebkey($WebinarKey)
{
  $validacion = false;
  $itemweb = conectar();

  for ($i = 0; $i < sizeof($itemweb["_embedded"]["webinars"]); $i++) {
    if (strcmp($WebinarKey, ($itemweb["_embedded"]["webinars"][$i]["webinarKey"])) === 0) {
      $validacion = true;
    
    }
  }
  if ($validacion == true) {
    return $validacion;
  } else {
    return $validacion;
  }


}






//TRAER DATOS DE LAS SECCIONES

function getSession()
{

  $item = getToken();
  $token = $item["access_token"];
  $organizerKey = $item["organizer_key"];
  $accountsKey = $item["account_key"];
  $token2 = "Bearer " . $token;
  $fp = fopen("webkey.txt", "r");
  $contents = fread($fp, filesize("webkey.txt"));
  $urlsession = 'https://api.getgo.com/G2W/rest/v2/organizers/' . $organizerKey . '/' . 'webinars/' . $contents . '/sessions';


  $curl = curl_init();




  curl_setopt_array($curl, array(
    CURLOPT_URL => $urlsession,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: ' . $token2
    ),
  ));

  $response2 = curl_exec($curl);

  curl_close($curl);
  //echo $response2;

  $item2 = json_decode($response2, true);

  return $item2["_embedded"]["sessionInfoResources"][(sizeof($item2["_embedded"]["sessionInfoResources"]) - 1)]["sessionKey"];
}



//traer asistentes 

function getasistentes()
{
  $item = getToken();
  $token = $item["access_token"];
  $organizerKey = $item["organizer_key"];
  $token2 = "Bearer " . $token;
  $fp = fopen("webkey.txt", "r");
  $contents = fread($fp, filesize("webkey.txt"));

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.getgo.com/G2W/rest/v2/organizers/' . $organizerKey . '/webinars' . '/' . $contents . '/registrants',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: ' . $token2
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;
  $item = json_decode($response, true);

  return $item;
}
