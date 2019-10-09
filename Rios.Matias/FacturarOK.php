<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://olavarria.soluparking.com.ar/Portal/images/isoE.png">

    <title>Facturacion</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar --><nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Registro.php">Registrarse<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Login.php">Login</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="IngresoVehiculo.php">Check-IN</a>
            </li>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Facturar.php">Check Out</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="ListadoFacturado.txt">Facturados</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Precios.php">Mas Informacion</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container" >
      <h1 align="center">Debe Abonar</h1>
     <h2 align="center"> 
      <?php 
        echo $_GET['Precio']," $";

        $miobjeto=new stdClass();
        $miobjeto->Patente=$_GET['Patente'];
        $miobjeto->FechaSalida =$_GET['FechaSalida'];        

        $archivo=fopen('VehiculosFacturados.txt','a');
        fwrite($archivo,json_encode($miobjeto)."\n");
        fclose($archivo);

       ?>
     </h2>
      <p align="center" class="lead">Gracias por confiar en nosotros</code>.</p>
    </main>

    =========================================================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="popper.min.js"></script>
  </body>
</html>
