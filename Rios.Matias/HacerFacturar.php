<?php

$Objeto=new stdClass();
$archivo=fopen('VehiculosIngresos.txt','r');
date_default_timezone_set("America/Argentina/Buenos_Aires");
$FechaActual=date("H:i:s");

while(!feof($archivo)) 
{
  $json = json_decode(fgets($archivo));

  if ($json->Patente == $_GET['Patente'])    
  {
       #$Dif=date_diff(date_create($FechaActual),date_create($json->Horario));
   $FechaSalida = substr($json->Horario,8,14);
   $dteStart = new DateTime($FechaActual);
   $dteEnd   = new DateTime($FechaSalida);
   $dteDiff  = $dteStart->diff($dteEnd);
   echo "Fecha Actual: : ",$FechaActual;
   echo "  Fecha Salida: ", $FechaSalida;
   $Final = $FechaActual-$FechaSalida;
   $Hora=$dteDiff->format("%h");
   $Min=$dteDiff->format("%i");

   if ($Hora >0)
   {
    $PHora = $Hora*60;
   }

   if ($Min >=30)
   {
    $PMin = 30;
   }

   $PrecioFinal = $PHora + $PMin;

   $Objeto->Precio = $PrecioFinal;
   $Objeto->FechaSalida = $FechaSalida;
   $Objeto->FechaActual=$FechaActual;
   $Objeto->Patente=$_GET['Patente'];
   header("location:FacturarOK.php?Precio=$Objeto->Precio&FechaSalida=$Objeto->FechaSalida&Patente=$Objeto->Patente");   

  
  }  
  
}  

?>