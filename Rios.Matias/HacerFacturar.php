<?php

$archivo=fopen('VehiculosIngresos.txt','r');

while(!feof($archivo)) 
{
  $json = json_decode(fgets($archivo));

  if ($json->Patente == $_GET['Patente'])    
  {
       echo date_diff(date_create($json->Patente),date_create(getdate()));
  }  
  
}  

 #header("Location: FacturarNoOK.php");
 #fclose($archivo);
  #  exit();

?>