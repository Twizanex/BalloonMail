<?php

class GlobosController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	/**
	 *
	 * Recupera globos definidos.
	 * Muestra los globos existentes en el formato correspondiente.
	 * @param $_GET['page']
	 *
	 */
	public function getGlobos() {
		$administradorGlobos = new AdministradorGlobos();
		$data["globos"]=$administradorGlobos->getGlobos();
		$this->view->echoView("globos.php",$data);
	}

	/**
	 *
	 * Guarda en la sesion el id del globo seleccionado.
	 * Muestra el globo seleccionado como marcado.
	 */
	public function seleccionarGlobo() {
		Session::getInstance()->__set("idGlobo", $_REQUEST["id"]);
		$data["globoSeleccionado"]=$_REQUEST["id"];
		$this->view->echoView("globos.php",$data);
	}


}

