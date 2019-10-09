<?php

$Objeto=new stdClass();
$archivo=fopen('VehiculosIngresos.txt','r');
date_default_timezone_set("America/Argentina/Buenos_Aires");
$FechaSalida=date("H:i:s");
$CheckOut=date("d-m-y H:i:s");

while(!feof($archivo)) 
{
  $json = json_decode(fgets($archivo));

  if ($json->Patente == $_GET['Patente'])    
  {
       #$Dif=date_diff(date_create($FechaSalida),date_create($json->Horario));
   $CheckIn= $json->Horario;
   $FechaEntrada = substr($json->Horario,8,14);
   $dteStart = new DateTime($FechaEntrada);
   $dteEnd   = new DateTime($FechaSalida);
   $dteDiff  = $dteEnd->diff($dteStart);
   $Final = $FechaSalida-$FechaEntrada;
   $Hora=$dteDiff->format("%h");
   $Min=$dteDiff->format("%i");

   echo $Hora."".$Min;

   if ($Hora >0)
   {
    $PHora = $Hora*60;
   }

   if ($Min >=1)
   {
    $PMin = $Min*2;
   }

   $PrecioFinal = $PHora + $PMin;

   $Objeto->Precio = $PrecioFinal;
   $Objeto->FechaEntrada = $FechaEntrada;
   $Objeto->FechaEntrada=$FechaEntrada;
   $Objeto->Patente=$_GET['Patente'];
   header("location:FacturarOK.php?Precio=$Objeto->Precio&FechaEntrada=$json->Horario&Patente=$Objeto->Patente&FechaSalida=$CheckOut");   

  
  }  
  
} 


?>