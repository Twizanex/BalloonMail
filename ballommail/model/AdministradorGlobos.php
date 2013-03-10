<?php
/**
 * Lógica de la aplicación relacionada con corrientes
 * @author Margarita
 *
 */
class AdministradorGlobos {

	function __construct()
	{

	}

	/**
	 * Los globos se guardan en la carpeta globos.
	 * Retorna el array de globos de la bd.: key, value=array (nombre, foto) ...
	 */
	function getGlobos() {
		$globosDAO= new EntityDAO("globos");
		$globosResult=$globosDAO->getAll();
		$globos= array();
		$contador=0;
		while ($globo=$globosDAO->fetchArray($globosResult)) {						 			  
			$globos[$contador]= array( idGlobo => $globo['idGlobo'], nombre => $globo['nombre'], imagen => $globo['imagen']);
			$contador=$contador+1;
		}
		return $globos;
	}

}
?>