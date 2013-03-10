
<?php
/**
 *
 * Clase que encapsula comportamiento para usuario que se
 * encuentra logueado.
 * Parámetro/s utilizado en las funciones:
 * @author Margarita
 * Session::getInstance()->userId (id del usuario logueado)
 * Session::getInstance()->nombres (nombre de usuario logueado)
 * Session::getInstance()->usuario (email)

 */

class ContactoController {

 	private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	 /**
     * Se invoca a esta accion cuando se hace click en "Bloquear Contacto"
     * en un mensaje recibido (ver-mensaje-recibido.php).
     * Esta accion se puede seguir en la pantalla de hill, haciendo click en
     * un mensaje recibido.
     *
     * @param $_GET['idUsuario']
     */

    public function bloquearContacto() {

    	$idUsuario= Session::getInstance()->userId;
    	$idMensaje= $_GET['idMensaje'];
		$mensajesAdmin= new AdministradorMensajes();
		$idContacto=$mensajesAdmin->getRemitente($idMensaje);

    	$contactosAdmin= new AdministradorContactos();

    	if ($contactosAdmin->bloqueado($idUsuario, $idContacto)) {
			$data['message']=$nombre.ballom_echo('contactAlreadyLocked');
		}
		else {
			$udpated= $contactosAdmin->bloquearContacto($idUsuario, $idContacto);
			if ($udpated) {
				$data['message']=ballom_echo('contactLockOk');
			}
			else
				$data['message']=ballom_echo('contactLockFail');

		}
		$this->view->echoView("mensaje-confirmacion.php",$data);
    }


    public function bloquearContactoConfirmacion() {
    	$idMensaje= $_GET['idMensaje'];
		$mensajesAdmin= new AdministradorMensajes();
		$idContacto=$mensajesAdmin->getRemitente($idMensaje);
		$usuariosAdmin= new AdministradorUsuarios();
		$usuario= $usuariosAdmin->getUsuario($idContacto);

		$data['message']= sprintf(ballom_echo("confirmLock"),$usuario['nombres']);
		$data['idMensaje']= $idMensaje;
		$data['menuOption']= "bloquearContacto";
		$this->view->echoView("mensaje-confirmacion-consulta.php",$data);
    }


	 /**
     * Se invoca a esta accion cuando se hace click en "Desbloquear Contacto"
     * desde la lista de contactos.
     *
     * @param $_GET['idUsuario']
     */

    public function desbloquearContacto() {
		//$idUsuario= Session::getInstance()->userId;
    	$id= $_GET['id'];
    	$contactosAdmin= new AdministradorContactos();
		$updated=$contactosAdmin->desbloquearContacto($id);
		$this->getContactos();
    }

	 /**
     * Se invoca a esta accion cuando se hace click en "Eliminar Contacto"
     * desde la lista de contactos.
     *
     * @param $_GET['id]
     */

    public function deleteContacto() {
		//$idUsuario= Session::getInstance()->userId;
    	$id= $_GET['id'];
    	$contactosAdmin= new AdministradorContactos();
		$updated=$contactosAdmin->eliminarContacto($id);
		$this->getContactos();
    }
	 /**
     * Se invoca a esta accion cuando se hace click en el link "Petición de contacto"
     * en un mensaje recibido (ver-mensaje-recibido.php)
     *
     * Esta función recibe como parámetro en el request el idUsuario de quien se quiere solicitar contacto.
     * Agrega una entrada a la tabla Contacto, siempre y cuando el usuario logueado no haya
     * solicitado previamente su contacto (y se espera confirmación).
     * Si al crear contacto no hubo problemas poner en $data el mensaje ok, caso contrario,
     *  establecer el mensaje de error correspondiente. Ver contactRequestOk, contactRequestFail.
     *
     * Redirecciona a la vista.
     * .
     *
     * @param $_GET['idUsuario']
     */
    public function peticionContacto() {
    	$idUsuario= Session::getInstance()->userId;
    	$idMensaje= $_GET['idMensaje'];
		$mensajesAdmin= new AdministradorMensajes();
		$idPosibleContacto=$mensajesAdmin->getRemitente($idMensaje);

		$usuariosAdmin= new AdministradorUsuarios();

		$usuario=$usuariosAdmin->getUsuario($idPosibleContacto);
    	$nombre= $usuario['nombres'];


		$contactosAdmin= new AdministradorContactos();

		if ($contactosAdmin->existeContacto($idUsuario, $idPosibleContacto)) {
			$data['message']=$nombre.ballom_echo('contactExist');
		}
		else {
			$created= $contactosAdmin->crearPeticionContacto($idUsuario, $idPosibleContacto);
			if ($created) {
				$data['message']=ballom_echo('contactRequestOk')." ".$nombre;
			}
			else
				$data['message']=ballom_echo('contactRequestFail')." ".$nombre;

		}
		$this->view->echoView("mensaje-confirmacion.php",$data);

    }


