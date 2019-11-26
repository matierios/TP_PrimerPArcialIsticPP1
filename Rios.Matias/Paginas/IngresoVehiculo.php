<?php  

session_start();
?>

<!doctype html>
<html lang="es">
  <head>
    
    <title>Patente</title>

<?php include ('../Headers/Header.php'); ?>
  </head>

    <!-- Begin page content -->
    <main role="main" class="container">

      <h1>Ingresar vehiculo<h1>
        
        <form action="..\Funciones\HacerIngreso.php" class="text-center">
                <p align= "center">Patente:</p>
                <input type="text" name="Patente" value="" text-align="center">
                <br><br>
                <input align="center" type="submit" value="Guardar">
          </form> 
    </main>  
  </body>
</html>
