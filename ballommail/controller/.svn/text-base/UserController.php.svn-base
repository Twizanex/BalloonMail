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

class UserController{

private $view=NULL;

function __construct()
{
	$this->view = new View();
}
public function loginForm(){
	$this->view->echoView("login-form.php");
}

public function loginFail(){
	if ($_REQUEST['bloqueado']=='1') {
		$data['message'] =ballom_echo('loginFailUserLock');
	}
	else {
	$data['message'] =ballom_echo('loginError');
	}
	$this->view->echoView("login-form.php", $data);
}


/**
 * Se invoca a esta accion cuando se ingresa a la página principal de
 * la red social (index.php).
 *
* TODO Establecer las Corrientes existentes (desde la base de datos)
* en el idioma actualmente seleccionado. Ver documento de obtención de traducción
* de una clave desde la base de datos.
	 *
* Establece Países y Estados y provincias.
	 *
* TODO Cuando se elige un país particular, se deberá mostrar el /los estados
* correspondientes al país escogido.
	 *
* No debe existir otro usuario con el mismo email.
* En tal caso deberá mostrar el mensaje de error correspondiente.
	 *
* Muestra el formulario de registro
	 *
	 */
public function registroForm(){

	$administradorCorrientes= new AdministradorCorrientes();
	$corrientes=$administradorCorrientes->getCorrientes();
	$data['corrientes']=$corrientes;
	$this->view->echoView("registro-form.php", $data);

}

/**
 *
 * Guarda el formulario de registro (nunca se registró en el sistema).
 * Casos Posibles
 * - 1. No existe el usuario.
 * 			1.1. Mostrar mensaje registro agregado OK. Ya puede loguearse en el sistema.
 * - 2. Existe el usuario.
 * 			2.1 Error en el sistema (No haya sido posible el registro por algun motivo).
 *
 * - TODO Si se estableció No cerrar session se debe programar tal funcionalidad aquí.
 * - TODO Falta implementar: Contraseñas no coinciden con javaScript.
 * - TODO Falta implementar: No tildó He leído y acepto las condiciones de uso (checked) con javaScript.
 *   Vuelve al mismo formulario con el mensaje en el idioma que corresponde.
 * - TODO confirmarContrasenia en registro-form.php, validar formulario con un js.
 * - y mandar msg de error en idioma correcto sino coinciden.
 * */
public function guardarForm(){
	$corrientes = $_REQUEST['corrientes'];
	$values =
		array(
			'nombres' => $_REQUEST['nombres'],
			'apellidos'=> $_REQUEST['apellidos'],
			'email'=>$_REQUEST['email'],
			'contrasenia'=>md5($_REQUEST['contrasenia']),
			'sexo'=>$_REQUEST['sexo'],
			'fechaNacimiento'=>$_REQUEST['anhoNac'].'/'.$_REQUEST['mesNac'].'/'.$_REQUEST['diaNac'],
			'fechaAlta'=>'now()',
			'idPais'=>$_REQUEST['idPais'],
			'idEstado'=>$_REQUEST['idEstado'],
			'idPerfil'=>'1',
			'aceptaRespuestasDefecto'=>1,
			'recibeMensajesCorrientes'=>1,
			'recibeMensajesGenerales'=>0,
			'publicaEnBitacora'=>1,
			'bloqueado'=>0
		);

	$userDAO= new EntityDAO("usuarios");
	$administradorCorrientes= new AdministradorCorrientes();
	$administradorUsuarios= new AdministradorUsuarios();

	$fechaNacimiento=$_REQUEST['anhoNac'].'-'.$_REQUEST['mesNac'].'-'.$_REQUEST['diaNac'];

	if(!$administradorUsuarios->mayorDeEdad($fechaNacimiento))
	{
		$data['message'] = ballom_echo('registerBadUserAge');
	}
	else
		{
			$adminUsuarios=new AdministradorUsuarios();

			if ($adminUsuarios->existeUsuario($_REQUEST['email'])) {
				$data['message'] = ballom_echo('registerBadUserExist');
				//echo "existeusuario:".$_REQUEST['email'];
			}
			else {
				$insertado= $userDAO->insert($values);

				if (!$insertado) {
					$data['message']=ballom_echo('registerBad');

				}
				else
					$data['message']=ballom_echo('registerOk');
				$id=$userDAO->getLastInsertId();
				$administradorCorrientes->asociarCorrientesAUsuario($id, $corrientes);
			}

		}
		$data['corrientes']=$administradorCorrientes->getCorrientes();

		$this->view->echoView("registro-form.php", $data);
    }

