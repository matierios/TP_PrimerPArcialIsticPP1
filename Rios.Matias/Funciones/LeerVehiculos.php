<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
   

    <title>Vehiculos</title>
    <?php 
    include ('../Headers/Header.php'); 
    include ('../DB/AccesoDatos.php'); 
    ?>
   
  </head>
<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT60OJACXGcjyEW2E2q4xMJ1zyAk8Fvbooipr0cK2yIFf72ZQkh">

  
    <main role="main" class="container">
      <h2 class="mt-5">Lista de vehiculos Ingresados</h2>
    
        <table border="1">
          <tr>
            <th>Patente</th>
            <th>Hora Ingreso</th>
          </tr>
      <?php  
			$query =$BaseDeDatos->prepare("SELECT v_patente,v_horario_ingreso FROM Vehiculos");
      $query->execute();     
      $datos= $query->fetchAll(PDO::FETCH_ASSOC); 


        foreach ($datos as $vehiculos):?>
          
          <tr>
            <td><?php echo $vehiculos['v_patente']; ?></td>
            <td><?php echo $vehiculos['v_horario_ingreso']; ?></td>
            <?php endforeach;  ?>
          </tr>
            
          </table>
        
		</ul> 
    </main>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="popper.min.js"></script>

</body>
</html>