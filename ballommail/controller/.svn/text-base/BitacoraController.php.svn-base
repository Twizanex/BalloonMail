<?php

class BitacoraController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	/**
	 * Muestra el formulario para agregar entrada en la bitácora.
	 *
	 */
	public function bitacoraForm() {
		$this->view->echoView("bitacora-form.php", $data);
	}

	/**
	 *
	 * Obtiene la bitácora del usuario logueado.
	 *
	 * @param $_GET['page']
	 *
	 */
	public function getBitacora() {
		$data=$this->getBitacoraDelUsuario(Session::getInstance()->userId);
		$this->view->echoView("bitacora.php",$data);
	}


	/**
	 * Se invoca a esta funcionalidad cuando se hace click en el botón
	 * publicar.  El texto correspondiente se enviará en el request.
	 * Afecta la tabla bitacora, insertando en la misma lo que corresponde:
	 * y que se encuentra publicado .
	 *
	 * @param $_REQUEST['texto']
	 * @param $_REQUEST['page']
	 */
	public function publicarEntrada() {
		$entradasPorPagina=Config::singleton()->get('entradasPorPaginaBitacora');
		$bitacoraDAO= new EntityDAO("bitacora");
		$id= Session::getInstance()->userId;
		$values =
    	array(
    	'texto' => $_REQUEST['texto'],
    	'fechaHora'=>'now()',
		'idUsuario'=>$id,
		);
		$bitacoraDAO->insert($values);

		$data=$this->getBitacoraDelUsuario($id);
		$this->view->echoView("bitacora.php",$data);
	}

	/**
	 * Se invoca a esta funcionalidad cuando se hace click en el eliminar
	 * de una entrada de la bitácora.
	 * Se elimina dicha entrada de la tabla bitácora.
	 *
	 * @param $_GET['id']
	 * Enter description here ...
	 */
	public function eliminarEntrada() {
		$bitacoraDAO= new EntityDAO("bitacora");
		$bitacoraDAO->delete("id=".$_REQUEST['id']);
		$this->getBitacora(Session::getInstance()->userId);

	}

	/**
	 *
	 * devuelve la bitácora de un contacto en $_REQUEST['idContacto'] ...
	 */
	public function verBitacoraContacto(){
		$data=$this->getBitacoraDelUsuario($_REQUEST['idContacto']);
		$this->view->echoView("contacto-bitacora.php",$data);
	}



	public function getBitacoraDelUsuario($idUsuario) {
		$page=$_REQUEST['page'];
		$entradasPorPagina=Config::singleton()->get('entradasPorPaginaBitacora');
		//echo "page".$page;
		$bitacoraDAO= new EntityDAO("bitacora");
		$result = $bitacoraDAO->getPage("*", $entradasPorPagina, $page, "idUsuario=".$idUsuario, "fechaHora", "desc");
		$size=$bitacoraDAO->getTotalFilas($result);

		$bitacora = array();
		while ($entrada=$bitacoraDAO->fetchArray($result)) {
			$bitacora[$entrada['id']]= array ("id"=>$entrada['id'],
			"texto"=>$entrada['texto'],"fechaHora"=>$entrada['fechaHora'],"idUsuario"=>$entrada['idUsuario']
			);
		}
		$bitacoraDAO->freeResult($result);
		$data['bitacora']=$bitacora;

		$data['page']=$page;
		if ($page-1>0){
			$data['paginaAnterior']=$page-1;
		}
		$data['paginaSiguiente']=$page+1;

		$entradasPorPagina=Config::singleton()->get('entradasPorPaginaBitacora');
		$data['totalPaginas']=ceil($size/$entradasPorPagina);

		if ($size==0) {
			$data['page']=0;

		}
		return $data;

		//$this->view->echoView("bitacora.php",$data);

	}

}

