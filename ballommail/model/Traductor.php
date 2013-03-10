<?php


/**
 * Traductor, lógica asociada a traducciones en la base de datos.
 * @author Margarita
 *
 */
class Traductor  {

	function __construct()
	{
	}
	/**
	 * Devuelve la traducción de una clave en el idioma indicado
	 * @param string $key (clave de una palabra)
	 * @param string $countryCode
	 * @return string: la traduccion
	 */
	public function getTraduccion($key) {
		$language=Session::getInstance()->language;
		$idioma=$this->getIdioma($language);
		$traductorDAO=new EntityDAO("claveslenguajes");
		$traduccionesResult=$traductorDAO->get("valor", "idIdioma=".$idioma." and clave='".$key."'");
		$traduccion=$traductorDAO->fetchArray($traduccionesResult);
		$traductorDAO->freeResult($traduccionesResult);
		$valor=$traduccion['valor'];
		//echo "key:".$key."traduccion: ".$traduccion['valor']."<br/>";
		return $valor;
	}

	function __destruct() {
	}


	public function getIdioma($countryCode) {
		$idiomaDAO= new EntityDAO("idiomas");
    	$idiomaResult= $idiomaDAO->get("id", "code='".$countryCode."'");
    	$idioma=$idiomaDAO->fetchArray($idiomaResult);
    	$idiomaDAO->freeResult($idiomaResult);
    	$id=$idioma['id'];
    	return $id;

	}


}