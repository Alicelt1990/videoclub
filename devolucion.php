<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Videoclub</title>
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <?php
      /* Carga del archivo pelicula.php que contiene la clase Pelicula */
      include 'film.php';

	  /* Creación de 5 películas de ejemplo */
	  $pelicula1= new Pelicula('Tiburón', 1975, 'Steven Spielberg', 'NO', 4, '');
      $pelicula2= new Pelicula('Tiburón 2', 1978, 'Jeannot Szwarc', 'SI', 5, '26-05-2016');
      $pelicula3= new Pelicula('Batman 1', 2005, 'Christopher Nolan', 'NO', 6, '');
	  $pelicula4= new Pelicula('Batman 2', 2008, 'Christopher Nolan', 'SI', 10, '22-04-2016');
	  $pelicula5= new Pelicula('Batman 3', 2012, 'Christopher Nolan', 'SI', 8, '24-04-2016');
      
	  /* Almacenamiento de las películas en un array */
	  $peliculas[] = $pelicula1;
      $peliculas[] = $pelicula2;
      $peliculas[] = $pelicula3;
	  $peliculas[] = $pelicula4;
	  $peliculas[] = $pelicula5;
      
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
	  $enc = false;
	  $alquilada = false;
    ?>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">Volver</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Programación PHP</h3>
      </div>

      <div class="jumbotron">
        <h1>Videoclub</h1>
        <p class="lead">Ejercicio Feedback</p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Búsqueda</h4>
          <p>Introduzca el nombre de la película que desea devolver</p>
          <form action="devolucion.php" method="post">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre"/>
            <p><button type="submit" class="btn btn-success">Devolver</button></p>
          </form>
        </div>

        <div class="col-lg-6">
				<?php
					if(!is_null($nombre)){
				?>
				<div class="alert alert-success">
					<?php
						/* Recorremos el array de películas */
						foreach($peliculas as $film){
							/* Devolvemos la película a partir de su nombre */
							if(strcmp($nombre, $film->getNombre()) == 0){
								$enc = true;
								
								/* Si la película se encuentra alquilada podemos devolverla */
								if($film->getAlquilada() == 'SI'){
									$alquilada = true;
									$film->devolverPelicula($film);
								}
							}
						}
						  
						if(!$enc){
						  echo 'No existe ninguna película ese nombre';
						}
						
						if($enc && !$alquilada){
						  echo 'No puede devolver una película que no se encuentra alquilada';
						} 
					}
					?>
				</div>
		</div>
	</div>
    </div>
  </body>
</html>