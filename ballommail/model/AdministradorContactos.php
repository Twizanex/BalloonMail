<?php
/**
 * Lógica de la aplicación relacionada con contactos
 * @author Margarita
 *
 */
class AdministradorContactos {

	function __construct()
	{

	}


	/**
	 * Se crea un nuevo contacto para un usuario logueado. Lo deja pendiente
     * de aceptación.
     * Enter description here ...
	 * @param unknown_type $idUsuario
	 * @param unknown_type $idContacto
	 */
    public function crearPeticionContacto($idUsuario, $idContacto) {
	$values =
    	array(
    	'aceptado' => 0,
		'idUsuario' => $idUsuario,
		'idUsuarioContacto' => $idContacto
		);

		$contactosDAO= new EntityDAO("contactos");
		return $contactosDAO->insert($values);
    }

    /**
     *
     * Retorna si existe o no $idContacto como  contacto de $idUsuario
     * @param unknown_type $idUsuario
     * @param unknown_type $idContacto
	 * @return true or false
     */
    public function existeContacto($idUsuario, $idContacto) {
		$contactosDAO= new EntityDAO("contactos");
    	$contactosResult= $contactosDAO->get("id", "idUsuario='".$idUsuario."' and idUsuarioContacto='".$idContacto."'");
    	$contactosArray=$contactosDAO->fetchArray($contactosResult);
    	$contactosDAO->freeResult($contactosResult);
    	if ($contactosArray['id']) return true;
    	return false;

    }

    /**
     *
     * Bloquea el contacto $idContacto del usuario $idUsuario
     * @param unknown_type $idUsuario
     * @param unknown_type $idContacto
     */
    public function bloquearContacto($idUsuario,$idContacto) {
		$values =
    	array(
    	'bloqueado' => 1,
		'fechaHoraBloqueo' => 'now()',
		);
		$where = array('idUsuario='. $idUsuario.' and idUsuarioContacto='.$idContacto);
		$contactosDAO= new EntityDAO("contactos");
		return $contactosDAO->update($values,$where);
    }

    /**
     *
     * Desbloquear el contacto $idContacto del usuario $idUsuario
     */
    public function desbloquearContacto($idContacto) {
		$values =
    	array(
    	'bloqueado' => 0
		);
		$where = array('id='. $idContacto);
		$contactosDAO= new EntityDAO("contactos");
		return $contactosDAO->update($values,$where);
    }

    /**
     *
     * Elimina el contacto $id de la tabla contactos.
     */
    public function eliminarContacto($id) {
		$contactosDAO= new EntityDAO("contactos");
		return $contactosDAO->delete("id=".$id);
    }

    /**
     * Retorna true si el contacto $idContacto de $idUsuario se encuentra bloqueado
     * @param unknown_type $idUsuario
     * @param unknown_type $idContacto
     */
    public function bloqueado($idUsuario,$idContacto) {
		$contactosDAO= new EntityDAO("contactos");
		$contactosResult= $contactosDAO->get("bloqueado", "idUsuario='".$idUsuario."' and idUsuarioContacto='".$idContacto."'");
    	$contactosArray=$contactosDAO->fetchArray($contactosResult);
    	if ($contactosArray['bloqueado']) return true;
    	return false;
    }

    public function getSolicitudesContactoPendientes($idUsuario) {
		$contactosDAO= new EntityDAO("contactos");

		$contactosResult= $contactosDAO->get("*", "idUsuarioContacto='".$idUsuario."' and aceptado='0'");
    	$contactos = array();
    	$usuarioAdmin= new AdministradorUsuarios();
    	while ($contacto=$contactosDAO->fetchArray($contactosResult)) {

    		$idSolitante= $contacto['idUsuario'];

    		$usuarioSolicitante=$usuarioAdmin->getUsuario($idSolitante);

			$contactos[$contacto['id']]=array ("nombres"=>$usuarioSolicitante['nombres'],
						"apellidos"=>$usuarioSolicitante['apellidos'],

			);
    	}
    	return $contactos;

    }

    /**
     *
     * Acepta la solicitud $idSolicitud
     * @param unknown_type $idUsuario
     * @param unknown_type $idContacto
     */
    public function aceptarContacto($idSolicitud) {
		$values =
    	array(
    	'aceptado' => 1,
		'fechaHoraAceptacion' => 'now()',
		);
	//	$where = array('id'=> $idSolicitud);
		$where = array('id='."'".$idSolicitud."'");
		$contactosDAO= new EntityDAO("contactos");

		return $contactosDAO->update($values,$where);
    }


    /**
	 * Si acepto a un contacto. Yo ya paso @author Margarita
	 *	ser su contacto, pero también lo debo agregar como contacto mio.
	 *	debe pasar a ser un contacto mio, ya aceptado.
	 * @param unknown_type $idUsuario
	 * @param unknown_type $idContacto
	 */
    public function crearContactoAceptado($idUsuario, $idContacto) {
	$values =
    	array(
    	'aceptado' => 1,
		'fechaHoraAceptacion' => 1,
    	'idUsuario' => $idUsuario,
		'idUsuarioContacto' => $idContacto
		);

		$contactosDAO= new EntityDAO("contactos");
		return $contactosDAO->insert($values);
    }

    /**
     *
     * Devuelve la petición $id,
     * @param unknown_type $id
     */
    public function getPeticion($id) {
		$contactosDAO= new EntityDAO("contactos");
		$contactosResult= $contactosDAO->get("*", "id='".$id."'");
    	$contactosArray=$contactosDAO->fetchArray($contactosResult);
    	return $contactosArray;
    }


}