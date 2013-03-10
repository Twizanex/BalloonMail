<?php

class PanelController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	public function colinaVacia(){
		$idUsuario= Session::getInstance()->userId;
		$contactosAdmin= new AdministradorContactos();
		$peticiones=$contactosAdmin->getSolicitudesContactoPendientes($idUsuario);
		$data['peticiones']=$peticiones;
		$this->view->echoView("hill.php", $data);

	}

	public function panelInferiorVacio(){
		$this->view->echoView("panelInferiorVacio.php");

	}

	public function panelEstadisticas(){		
		$this->view->echoView("menu-estadistica.php");
	}

	public function panelUsuarios(){		
		$this->view->echoView("menu-usuarios.php");
	}


	public function panelCorrientes(){		
		$this->view->echoView("menu-corrientes.php");
	}


}