    public function peticionContactoConfirmacion() {
    	$idMensaje= $_GET['idMensaje'];
		$mensajesAdmin= new AdministradorMensajes();
		$idContacto=$mensajesAdmin->getRemitente($idMensaje);
		$usuariosAdmin= new AdministradorUsuarios();
		$usuario= $usuariosAdmin->getUsuario($idContacto);
		$data['message']= sprintf(ballom_echo("confirmContactRequest"),$usuario['nombres']);
		$data['idMensaje']= $idMensaje;
		$data['menuOption']= "peticionContacto";
		$this->view->echoView("mensaje-confirmacion-consulta.php",$data);

    }




    /**
     *
     * Acepta la petición de contacto de un usuario que le solicitó al usuario
     * logueado el contacto el contacto.
     * indicar fechaHoraDeAceptacion
     * @param id
     */
    public function aceptarContacto(){
    	$idUsuario=Session::getInstance()->userId;
    	$id=$_GET['idSolicitud'];
		$adminContactos= new AdministradorContactos();
		$peticion= $adminContactos->getPeticion($id);

		$updated=$adminContactos->aceptarContacto($id);
		if ($updated) {
			$data['message']=ballom_echo("acceptContactOk");
		}
		else
			$data['message']=ballom_echo("acceptContactFail");

		$adminContactos->crearContactoAceptado($idUsuario, $peticion['idUsuario']);


		$this->view->echoView("mensaje-confirmacion.php",$data);
    }

    /**
     * Se ejecuta esta acción al hacer click en la opción del menú
     * Contactos.
     *
     * Obtiene los contactos del usuario logueado y envía a la página
     * correspondiente.
     * Si $_REQUEST['idContacto'] viene no nulo entonces ese se debe reenviar a la
     * página $_REQUEST['page']para que se muestre como seleccionado.
     * en la página.
     */
    public function getContactos() {
    	$idUsuario= Session::getInstance()->userId;
    	$contactosDAO = new EntityDAO("contactos");
    	$usuarioDAO = new EntityDAO("usuarios");
    	$contactosResult= $contactosDAO->get("id, idUsuarioContacto, bloqueado", "aceptado='1'  and idUsuario=".$idUsuario." and idUsuarioContacto <> ".$idUsuario);
    	$contactos= array();
		while ($unContacto=$contactosDAO->fetchArray($contactosResult)) {
				//obtengo los datos del contacto
    			$usuarioContactoResult=$usuarioDAO->get("*","id=".$unContacto['idUsuarioContacto'], "nombres");
    			$usuarioContacto=$contactosDAO->fetchArray($usuarioContactoResult);
				//obtengo datos del pais/estado
    			$administradorRegiones= new AdministradorRegiones();
    			$pais=$administradorRegiones->getNombrePais($usuarioContacto['idPais']);
    			$estado=$administradorRegiones->getNombreEstado($usuarioContacto['idEstado']);
    			$lugarResidencia=$pais.",".$estado;
    			//genero un contacto para visualizar
    			$contactos[$unContacto['idUsuarioContacto']]= array ("id"=>$unContacto['id'],
													  "bloqueado"=>$unContacto['bloqueado'],
    													"nombres"=>$usuarioContacto['nombres'],
													  "apellidos"=>$usuarioContacto['apellidos'],
													  "fechaNacimiento"=>$usuarioContacto['fechaNacimiento'],
													  "lugarResidencia"=>$lugarResidencia,
    												   "foto"=>$usuarioContacto['foto']
    			);
    	}
    	$data['contactos']=$contactos;
    	$this->view->echoView("contactos.php",$data);
    }


