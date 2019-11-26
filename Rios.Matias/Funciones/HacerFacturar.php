<?php

session_start();

include '../DB/AccesoDatos.php';
date_default_timezone_set("America/Argentina/Buenos_Aires");
$Objeto=new stdClass();
$HoraSalida=mktime();
$FechaSalida=Date("d-m-yyyy H:i:s");



$query =$BaseDeDatos->prepare("select v_patente ,v_horario_ingreso from Vehiculos");
$query->execute();     
$datos= $query->fetchAll(PDO::FETCH_ASSOC); 



foreach ($datos as $vehiculos) 
{
    if ($vehiculos['v_patente'] == $_GET['Patente'])    
      {
          
          $HoraEntrada = $vehiculos['v_horario_ingreso'];
          $FechaEntrada = Date("d-m-yyyy H:i:s",$vehiculos['v_horario_ingreso']);
          

          $Diff = $HoraSalida - $HoraEntrada;
    $PMin=0;
    $Pseg=0;      

          if ($Diff >3600)
              {
                  $PHora = (($Diff/3600)*90);
              }
              else
              {
                  if ($Diff > 60)
                  {
                    $PMin = (($Diff/60)*60);
                  }
                  else
                  {
                    $Pseg = (($Diff/1)*40);
                  }

              }



          $PrecioFinal = $PHora + $PMin + $Pseg;

          $Objeto->Precio = $PrecioFinal;
          $Objeto->FechaEntrada = $FechaEntrada;
          $Objeto->FechaSalida = $FechaSalida;
          $Objeto->Patente=$_GET['Patente'];


$query =$BaseDeDatos->prepare("insert into VehiculosFacturados (vf_patente,vf_fecha_ingreso,vf_fecha_salida,vf_precio) values ('$Objeto->Patente','$Objeto->FechaEntrada','$Objeto->FechaSalida','$Objeto->Precio')");
$query->execute();    
          
          header("location:../Paginas/FacturarOK.php?Precio=$Objeto->Precio&FechaEntrada=$Objeto->FechaEntrada&Patente=".$vehiculos['v_patente']."&FechaSalida=$Objeto->FechaSalida");   

  
        }  
  
   
  } 


?>