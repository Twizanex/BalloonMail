<?php


/**
 * Lógica de la aplicación relacionada con usuario
 * @author Margarita
 *
 */
class AdministradorUsuarios {

	function __construct()
	{

	}






	/**
	 *
	 * Funcion que devuelve quien escribio un MSJ. Funcion que se reutiliza sobre
	 * todo cuando tengo que mostrar un msj de confirmacion o rechazo y debo indicar
	 * el nombre del usuario del msj
	 * @param unknown_type $idMensaje
	 */
	public function getUsusarioEscribioMsj($idMensaje)
	{
		$MensajesDAO= new EntityDAO("mensajes");
    	$mensajesResult= $MensajesDAO->get("idUsuario", "id='".$idMensaje."'");
    	$entradaMsj=$MensajesDAO->fetchArray($mensajesResult);
    	$idUsuario=$entradaMsj['idUsuario'];
    	$MensajesDAO->freeResult($mensajesResult);

    	$UsuariosDAO= new EntityDAO("usuarios");
    	$usuariosResult= $UsuariosDAO->get("nombres", "id='".$idUsuario."'");
    	$entradaUsuario=$UsuariosDAO->fetchArray($usuariosResult);
    	$nombre=$entradaUsuario['nombres'];
    	$UsuariosDAO->freeResult($usuariosResult);

    	return $nombre;
	}

	/**
	 *
	 * Devuelve los idiomas que lee un usuario en el idioma $countryCode
	 * @return un array de corrientes key(id), valor=array (id, traduccion), checked
	 */
	public function getIdiomasQueLeeUsuario($idUsuario){

		$countryCode=Session::getInstance()->language;
    	// Obtengo el idioma en que tienen que ser mostrados los idiomas.

		$idiomasDAO= new EntityDAO("idiomas");
    	$idiomaEnIdiomaResult= $idiomasDAO->get("id", "code='".$countryCode."'");

    	$idiomaDelIdioma=$idiomasDAO->fetchArray($idiomaEnIdiomaResult);
    	$idiomaDelIdioma=$idiomaDelIdioma['id'];

    	$idiomasDAO->freeResult($idiomaEnIdiomaResult);

    	 // Levanto todos los idiomas

    	$idiomasQueLee = array();

    	$idiomasResult= $idiomasDAO->getAll();

    	//Inicializo el dao que accede a traducciones.
	   	$traductorDAO=new EntityDAO("claveslenguajes");
		while ($idioma=$idiomasDAO->fetchArray($idiomasResult))
    		{
    			//obtengo la traducción del  idioma actual

    			$traduccionesResult=$traductorDAO->get("valor", "idIdioma=".$idiomaDelIdioma." and clave='".$idioma['nombre']."'");
				$traduccion=$traductorDAO->fetchArray($traduccionesResult);
				$valor=$traduccion['valor'];
				$traductorDAO->freeResult($traduccionesResult);

				// verifico si el usuario lee ese idioma, lo marco

				$idiomasLecturaUsuarioDAO= new EntityDAO("idiomausuarioslectura");
				$resultIdiomaLecturaUsuario = $idiomasLecturaUsuarioDAO->get("id","idUsuario=".$idUsuario." and idIdioma=".$idioma['id']);
				$idiomaLecturaDelUsuario=$idiomasLecturaUsuarioDAO->fetchArray($resultIdiomaLecturaUsuario);
				$checked=0;
				if ($idiomaLecturaDelUsuario['id']) {
					$checked=1;
				}

				$idiomasQueLee[$idioma['id']]= array ("id"=>$idioma['id'],"traduccion"=>$valor, "checked"=>$checked);
			}
		$idiomasDAO->freeResult($corrientesResult);

		return $idiomasQueLee;
	}

	/**
	 * Asocia las corrientes al usuario
	 * @param id $idUsuario
	 * @param array de ids  de corrientes $corrientes, array de corrientes
	 */
	public function asociarIdiomasQueLeeAUsuario($idUsuario, $idiomas) {
		$idiomaLecturaUsuarioDAO= new EntityDAO("idiomausuarioslectura");
		$idiomaLecturaUsuarioDAO->delete("idUsuario=".$idUsuario);
		foreach ($idiomas as $key=>$value) {
			$values =
	    	array(
	    	'idIdioma' => $value,
	    	'idUsuario'=> $idUsuario,
			);
			$idiomaLecturaUsuarioDAO->insert($values);

		}

	}

	/**
	 *
	 * Retorna el país del usuario $idUsuario
	 * @param $idUsuario
	 */
	public function getPais($idUsuario) {
		$usuariosDAO= new EntityDAO("usuarios");
		$paisResult=$usuariosDAO->get("idPais", "id=".$idUsuario);
		$pais=$usuariosDAO->fetchArray($paisResult);
		return $pais['idPais'];
	}

