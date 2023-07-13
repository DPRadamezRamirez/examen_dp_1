<?php 
	/**
	 * 
	 */
	require_once('modelo/valida.php');
	require_once('datos/objeto.php');
	class api
	{
		private $metodo = null;
		
		public function __construct($metodo)
		{			
			$this->metodo = $metodo;			
		}

		public function call(){
			try {
				$tipo = "1";
				if(isset($_GET['tipo'])){
					$tipo = $_GET['tipo'];
				}
				if(isset($_GET['nombre'])){
					$nombre = $_GET['nombre'];
				}
				switch ($this->metodo) {
					case 'GET':
						if($tipo == "1"){
							$this->MetodoGet();
						}else{
							$this->exportar($nombre);
						}
						break;			
					default:					
						break;
				}				
			} catch (Exception $e) {
				
			}				
		}

		public function MetodoGet(){			
			try {
				$ObjetoColor = new objeto();				
				$Validar = new valida();
				$Valor = [];
				
				$Validar->CreaRespuesta("0", "", $Valor);
				
				echo json_encode($Validar->ObtenerResponse(), JSON_PRETTY_PRINT  | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
			} catch (Exception $e) {
				$Validar->CreaRespuesta("-1", "Error", []);
			}
			$Response = $Validar->ObtenerResponse();
		}
		public function exportar($nombreArchivo){
			try{
				$Validar = new valida();
				$rutatemp = "temp/";
				$ValorObjeto = $ObjetoColor->ObtenerObjeto();

				$nombreArchivo = $nombreArchivo . ".json";
				file_put_contents($rutatemp . $nombreArchivo, json_encode($ValorObjeto), FILE_APPEND | LOCK_EX);
				$fileName = basename($nombreArchivo);
				$filePath = "../".$rutatemp . $fileName;
				if(!empty($fileName) && file_exists($filePath)){
					//echo "rutatemp: " . $rutatemp . ", nombreArchivo: " . $nombreArchivo . ", filePath: " . $filePath  . ", json: " . json_encode($Respuesta);

					//Define header information
					header('Content-Description: File Transfer');
					header('Content-Type: txt/html');
					header("Cache-Control: no-cache, must-revalidate");
					header("Expires: 0");
					header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
					header('Content-Length: ' . filesize($filePath));
					header('Pragma: public');
					//Clear system output buffer
					flush();

					//Read the size of the file
					readfile($filePath);

					//Terminate from the script
					die();
				}
			}catch(Exception $e) {
				$Validar->CreaRespuesta("-1", "Error", []);
			}
		}

	}
?>