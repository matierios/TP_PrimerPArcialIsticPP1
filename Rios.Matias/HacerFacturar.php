<?php
$archivo=new stdClass();
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
   echo "Fecha Actual: ",$FechaActual;
   echo "Fecha Salida", $FechaSalida;
   echo "Diferencia: ",$dteDiff->format("%h");
  }  

  $Hora = $dteDiff->format("%H");

  #if ($Hora > 0)
  #{
   # $PrecioHora = 60 * $Hora;
  #}

  #$PrecioFinal = $Hora;

  echo  $Hora;
  
}  

 #header("Location: FacturarNoOK.php");
 #fclose($archivo);
  #  exit();

?>