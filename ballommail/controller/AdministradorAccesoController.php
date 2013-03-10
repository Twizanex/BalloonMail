<?php



/**
 * Acceso a datos transversales, que pueden ser requeridos
 * en todas las funciones diseñadas.
 *
 * Session::getInstance()->userId (id del usuario logueado)
 * Session::getInstance()->nombres (nombre de usuario logueado)
 * Session::getInstance()->usuario (email)
 *
 * @author Margarita Buriano
 *
 */

class AdministradorAccesoController{

	private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	} 

	
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function login() {        
        $data["message"]="prueba";
		$this->view->echoView("corrientes-listado.php",$data);
	}	
	
		public function verHomeAdmin() {        
        $data["message"]="prueba";
		$this->view->echoView("corrientes-listado.php",$data);
	}	

}