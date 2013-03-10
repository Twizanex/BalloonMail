<?php


/**
 * Lï¿½gica de la aplicaciï¿½n relacionada con idiomas
 * @author Leandro
 *
 */
class AdministradorIdiomas {

	function __construct()
	{

	}

        /**
         *
         * Devuelve todos los idiomas en el lenguaje de la sesión.
         */
        public function getAllIdiomas() {
       	$idiomaDelIdioma=$this->getIdIdioma(Session::getInstance()->language);
		/*$countryCode=Session::getInstance()->language;
    	// Obtengo el idioma en que tienen que ser mostrados los idiomas.

		$idiomasDAO= new EntityDAO("idiomas");
    	$idiomaEnIdiomaResult= $idiomasDAO->get("id", "code='".$countryCode."'");

    	$idiomaDelIdioma=$idiomasDAO->fetchArray($idiomaEnIdiomaResult);
    	$idiomaDelIdioma=$idiomaDelIdioma['id'];
*/


    	 // Levanto todos los idiomas

    	$idiomas = array();
		$idiomasDAO= new EntityDAO("idiomas");
    	$idiomasResult= $idiomasDAO->getAll();

    	//Inicializo el dao que accede a traducciones.
	   	$traductorDAO=new EntityDAO("claveslenguajes");
		while ($idioma=$idiomasDAO->fetchArray($idiomasResult))
    		{
    			//obtengo la traducción del  idioma actual

    			$traduccionesResult=$traductorDAO->get("valor", "idIdioma=".$idiomaDelIdioma." and clave='".$idioma['nombre']."'");
				$traduccion=$traductorDAO->fetchArray($traduccionesResult);
				$valor=$traduccion['valor'];
				$traductorDAO->freeResult($traduccionesResult);

				$idiomas[$idioma['id']]= array ("id"=>$idioma['id'],"traduccion"=>$valor);
			}
		$idiomasDAO->freeResult($corrientesResult);



		return $idiomas;
	}


	public function getCountryCode($id) {
		$countryCode=Session::getInstance()->language;
    	// Obtengo el idioma en que tienen que ser mostrados los idiomas.
		$idiomasDAO= new EntityDAO("idiomas");
    	$idiomaEnIdiomaResult= $idiomasDAO->get("code", "id='".$id."'");
    	$countryCodeArray=$idiomasDAO->fetchArray($idiomaEnIdiomaResult);
    	return $countryCodeArray['code'];

	}

	public function getIdIdioma($countryCode) {
		// Obtengo el idioma en que tienen que ser mostrados los idiomas.
		$idiomasDAO= new EntityDAO("idiomas");
    	$idiomaEnIdiomaResult= $idiomasDAO->get("id", "code='".$countryCode."'");
    	$idiomaDelIdioma=$idiomasDAO->fetchArray($idiomaEnIdiomaResult);
    	$idiomasDAO->freeResult($idiomaEnIdiomaResult);
    	$idiomaDelIdioma=$idiomaDelIdioma['id'];
    	return $idiomaDelIdioma;

	}

}