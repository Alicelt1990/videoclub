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
    <link href="styles.css" rel="stylesheet">
  </head>

  <body>

    <?php
      /* Carga del archivo pelicula.php que contiene la clase Pelicula */
      include_once 'film.php';

	  /* Creación de 5 películas de ejemplo */
      $pelicula1= new Pelicula('Tiburón', 1975, 'Steven Spielberg', 'NO', 4, '');
      $pelicula2= new Pelicula('Tiburón 2', 1978, 'Jeannot Szwarc', 'SI', 5, '26-04-2016');
      $pelicula3= new Pelicula('Batman Begins', 2005, 'Christopher Nolan', 'NO', 6, '');
	  $pelicula4= new Pelicula('El caballero Oscuro', 2008, 'Christopher Nolan', 'SI', 10, '22-04-2016');
	  $pelicula5= new Pelicula('El caballero Oscuro:La leyenda Renace', 2012, 'Christopher Nolan', 'SI', 8, '24-04-2016');
      
	  /* Almacenamiento de las películas en un array */
	  $peliculas[] = $pelicula1;
      $peliculas[] = $pelicula2;
      $peliculas[] = $pelicula3;
	  $peliculas[] = $pelicula4;
	  $peliculas[] = $pelicula5;
      
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
      $enc = false;
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
          <p>Introduzca el nombre, año de producción o director de la película</p>
          <form action="busqueda.php" method="post">
            <input type="text" class="form-control" placeholder="Nombre, año de producción o director" name="nombre"/>
            <p><button type="submit" class="btn btn-success">Buscar</button></p>
          </form>
        </div>

        <div class="col-lg-6">
          <?php
            if(!is_null($nombre)){
          ?>  
             <table class="stripped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Año</th>
						<th>Director</th>
						<th>Alquilada</th>
						<th>Precio</th>
						<th>Fecha de Devolución</th>
						
					<?php
					/* Recorremos el array de películas */
					foreach($peliculas as $film){
					  /* Buscamos la película por nombre, año o nombre del director */
					  if(strcmp($nombre, $film->getNombre()) == 0 || strcmp($nombre,strval($film->getAnio())) == 0 || strcmp($nombre, $film->getDirector()) == 0){
					?>
			  
					</tr>
				</thead>
				  
				<tbody>    
					<tr>
						<td><?=$film->getNombre()?></td>
						<td><?=$film->getAnio()?></td>
						<td><?=$film->getDirector()?></td>
						<td><?=$film->getAlquilada()?></td>
						<td><?=$film->getPrecio()?></td>
						<td><?=$film->getFechaDevolucion()?></td>
					</tr>
				</tbody>
					  
					<?php
					$enc = true;
					  }
				  }
					?>
			</table>
			<?php
				if(! $enc){
				  echo 'No existe ninguna película ese nombre';
				} 
			}
		  ?>
        </div>
      </div>
    </div>
  </body>
</html>