	/**
	 *
	 * Retorna el nombre del país, con  la traducción correspondiente
	 * al que pertenece el usuario $idUsuario
	 * @param $idUsuario
	 */
	public function getNombreDelPais($idUsuario) {
		$pais=$this->getPais($idUsuario);
		//echo $pais;
		$administradorRegiones= new AdministradorRegiones();
		$nombrePais=$administradorRegiones->getNombrePais($pais);
		//Si implementa Traducciones
		//$traductor= new Traductor();
		//$traduccion= $traductor->getTraduccion($nombrePais);
		return $nombrePais;
	}

	/**
	 *
	 * Retorna el nombre del país, con  la traducción correspondiente
	 * al que pertenece el usuario $idUsuario
	 * @param $idUsuario
	 */
	public function getNombreDelEstado($idUsuario) {
		$estado=$this->getEstado($idUsuario);
		//echo $estado;
		$administradorRegiones= new AdministradorRegiones();
		$nombreEstado=$administradorRegiones->getNombreEstado($estado);
		//Si implementa Traducciones
		//$traductor= new Traductor();
		//$traduccion= $traductor->getTraduccion($nombrePais);
		return $nombreEstado;
	}


	/**
	 *
	 * Retorna el estado del usuario $idUsuario
	 * @param $idUsuario
	 */
	public function getEstado($idUsuario) {
		$usuariosDAO= new EntityDAO("usuarios");
		$estadoResult=$usuariosDAO->get("idEstado", "id=".$idUsuario);
		$estado=$usuariosDAO->fetchArray($estadoResult);
		return $estado['idEstado'];
	}


	public function getIdiomaQueEscribe($idUsuario) {
		$usuariosDAO= new EntityDAO("usuarios");
		$idiomaResult=$usuariosDAO->get("idIdiomaEscrituraDefecto", "id=".$idUsuario);
		$idioma=$usuariosDAO->fetchArray($idiomaResult);
		return $idioma['idIdiomaEscrituraDefecto'];
	}

	public function getUsuario($idUsuario) {
		$usuariosDAO= new EntityDAO("usuarios");
		$usuarioResult=$usuariosDAO->get("*", "id=".$idUsuario);
		$usuario=$usuariosDAO->fetchArray($usuarioResult);
		//['idIdiomaEscrituraDefecto'];
		return $usuario;
	}

	/**
	 *
	 * Baja lógica del usuario
	 * @param unknown_type $idUsuario
	 */
	public function eliminarUsuarioBL($idUsuario) {

	}

	/**
	 *
	 * Retorna si $date es mayor o igual que el parametro de mayoría de edad definido en:
	 *
	 * Config::singleton()->get('mayoriaEdad').
	 *
	 * @param unknown_type $date
	 */
	public function mayorDeEdad($date) {
		if(self::calculaEdad($date)< Config::singleton()->get('registroEdadMinima') ) return false;
		return true;
	}
	public function calculaEdad( $fecha ) {
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}

	 /**
     * TODO Retorna el identificador del administrador del sistema.
     * El administrador es el primer usuario que posee perfil admin.
     *
     *
     */
    public function getAdministradorId() {
    	$userDAO= new EntityDAO("usuarios");
    	$result=$userDAO->get("id", "idPerfil=2");
    	$usuario=$userDAO->fetchArray($result);
    	return $usuario['id'];
	}


    /**
	 * TODO Retorna true si existe el usuario con el email ingresado
     * @param unknown_type $email
     * @param se añaden mensajes de error en $data
     */
    public function existeUsuario($email) {
    	$userDAO= new EntityDAO("usuarios");
    	$result=$userDAO->get("id", "email='$email'");
    	$usuario=$userDAO->fetchArray($result);
    	if ($usuario['id']) return true;
    	return false;
    }

    public function validoAdministrador($usuario,$password)
    {
    	$userDAO= new EntityDAO("usuarios");
		$pass5=md5($password);
    	$result=$userDAO->get("id, email, contrasenia, idPerfil, nombres, idIdiomaLecturaDefecto", "email='$usuario' AND idPerfil=2");
		$usuarioLogueado=mysql_fetch_object($result);
		if (($usuario == $usuarioLogueado->email) and ($pass5 == $usuarioLogueado->contrasenia))
		{	//Session::getInstance()->__set("userId", $usuarioLogueado->id);
			return $usuarioLogueado;
		}
    	return null;
    }

