<?php
class AdministradorRegiones{

	function __construct()
	{

	}

	/**
	 * Obtiene todos los continentes.
	 * @return un array de continentes key(id), valor=array (id, traduccion)
	 */
	function getContinentes() {
		$continentesDAO = new EntityDAO("continentes");
		$result = $continentesDAO->get('*', '', null);
		while ($continente = $continentesDAO->fetchArray($result)) {
			$continentes_array[$continente['nombre']] = $continente['id'] ;
		}
		return $continentes_array;
	}

	/**
	 * Obtiene todos los países del continente $idContinente.
	 * @param integer $idContinente
	 * @return un array de países key(id), valor=nombre
	 */
	function getPaises($idContinente) {
		$paises = array();
    	$paisesDAO= new EntityDAO("paises");
    	$paisesResult=$paisesDAO->get("nombre, id","idContinente='".$idContinente."'","nombre");
    	$vacio=true;
		while ($pais=$paisesDAO->fetchArray($paisesResult))
    		{	$paises[$pais["id"]]=array ("id"=>$pais["id"],"nombre"=>$pais["nombre"]);
    			$vacio=false;
    		}
		if ($vacio) {
			return false;
		}
		return $paises;

	}

	/**
	 * Obtiene todos los estados del país $idPais.
	 * @param integer $idPais
	 * @return un array de países key(id), valor=nombre
	 */
	function getEstados($idPais) {
		$estados = array();
    	$estadosDAO= new EntityDAO("estados");
    	$estadosResult=$estadosDAO->get("nombre, id","idPais='".$idPais."'","nombre");
    	$vacio=true;
		while ($estado=$estadosDAO->fetchArray($estadosResult))
    		{	$estados[$estado["id"]]=$estado["nombre"];
    			$vacio=false;
    		}
		if ($vacio) {
			return false;
		}
		return $estados;
	}


	/**
	 * Obtiene todos los países.
	 * @return un array de países key(id), valor=array (id, traduccion)
	 */
	function getAllPaises() {
		$paises = array();
    	$paisesDAO= new EntityDAO("paises");
    	$paisesResult=$paisesDAO->get("*",null, "nombre");
    	$vacio=true;
		while ($pais=$paisesDAO->fetchArray($paisesResult))
    		{	$paises[$pais["id"]]=$pais["nombre"];
    			$vacio=false;
    		}

    	if ($vacio) {

			return false;
		}

		return $paises;

	}

	/**
	 * Devuelve el nombre del país específicado.
	 * @param $idPais
	 */
	function getNombrePais($idPais) {
		$paisesDAO= new EntityDAO("paises");
    	$paisesResult=$paisesDAO->get("nombre", "id=".$idPais);
    	$pais=$paisesDAO->fetchArray($paisesResult);
    	$paisesDAO->freeResult($paisesResult);
    	return $pais["nombre"];
	}

	/**
	 * Devuelve el nombre del país específicado.
	 * @param $idPais
	 */
	function getNombreEstado($idEstado) {
		$estadosDAO= new EntityDAO("estados");
    	$estadosResult=$estadosDAO->get("nombre", "id=".$idEstado);
    	$estado=$estadosDAO->fetchArray($estadosResult);
    	$estadosDAO->freeResult($estadosResult);
    	return $estado["nombre"];
	}

	/**
	 * Devuelve el id del continente específicado.
	 * @param $name
	 */
	function getContinenteId($name) {
		$continentesDAO = new EntityDAO("continentes");
		$result 		= $continentesDAO->get('id', "nombre like '" . $name . "'", null);
		$continente 	= $continentesDAO->fetchArray($result);

		$continente_id 	= $continente['id'];
		return $continente_id;
	}
}