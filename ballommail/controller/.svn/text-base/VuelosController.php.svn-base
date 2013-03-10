<?php
class VuelosController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	/**
	 * Se invoca a esta funcionalidad cuando se hace click en el men� vuelos
	 * Estad�stica por continente y pa�s de los mensajes
	 * recibidos/ enviados /todos del usuario logueado.
	 *
	 * Recibe tres par�metros de entrada:
	 *
	 * @param $_REQUEST['mensaje']: 'enviado', significa que hay que mandar estad�stica de enviados.
	 *  'recibido', significa que hay que mandar estad�stica de recibidos.
	 * 'ver todo', significa que hay que mandar estad�stica de enviados/recibidos.
	 *
	 * @param $_REQUEST['idContinente']: el continente en particular del cual se tiene que enviar
	 * informaci�n estad�stica de los
	 * mensajes (enviados/recibidos/todos dependiente del anterior)de sus pa�ses .
	 *
	 * @param $_REQUEST['idPais']:el pa�s en particular del cual se tiene que enviar
	 * informaci�n estad�stica de los mensajes.
	 * (enviados/recibidos/todos dependiente del anterior).
	 *
	 *
	 */
	public function getEstadisticaVuelos() {
		$idUsuario 				= Session::getInstance()->userId;
		$administradorVuelos= new AdministradorVuelos();
		$data= $administradorVuelos->getEstadistica($idUsuario);
		$this->view->echoView("estadistica-vuelos.php", $data);
	}



	 /**
	 * Se invoca a esta funcionalidad cuando se hace click en el men� vuelos
	 * Parte superior (mapa con circulos marcadores, vuelos enviados/recibidos )
	 */
	public function getMapa() {
		$idUsuario 				= Session::getInstance()->userId;
		$administradorVuelos= new AdministradorVuelos();
		$data= $administradorVuelos->getMapa($idUsuario);
		$this->view->echoView("mapa.php", $data);
	}


}
