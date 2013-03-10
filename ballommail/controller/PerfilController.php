<?php

class PerfilController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

    /**
     *
     *
     *A esta funcionalidad se accede cuando se hace click
     *en la opción del menú Perfil
     *
     *El formulario mostrado resultante, es muy similar
     *al de registro, con algunos nuevos campos agregados
     *y un diseño de página diferente, pues es privado.
     *
     *En esta función preparo todo para mostrar un formulario con los datos del usuario logueado:
     * -	Nombre
		-	Apellidos
		-	País (lista desplegable de país)
		- 	Provincia o estado (lista desplegable de país/estado)
		-	Fecha de nacimiento (formato dd/mm/aaaa)
		-	Estado civil (lista desplegable de país)
		-	Aceptar respuesta por defecto (checkbox, caja de verificación)
		-	Quiero recibir mensajes de mis corrientes (checkbox, caja de verificación)
		-	Quiero recibir mensajes generales ((checkboxes, caja de verificación)
		-	Corrientes que me interesan. Idem página de registro.
		-   Idiomas que leo. Forma de selección idem selección de corrientes.
		-   Idiomas que escribo. Forma de selección idem selección de corrientes.
		-   Idioma de escritura por defecto. ComboBox.
     *
     * @param Session::getUsuario
     */

    public function perfilForm(){
    	$userDAO= new EntityDAO("usuarios");

        $result=$userDAO->getById(Session::getInstance()->userId);
		$data['usuario']=mysql_fetch_array($result);
		$corrientesAdmin= new AdministradorCorrientes();
		$data['corrientes']=$corrientesAdmin->getCorrientesDelUsuario(Session::getInstance()->userId);
    	$usuariosAdmin= new AdministradorUsuarios();
    	$idiomasQueLee=$usuariosAdmin->getIdiomasQueLeeUsuario(Session::getInstance()->userId);
		$data["idiomas"]=$idiomasQueLee;
		//print_r($idiomasQueLee);
		$this->view->echoView("perfil-form.php", $data);

    }

    /**
     * Efectivizo la modificación de mi perfil, a través de lo enviado en el formulario.
     *
     * Modifico lo que corresponde en tabla usuarios.
     * TODO Doy de alta/modifico lo que corresponde en tabla CorrientesUsuarios.
     * TODO Doy de alta/modifico lo que corresponde en tabla IdiomasLecturaUsuarios.
     * TODO Doy de alta/modifico lo que corresponde en tabla IdiomasEscrituraUsuarios.
     *
     * Si algun error, vuelvo al formulario de perfil con el error correspondiente.
     *
     * TODO Si todo ok, la modificación y era la primeza vez logueado, actualizo que ya me loguie por
     * primera vez en la tabla usuarios (primeraVezLogueado=false).
     *
     * Reenvio al mismo formulario,(para esto debo prepararlo con todo lo nuevo)
     * con los datos modificados y un mensaje indicando que el perfil fue modificado.
     */
    public function guardarForm() {
		$idUsuarioLogueado=Session::getInstance()->userId;
    	$aceptaRespuestasDefecto=Utils::getBoolean($_REQUEST['aceptaRespuestasDefecto']);
    	//$boolean2=Utils::getBoolean($_REQUEST['recibeMensajesCorrientes']);
    	$recibeMensajesGenerales=Utils::getBoolean($_REQUEST['recibeMensajesGenerales']);
    	if ($_REQUEST['contrasenia']=='default00' ) { //no  modifico contraseña.
		$values =array(
    	'nombres' => $_REQUEST['nombres'],
    	'apellidos'=> $_REQUEST['apellidos'],
		'email'=>$_REQUEST['email'],
		'fechaNacimiento'=>$_REQUEST['anhoNac'].'/'.$_REQUEST['mesNac'].'/'.$_REQUEST['diaNac'],
    	'idPais'=>$_REQUEST['idPais'],
		'idEstado'=>$_REQUEST['idEstado'],
    	'idPerfil'=>'1',
    	'aceptaRespuestasDefecto'=>$aceptaRespuestasDefecto,
    	'recibeMensajesGenerales'=>$recibeMensajesGenerales,
    	'idIdiomaEscrituraDefecto'=>$_REQUEST['idIdiomaEscrituraDefecto']
    	);

    	}
    	else {
		$values =
    	array(
    	'nombres' => $_REQUEST['nombres'],
    	'apellidos'=> $_REQUEST['apellidos'],
		'email'=>$_REQUEST['email'],
    	'contrasenia'=>md5($_REQUEST['contrasenia']),
		'fechaNacimiento'=>$_REQUEST['anhoNac'].'/'.$_REQUEST['mesNac'].'/'.$_REQUEST['diaNac'],
    	'idPais'=>$_REQUEST['idPais'],
		'idEstado'=>$_REQUEST['idEstado'],
    	'idPerfil'=>'1',
    	'aceptaRespuestasDefecto'=>$aceptaRespuestasDefecto,
    	'recibeMensajesGenerales'=>$recibeMensajesGenerales,
    	'idIdiomaEscrituraDefecto'=>$_REQUEST['idIdiomaEscrituraDefecto']
    	);
    	}

    	$where =
    	array(
    	'id='.$idUsuarioLogueado);

		$userDAO= new EntityDAO("usuarios");

		$adminUsuarios=new AdministradorUsuarios();
		$fechaNacimiento=$_REQUEST['anhoNac'].'-'.$_REQUEST['mesNac'].'-'.$_REQUEST['diaNac'];
		if(!$adminUsuarios->mayorDeEdad($fechaNacimiento))
		{
			$data['message'] = ballom_echo('perfilUpdateBadUserAge');
		}
		else
		{

			if (self::existeUsuario($_REQUEST['email'])) {
				$data['message'] = ballom_echo('perfilUpdateBadUserExist');
				echo "existeusuario:".$_REQUEST['email'];
			}
			else {
				$actualizado= $userDAO->update($values,$where);

				if (!$actualizado) {
					$data['message']=ballom_echo('perfilUpdateBad');
				}
				else{
					$data['$message']=ballom_echo('perfilUpdateOk');
				}
			}
		}

		$adminCorrientes=new AdministradorCorrientes();
		$adminCorrientes->asociarCorrientesAUsuario($idUsuarioLogueado,$_REQUEST['corrientes']);
		$adminCorrientes->asociarUsuarioCorriente($recibeMensajesGenerales,"General",$idUsuarioLogueado);

		$adminUsuarios->asociarIdiomasQueLeeAUsuario($idUsuarioLogueado, $_REQUEST['idiomas']);

		$result=$userDAO->getById($idUsuarioLogueado);
		$data["usuario"]=mysql_fetch_array($result);
		$corrientes=$adminCorrientes->getCorrientesDelUsuario($idUsuarioLogueado);

		$data["corrientes"]=$corrientes;

		$data["idiomas"]=$adminUsuarios->getIdiomasQueLeeUsuario($idUsuarioLogueado);

		$this->view->echoView("perfil-form.php", $data);
    }

    /**
     * Baja del perfil del usuario del sistema.
     *
     * Modifico lo que corresponde en tabla usuarios.
     *
     * Si algun error, vuelvo al formulario de perfil con el error correspondiente.
     *
     * Reenvio al mismo formulario
     *
     *   */
    public function eliminarForm() {

		$userDAO= new EntityDAO("usuarios");

		$eliminado= $userDAO->delete("id='".Session::getInstance()->userId."'");
		if (!$eliminado) {
			$data['message']=ballom_echo('perfilUpdateBad');
		}
		else
			$data['message']=ballom_echo('perfilUpdateOk');

    	$this->view->echoView("perfil-form.php", $data);

    }

    /**
	 * TODO Retorna true si existe el email ingresado en otro usuario que no sea el logueado
     * @param unknown_type $email
     * @param se añaden mensajes de error en $data
     */
    public function existeUsuario($email) {
    	return false;

    }





}


