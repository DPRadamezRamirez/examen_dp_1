<?php 
	/**
	 * 
	 */
	class objeto
	{		
		function __construct()
		{			
		}

		function ObtenerObjeto(){	
			$Respuesta = [];
			$Objeto = [
					"tipo" => "carro",
					"tamanio" => "Grande",
					"color" => "Green"
					  ];
			array_push($Respuesta, $Objeto);
			$Objeto = [
					"tipo" => "moto",
					"tamanio" => "mediana",
					"color" => "Blue"
					  ];
			array_push($Respuesta, $Objeto);
			$Objeto = [
					"tipo" => "bicicleta",
					"tamanio" => "chica",
					"color" => "Green"
					  ];
			array_push($Respuesta, $Objeto);
			$Objeto = [
					"tipo" => "avion",
					"tamanio" => "grande",
					"color" => "yellow"
					  ];
			array_push($Respuesta, $Objeto);
			$Objeto = [
					"tipo" => "lancha",
					"tamanio" => "grande",
					"color" => "Red"
					  ];
			array_push($Respuesta, $Objeto);
			$Objeto = [
					"tipo" => "moto",
					"tamanio" => "mediano",
					"color" => "Red"
					  ];
			array_push($Respuesta, $Objeto);

			return $Respuesta;
		}

		
	}
?>