<?php
$miobjeto=new stdClass();
$miobjeto->Usuario=$_GET['Usuario'];
$miobjeto->Clave=$_GET['Clave'];

$archivo=fopen('..\Archivos\RegistroUsuarios.txt','a');
fwrite($archivo,json_encode($miobjeto)."\n");
fclose($archivo);

header("Location:..\Paginas\RegistroOK.php");
?>