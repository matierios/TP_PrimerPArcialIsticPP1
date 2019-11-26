<?php

session_start();

include '../DB/Accesodatos.php';

$miobjeto=new stdClass();
$miobjeto->Patente=$_GET['Patente'];
date_default_timezone_set("America/Argentina/Buenos_Aires");
$miobjeto->Horario=mktime();

$alpha6=substr($_GET['Patente'], 0,3);
$digit6 = substr($_GET['Patente'], 3,3);
$alpha17=substr($_GET['Patente'], 0,2);
$digit7=substr($_GET['Patente'], 2,3);
$alpha27=substr($_GET['Patente'], 5,2);


if (strlen($_GET['Patente']) == 6)
	{
			if (ctype_alpha($alpha6)==true)
				{
					if (ctype_digit($digit6)==true) 
						{
							$query =$BaseDeDatos->prepare("insert into Vehiculos (v_patente,v_horario_ingreso) values ('$miobjeto->Patente','$miobjeto->Horario')");
							$query->execute();			

							header("Location: ..\Paginas\VehiculoOK.php");
						}
					else
						{
							header("Location: ..\Paginas\VehiculoNoOK.php");

						}	
				}		 
			else
				{
					header("Location: ..\Paginas\VehiculoNoOK.php");
				}		
		
	}
else
	{
		if (strlen($_GET['Patente']) == 7)
		{
			 if (ctype_alpha($alpha17)==true)
			 	{
			 		if (ctype_digit($digit7)==true) 
			 			{
			 				if (ctype_alpha($alpha27)==true)
			 					{
			 						$query =$BaseDeDatos->prepare("insert into Vehiculos (v_patente,v_horario_ingreso) values ('$miobjeto->Patente','$miobjeto->Horario')");
									$query->execute();			

									header("Location: ..\Paginas\VehiculoOK.php");
			 					}
			 				else
			 					{
			 						header("Location: ..\Paginas\VehiculoNoOK.php");			
			 					}	
			 			}
			 		else
			 			{
			 				header("Location: ..\Paginas\VehiculoNoOK.php");
			 			}	
			 	}
			 else
			 	{
			 		header("Location: ..\Paginas\VehiculoNoOK.php");
			 	}	
		}
	else
		{
			 header("Location: ..\Paginas\VehiculoNoOK.php");
		}

	}

?>