    public function validoUsuario($usuario, $password) {

    	$userDAO= new EntityDAO("usuarios");
		$pass5=md5($password);
    	$result=$userDAO->get("id, email, contrasenia, idPerfil, nombres, idIdiomaLecturaDefecto, bloqueado", "email='$usuario'");
		$usuarioLogueado=mysql_fetch_object($result);
		if (($usuario == $usuarioLogueado->email) and ($pass5 == $usuarioLogueado->contrasenia))
		{	Session::getInstance()->__set("userId", $usuarioLogueado->id);
			return $usuarioLogueado;
		}
    	return null;
    }

    public function tienePerfil($usuario, $perfil) {
		$perfilDAO= new EntityDAO("perfiles");
    	$result=$perfilDAO->get("id, nombre", "id='$usuario->idPerfil'");
    	$perfil=$perfilDAO->fetchArray($result);
    	if ($perfil['nombre']==$perfil) {
			return true;
    	}
    	return false;
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
    	$userDAO= new EntityDAO("usuarios");
		//$pass5=md5($password);
		$result=$userDAO->get("ingresaPorPrimeraVez", "email='$usuario'");

		$usuarioLogueado=$userDAO->fetchArray($result);
		if ($usuarioLogueado['ingresaPorPrimeraVez']) {
			return true;
		}


		return null;
    }

    /**
     *
     * Indica que el usuario ya se logueó una vez en el sistema.
     * @param id del usuario $id
     */
    public function marcarYaLogueado($usuario) {
    	$values = array('ingresaPorPrimeraVez' => 0);
    	$where = array('email='."'".$usuario."'");
		$userDAO= new EntityDAO("usuarios");
		$actualizado= $userDAO->update($values,$where);
    }

	/**
	 * TODO rememberMe , o no cerrar sesion
	 * Recordar usuario y password de un usuario logueado
	 * utilizando funciones para el manejo de cookies.
	 * setcookie (adaptar la clase Session si fuese necesario)
	 */
	public function rememberMe($usuario, $password){
		//El soporte a esta funcion se encuentra en los archivos autologin.php y settingsCookie.php
		$userDAO= new EntityDAO("usuarios");
		//$pass5=md5($password);
		$result=$userDAO->get("id, email, contrasenia, idPerfil, nombres", "email='$usuario'");
		$usuarioLogueado=mysql_fetch_object($result);
		if (($usuario == $usuarioLogueado->email) and ($password == $usuarioLogueado->contrasenia)) {
			return $usuarioLogueado;
		}
		return null;
	}

	public function login($usuarioValido) {
		$idiomaAdmin = new AdministradorIdiomas();
		$session=Session::getInstance();
		$session->__set("usuario", $usuarioValido->email);
		$session->__set("nombres", $usuarioValido->nombres);
		$session->__set("userId", $usuarioValido->id);
		$idiomaLecturaDefecto=$usuarioValido->idIdiomaLecturaDefecto;
		$countryCode= $idiomaAdmin->getCountryCode($idiomaLecturaDefecto);
		if ($countryCode) {
			Session::getInstance()->__set('language',$countryCode);
		}
		self::guardarConexion($usuarioValido->id);
	}


	public function loginAdministrador($usuarioValido) {
		$session=Session::getInstance();
		$session->__set("usuario", $usuarioValido->email);
		$session->__set("nombres", $usuarioValido->nombres);
		$session->__set("userId", $usuarioValido->id);
	}


	public function cambiarIdioma($userId, $countryCode) {
		$idiomaAdmin= new AdministradorIdiomas();
		$id=$idiomaAdmin->getIdIdioma($countryCode);
		$userDAO= new EntityDAO("usuarios");
		$values = array('idIdiomaLecturaDefecto' => $id);
    	$where = array('id='."'".$userId."'");
		$actualizado= $userDAO->update($values,$where);
	}


	/**
	 *
	 * Guarda la fecha y hora en que se logueo el usuario
	 * @param unknown_type $idUsuario
	 * @author Leandro G. Vandenbosch
	 */
	private function guardarConexion($idUsuario)
	{
		$conexionesDAO= new EntityDAO("conexiones");
		$values =
	    	array(
	    	'fecha' => 'now()',
	    	'idUsuario'=> $idUsuario,
			);
		$conexionesDAO->insert($values);
	}

	private function bloqueado($idUsuario) {
		$userDAO= new EntityDAO("usuarios");
		$pass5=md5($password);
    	$result=$userDAO->get("id", "email='$usuario' and bloqueado=0");
		$usuarioLogueado=mysql_fetch_object($result);
		if (($usuario == $usuarioLogueado->email) and ($pass5 == $usuarioLogueado->contrasenia))
		{	Session::getInstance()->__set("userId", $usuarioLogueado->id);
			return $usuarioLogueado;
		}
    	return null;

	}

}
