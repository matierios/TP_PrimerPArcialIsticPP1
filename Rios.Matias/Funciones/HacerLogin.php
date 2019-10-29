<?php

$archivo=fopen('..\Archivos\RegistroUsuarios.txt','r');

while(!feof($archivo)) 
{
  $json = json_decode(fgets($archivo));

  if ($json->Usuario == $_GET['Usuario'])    
  {
      if ($json->Clave == $_GET['Clave'])
      {
            header("Location: ..\Paginas\LoginOk.php?Login=$json->Usuario");
            fclose($archivo);
            exit();
      } 
      else
      {
          header("Location: ..\Paginas\LoginNoOK.php");
          fclose($archivo);     
          exit();
      }
        
  }  
  
}  


 header("Location: ..\Paginas\UsuarioInexistente.php");
 fclose($archivo);
    exit();

?>