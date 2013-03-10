<?php


/**
 * Lógica de la aplicación relacionada con corrientes
 * @author Margarita
 *
 */
class AdministradorCorrientes {

	function __construct()
	{

	}
	/**
	 * Asocia las corrientes al usuario
	 * @param id $idUsuario
	 * @param array de ids  de corrientes $corrientes, array de corrientes
	 */
	public function asociarCorrientesAUsuario($idUsuario, $corrientes) {
		$corrientesUsuarioDAO= new EntityDAO("corrientesusuarios");
		$corrientesUsuarioDAO->delete("idUsuario=".$idUsuario);
		foreach ($corrientes as $key=>$value) {
			$values =
	    	array(
	    	'idCorriente' => $value,
	    	'idUsuario'=> $idUsuario,
			);
			$corrientesUsuarioDAO->insert($values);
		}

	}


	public function asociarUsuarioCorriente($suscribir,$nombreCorriente, $idUsuarioLogueado) {
		$idCorriente= $this->getCorriente($nombreCorriente);
		if ($suscribir) {
			$this->suscribirUsuario("General", $idUsuarioLogueado);
		}
		else
			$this->desuscribirUsuario($idUsuarioLogueado,$idCorriente);

	}
	/**
	 *
	 * Suscribe el usuario $idUsuario a la corriente $corrienteNombre
	 * @param  $corrienteNombre
	 * @param  $idUsuario
	 */
	public function suscribirUsuario($corrienteNombre, $idUsuario) {
		$idCorriente= $this->getCorriente($corrienteNombre);
		if (! $this->estaSuscripto($idCorriente, $idUsuario)) {
			 $this->suscribir($idUsuario,$idCorriente);
		}

	}

	/**
	 * Suscribe un usuario a una corriente particular.
	 * @param $idUsuario
	 * @param  $idCorriente
	 */
	public function suscribir($idUsuario, $idCorriente) {
		$corrientesUsuarioDAO= new EntityDAO("corrientesusuarios");
		$values =
	    	array(
	    	'idCorriente' => $idCorriente,
	    	'idUsuario'=> $idUsuario,
			);
			$corrientesUsuarioDAO->insert($values);

	}

	/**
	 * Saca la suscripción de un usuario a una corriente particular.
	 * @param $idUsuario
	 * @param  $idCorriente
	 */
	public function desuscribirUsuario($idUsuario, $idCorriente) {
		$corrientesUsuarioDAO= new EntityDAO("corrientesusuarios");
		$corrientesUsuarioDAO->delete("idUsuario=".$idUsuario." and idCorriente=".$idCorriente);
	}

	/**
	 *
	 * Retorna true si el usuario se encuentra suscripto a la corriente.
	 * @param $corrienteNombre
	 * @param $idUsuario
	 */
	public function estaSuscripto($idCorriente, $idUsuario) {
		$corrientesDAO= new EntityDAO("corrientesusuarios");
    	$corrientesResult= $corrientesDAO->get("id", "idCorriente=".$name." and idUsuario=".$idUsuario);
    	$corrienteDeUsuario=$corrientesDAO->fetchArray($corrientesResult);
		if ($corrienteDeUsuario['id']) {return true;}
		return false;
	}


	/**
	 *
	 * Obtiene el id de la corriente con nombre $name
	 * @param $name
	 */
	public function getCorriente($name) {
		$corrientesDAO= new EntityDAO("corrientes");
    	$corrientesResult= $corrientesDAO->get("id", "nombre='".$name."'");
    	$corriente=$corrientesDAO->fetchArray($corrientesResult);
    	return $corriente['id'];
	}


	/**
	 *
	 * Obtiene todas las corrientes.
	 * @return un array de corrientes key(id), valor=array (id, traduccion)
	 */
	public function getCorrientes(){
		$countryCode=Session::getInstance()->language;
	    $corrientes = array();
    	$corrientesDAO= new EntityDAO("corrientes");
    	$corrientesResult= $corrientesDAO->get("*", "active=1");

    	$idiomaDAO= new EntityDAO("idiomas");
    	$idiomaResult= $idiomaDAO->get("id", "code='".$countryCode."'");
    	$idioma=$idiomaDAO->fetchArray($idiomaResult);
    	$idioma=$idioma['id'];
    	$idiomaDAO->freeResult($idiomaResult);
	   	$traductorDAO=new EntityDAO("claveslenguajes");

		while ($corriente=$corrientesDAO->fetchArray($corrientesResult))
    		{
    			$checked= false;
    			$traduccionesResult=$traductorDAO->get("valor", "idIdioma=".$idioma." and clave='".$corriente['nombre']."'");
				$traduccion=$traductorDAO->fetchArray($traduccionesResult);
				$valor=$traduccion['valor'];
				$traductorDAO->freeResult($traduccionesResult);

				$corrientes[$corriente['id']]= array ("id"=>$corriente['id'],"traduccion"=>$valor);
			}
		$corrientesDAO->freeResult($corrientesResult);
		return $corrientes;

	}


	/**
	 *
	 * Obtiene todas las corrientes a las que está suscripto el usuario $idUsuario.
	 * @return un array de corrientes key(id), valor=array (id, traduccion), checked
	 */
	public function getCorrientesDelUsuario($idUsuario){
		$countryCode=Session::getInstance()->language;
	    $corrientes = array();
    	$corrientesDAO= new EntityDAO("corrientes");
    	$corrientesResult= $corrientesDAO->get("*", "active=1");

    	$idiomaDAO= new EntityDAO("idiomas");
    	$idiomaResult= $idiomaDAO->get("id", "code='".$countryCode."'");
    	$idioma=$idiomaDAO->fetchArray($idiomaResult);
    	$idioma=$idioma['id'];
    	$idiomaDAO->freeResult($idiomaResult);
	   	$traductorDAO=new EntityDAO("claveslenguajes");

		while ($corriente=$corrientesDAO->fetchArray($corrientesResult))
    		{
    			$traduccionesResult=$traductorDAO->get("valor", "idIdioma=".$idioma." and clave='".$corriente['nombre']."'");
				$traduccion=$traductorDAO->fetchArray($traduccionesResult);
				$valor=$traduccion['valor'];
				$traductorDAO->freeResult($traduccionesResult);

				$corrientesUsuariosDAO= new EntityDAO("corrientesusuarios");
				$resultCorrienteUsuarios = $corrientesUsuariosDAO->get("idCorriente","idUsuario=".$idUsuario." and idCorriente=".$corriente['id']);
				$corrienteDelUsuario=$corrientesUsuariosDAO->fetchArray($resultCorrienteUsuarios);
				$checked=0;
				if ($corrienteDelUsuario['idCorriente']) {
					$checked=1;
				}

				$corrientes[$corriente['id']]= array ("id"=>$corriente['id'],"traduccion"=>$valor, "checked"=>$checked);
			}
		$corrientesDAO->freeResult($corrientesResult);
		return $corrientes;

	}





}