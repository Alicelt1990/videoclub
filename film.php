<html>
<body>
<?php
	class Pelicula {
		private $nombre;
		private $anio;
		private $director;
		private $alquilada;
		private $precio;
		private $fechaDevolucion;
		
		public function pelis($nombre,$anio, $director, $alquilada, $precio, $fechaDevolucion){
			$this->nombre = $nombre;
			$this->anio = $anio;
			$this->director = $director;
			$this->alquilada = $alquilada;
			$this->precio = $precio;
			$this->fechaDevolucion = $fechaDevolucion;
		}
		
		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getAnio(){
			return $this->anio;
		}

		public function setAnio($anio){
			$this->anio = $anio;
		}

		public function getDirector(){
			return $this->director;
		}

		public function setDirector($director){
			$this->director = $director;
		}

		public function getAlquilada(){
			return $this->alquilada;
		}

		public function setAlquilada($alquilada){
			$this->alquilada = $alquilada;
		}

		public function getPrecio(){
			return $this->precio;
		}

		public function setPrecio($precio){
			$this->precio = $precio;
		}

		public function getFechaDevolucion(){
			return $this->fechaDevolucion;
		}

		public function setFechaDevolucion($fechaDevolucion){
			$this->fechaDevolucion = $fechaDevolucion;
		}
		
		public function devolverPelicula($film){
			$fechaActual = date("d-m-Y");
			$fechaDevolucion = $film->getFechaDevolucion();
			
			/* Obtenemos la diferencia de días entre la fecha actual y la fecha de devolución de la película */
			$dias = (strtotime($fechaDevolucion)-strtotime($fechaActual))/86400;
			
			/* Si la diferencia es positiva no se aplica un recargo puesto que ha devuelto la película antes de la fecha prevista. 
			   En caso contrario, se le aplica el recargo estipulado teniendo en cuenta el número de días de retraso. */
			if($dias >= 0){
				$film->setAlquilada('NO');
				echo "Total: ".$film->getPrecio()."€";
			}else{
				$film->setAlquilada('NO');
				$recargo = $film->getPrecio() + abs($dias) * 1.2;
				echo "Total: ".$recargo."€";
			}
		}
	}
	?>
</body>
</html>