    /**
     * Muestra la página principal de un contacto especificado.
     * Panel superior
     *
     */
    public function verContacto() {
    	$idUsuario= Session::getInstance()->userId;
    	$usuarioDAO = new EntityDAO("usuarios");
		$usuarioContactoResult=$usuarioDAO->get("*","id=".$_REQUEST['idContacto'], "nombres");
    	$usuarioContacto=$usuarioDAO->fetchArray($usuarioContactoResult);

    	$data['nombres']=$usuarioContacto['nombres'];
    	$data['apellidos']=$usuarioContacto['apellidos'];
    	$data['fechaNacimiento']=$usuarioContacto['fechaNacimiento'];
		$administradorRegiones= new AdministradorRegiones();

    	$pais=$administradorRegiones->getNombrePais($usuarioContacto['idPais']);
    	$estado=$administradorRegiones->getNombreEstado($usuarioContacto['idEstado']);

    	$lugarResidencia=$pais.",".$estado;

    	$corrientesAdmin= new AdministradorCorrientes();
    	$corrientes= $corrientesAdmin->getCorrientesDelUsuario($idUsuario);
		$data['corrientes']=$corrientes;
    	$data['lugarResidencia']=$lugarResidencia;

    	$this->view->echoView("contacto-home.php",$data);
    }




    /**
     * Busca los contactos que comiencen con el nombre
     * del contacto especificado  y lo muestra en el listado de contactos
     */
    public function buscarContacto() {

    	$idUsuario= Session::getInstance()->userId;
    	$claveBusqueda= $_REQUEST['claveBusqueda'];
    	$dataBase = Database::getInstance();

    	$sql= 'select contactos.idUsuarioContacto, usuarios.nombres,
    			usuarios.apellidos, usuarios.fechaNacimiento,
    			usuarios.idPais, usuarios.idEstado,
    			usuarios.foto
    			from usuarios, contactos where
				(contactos.idUsuario='.$idUsuario.' and
				usuarios.id = contactos.idUsuarioContacto and
				usuarios.nombres like "'.$claveBusqueda.'%" and
				contactos.bloqueado=0 or contactos.bloqueado=null)';

    	$query= $dataBase->executeQuery($sql);

    	$contactos= array();
		while ($unContacto=$dataBase->fetchArray($query)) {
				$administradorRegiones= new AdministradorRegiones();
    			$pais=$administradorRegiones->getNombrePais($unContacto['idPais']);
    			$estado=$administradorRegiones->getNombreEstado($unContacto['idEstado']);
    			$lugarResidencia=$pais.",".$estado;
    			//genero un contacto para visualizar
    			$contactos[$unContacto['idUsuarioContacto']]= array ("id"=>$unContacto['id'],
													  "nombres"=>$unContacto['nombres'],
													  "apellidos"=>$unContacto['apellidos'],
													  "fechaNacimiento"=>$unContacto['fechaNacimiento'],
													  "lugarResidencia"=>$lugarResidencia,
    												   "foto"=>$usuarioContacto['foto']
    			);
    	}
    	$data['contactos']=$contactos;


    	$this->view->echoView("contactos.php",$data);


    }

    /**
     *
     * Elimina  el contacto $idContacto del usuario logueado
     * contacto. Condición de eliminación:
     * where idUsuario=usuario logueado y
     * idContacto = $_REQUEST['idContacto'];
     *
     * @param unknown_type $idContacto
     */
    public function eliminarContacto($idContacto) {

    	$data['idContacto']=$_REQUEST['idContacto'];

    	//TODO DELETE HERE

		$this->view->echoView("contactos.php",$data);

    }


    public function verBitacoraContacto() {

    	//$data['idContacto']=$_REQUEST['idContacto'];

    	//TODO DELETE HERE

		$this->view->echoView("contacto-bitacora.php",$data);

    }


    public function mapaContacto() {
		$idUsuario 				= $_REQUEST['idContacto'];
		$administradorVuelos= new AdministradorVuelos();
		$data= $administradorVuelos->getMapa($idUsuario);

    	$this->view->echoView("contacto-mapa.php",$data);
    }


    public function estadisticaContacto() {
    	$idUsuario 				= $_REQUEST['idContacto'];
		$administradorVuelos= new AdministradorVuelos();
		$data= $administradorVuelos->getEstadistica($idUsuario);

    	$this->view->echoView("contacto-estadistica.php",$data);
    }


}