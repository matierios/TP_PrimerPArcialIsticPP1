<?php

session_start();
include '../DB/AccesoDatos.php';

$query =$BaseDeDatos->prepare("select usr_nombre ,usr_clave,usr_admin from Usuarios");
$query->execute();     
$datos= $query->fetchAll(PDO::FETCH_ASSOC); 


      foreach ($datos as $usuarios) 
      {
         if ($usuarios['usr_nombre'] == $_GET['Usuario'])    
            {
                if ($usuarios['usr_clave'] == $_GET['Clave'])
                    {
                        $_SESSION['usuario']=$usuarios['usr_nombre'];
                        $_SESSION['admin']=$usuarios['usr_admin'];
                        header("Location: ..\Paginas\LoginOk.php?admin=".$usuarios['usr_admin']);
                        exit;
                    } 
                else
                    {
                      echo "Fallo clave";
                     header("Location: ..\Paginas\LoginNoOK.php");
                     exit;

                    }
        
            }
          else
            {
            header("Location: ..\Paginas\UsuarioInexistente.php");
          }  
       } 
    
  
  


  

?>