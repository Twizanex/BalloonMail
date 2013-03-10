<?php
/**
 * L�gica de la aplicaci�n relacionada con vuelos
 * @author Margarita
 *
 */
class AdministradorVuelos {

	function __construct()
	{

	}


	/**
	 * Devuelve en $data todo lo requerido para mostrar los vuelos de $idUsuario
	 * Enter description here ...
	 * @param unknown_type $idContacto
	 */
	public function getEstadistica($idUsuario) {
		$administradorMensajes 	= new AdministradorMensajes();
		$mensajes_enviados 		= $administradorMensajes->getCantMensajesEnviados($idUsuario);
		$mensajes_recibidos 	= $administradorMensajes->getCantMensajesRecibidos($idUsuario);

		$mensajes_total 		= $mensajes_enviados + $mensajes_recibidos;

		$administradorRegiones 	= new AdministradorRegiones();
		$continentes 			= $administradorMensajes->getContinentesMensajes($_REQUEST['mensaje'], $idUsuario);
		$continenteId 			= $_REQUEST['cont'];

		$paises 				= $administradorMensajes->getPaisesMensajes($continenteId, $_REQUEST['mensaje'], $idUsuario);

		$data 					= array('mensajes_enviados' => $mensajes_enviados, 'mensajes_recibidos' => $mensajes_recibidos, 'mensajes_total' => $mensajes_total, 'continentes' => $continentes, 'paises' => $paises);
		$data 					= array('data' => $data);
		return $data;
	}

	/**
	 *
	 * Devuelve en $data todo lo requerido para mostrar el mapa de $idUsuario
	 * @param unknown_type $idUsuario
	 */
	public function getMapa($idUsuario) {
		$administradorRegiones 	= new AdministradorRegiones();
		$administradorMensajes 	= new AdministradorMensajes();

		$continentes 			= $administradorRegiones->getContinentes();
		$mesajes_enviados 		= array();
		foreach ($continentes as $key => $value) {
			$mesajes_enviados = array_merge($mesajes_enviados, $administradorMensajes->getPaisesMensajes($administradorRegiones->getContinenteId($key),'enviado', $idUsuario));
		}

		$mesajes_recibidos 		= array();
		foreach ($continentes as $key => $value) {
			$mesajes_recibidos 	= array_merge($mesajes_recibidos, $administradorMensajes->getPaisesMensajes($administradorRegiones->getContinenteId($key),'recibido',$idUsuario));
		}

		/*
		 * Genero los puntos para el Mapa de Gmap
		 */

		$puntos = "<script>var mensajes_enviados = [";
		foreach ($mesajes_enviados as $key => $value){
			$data = $administradorMensajes->getMensajeLatLong($key);
			$puntos .= "['<center>$key <br/>(". ballom_echo('Enviados') .": $value)</center>'," . $data['Latitude'] . ", ". $data['Longitude'] .", 0],";
		}
		$puntos .= "];";

		$puntos .= "var mensajes_recibidos = [";
		foreach ($mesajes_recibidos as $key => $value){
			$data 	 = $administradorMensajes->getMensajeLatLong($key);
			$puntos .= "['<center>$key <br/>(". ballom_echo('Recibidos') . ": $value)</center>'," . $data['Latitude'] . ", ". $data['Longitude'] .", 0],";
		}
		$puntos 	.= "];</script>";
		$puntos		 = str_replace('],];', ']];', $puntos);
		$data 		 = array('data' => array('mesajes_enviados' => $mesajes_enviados, 'mesajes_recibidos' => $mesajes_recibidos, 'puntos' => $puntos));

		return $data;
	}


}