	 /**
     *
     * Retorna true si el usuario se loguea por primera vez en el sistema.
     * Caso contrario, false.
     *
     * primeraVezLogueado se deberá encontrar en true para devolver true.
     * campo ingresaPorPrimeraVez tabla usuarios
     *
     */
    public function primeraVezLogueado($usuario) {
		$usuarioAdmin= new AdministradorUsuarios();
		$primeraVezLogueado= $usuarioAdmin->primeraVezLogueado($usuario);
		if ($primeraVezLogueado) {
			$usuarioAdmin->marcarYaLogueado($usuario);
		}
		return $primeraVezLogueado;
    }






    /**
     * TODO restablecerPassword
     * 1. Verifica que exista usuario en la base con ese email
     * 2. Caso afirmativo,
     * 		1. Genera nueva clave:md5 (aleatorio entre 1 y 10000), guarda previamente dicha clave en la base
     *        de datos.
     *      2. Envia correo electrónico a dicho usuario, con nombre usuario (email) y clave generada al azar
     *        clave para reestablecer la password.
     * 		3.Establece mensaje restablecerPasswordOk en formulario de login.
     *
     * 3. Caso negativo,
     * 		1. Establece mensaje restablecerPasswordFail.
     * 		2. Vuelve a formulario de reestablecer password con dicho msg.
     *
     * Envio de correo electrónico al usuario logueado a página para reestablecer password.
     * Redirecciona a login o al mismo form con el mensaje correspondiente
     * (indica fue enviado a su casilla de correo un email con la password).
     * Link olvidé mi contraseña desde formulario de login.?
     */
	public function restablecerPassword(){
		/*Verificar usuario existente*/
		$administrador= new AdministradorUsuarios();
		if (! $administrador->existeUsuario($_REQUEST['email']) )
		{
			$data['message']=ballom_echo('restorePasswordFail');
			$this->view->echoView("login-form.php", $data);
			return false;
		}
		/*Genera nueva clave:md5*/
		$pass=rand(1,10000);
		$pass5=md5($pass);

		/*Persiste pass en BD*/
		$where = array('email="'.$_REQUEST['email'].'"');
		$values = array('contrasenia' => $pass5);
		echo $pass5;
		$usuarioDAO= new EntityDAO("usuarios");
		$usuarioDAO->update($values,$where);

		/*Envia correo electrónico*/ /*RESTA MULTILENGUAJE*/
		$subject= ballom_echo('restorePasswordOk:subject');
		$content= ballom_echo('restorePasswordOk:body').$_REQUEST['email']."/".$pass;
		$headers = "From: ".Config::singleton()->get('cuentaDeCorreo')."\r\n";
		mail($_REQUEST['email'], $subject , $content, $headers);

		$data['message']=ballom_echo('restorePasswordOk'.$pass);
		$this->view->echoView("login-form.php", $data);
	}

	/**
	 * Al hacer click en "Olvidé mi contraseña"
	 * Muestra un formulario que permite ingresar el email,
	 * mediante el cual se permitirá reestablecer la password.
	 */
	public function olvidoPasswordForm(){
		$this->view->echoView("olvido-password-form.php");
	}




/*
	public function logoff(){
		Config::singleton()->set('controllersFolder', 'controller/');
		Config::singleton()->set('modelsFolder', 'model/');
		Config::singleton()->set('viewsFolder', 'view/');

		$session=Session::getInstance();
		$session->destroy();

		//$this->view->echoView("index.php");
	}

*/
/*
	public function login(){
    	$usuario=$_REQUEST["usuario"];
		$password=$_REQUEST["password"];
		$dataBase=Database::getInstance();
		$dataBase->connect();
		$result=$dataBase->select("usuarios", "nombreUsuario, claveCodificada, perfil");
		$usuarioLogueado=mysql_fetch_object($result);
		$pass5=md5($password);
		if (($usuario == $usuarioLogueado->nombreUsuario) and ($pass5 == $usuarioLogueado->claveCodificada)) {
			$session=Session::getInstance();
			$session->__set("usuario", $usuarioLogueado->nombreUsuario);
			if ($usuarioLogueado->perfil=='usuario'){
				Config::singleton()->set('controllersFolder', 'controller/usuario/');
				Config::singleton()->set('modelsFolder', 'model/usuario/');
				Config::singleton()->set('viewsFolder', 'view/usuario/');
				$this->view->echoView("index.php");
	 		}
	 		else
	 			$this->view->echoView("../index.php");
		}


	}

*/
}


