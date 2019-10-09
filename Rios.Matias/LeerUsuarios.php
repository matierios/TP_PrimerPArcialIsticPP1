<!DOCTYPE html>
<html>
<body>

<h2 align="center">Listado de usuarios</h2>

<ul>
<?php

$miArchivo = fopen("RegistroUsuarios.txt", "r") ;
while(!feof($miArchivo)) 
{
  $objeto = json_decode(fgets($miArchivo));
  echo "<li>".$objeto->Usuario."</li>";
}
fclose($miArchivo);
?>
</ul> 

</body>
</html>