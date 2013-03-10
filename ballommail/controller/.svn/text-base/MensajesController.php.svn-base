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

class MensajesController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	/**
	 * Obtiene la página $page, de mensajes recibidos y aun no leídos
	 * del usuario logueado,
	 * paginados , retorna a la página un array con objetos mensaje en $data.
	 * * tabla: mensajes
	 * @param $_GET['page']
	 */
	public function getMensajesNuevos() {

		            $usuariosDAO = new EntityDAO("usuarios");
                 $mensajesDestinatariosDAO= new EntityDAO("mensajesdestinatarios");
				 $estadosDAO = new EntityDAO("estados");
				 $paisesDAO = new EntityDAO("paises");

				 $idUsuario= Session::getInstance()->userId;
		  		 $resultDestinatarios = $mensajesDestinatariosDAO->get("*","leido=0 AND idDestinatario=".$idUsuario);

		$cont=0;
		$IdMensajes = array();
		$FechaHoraRecepcion = array();
		$Destinatario = array();
		$Estados = array();
		$Paises = array();
		$Fotos = array();
		while ($entrada=$mensajesDestinatariosDAO->fetchArray($resultDestinatarios)) {
			$mensajesDAO= new EntityDAO("mensajes");
			$resultMsj= $mensajesDAO->get("*","id=".$entrada['idMensaje']);
			while ($entradaMensaje = $mensajesDAO->fetchArray($resultMsj) )
			{
			$IdMensajes[$cont]= $entrada['idMensaje'];
			$FechaHoraEnvio[$cont]= $entrada['fechaHoraEnvio'];
			//Busco los datos del usuario que envio el msj -> Apellido y Nombre
			$resultUsuarios= $usuariosDAO->get("*","id=".$entradaMensaje['idUsuario']);
			while ($entradaUsuario=$usuariosDAO->fetchArray($resultUsuarios)) {
			       $Destinatario[$cont]=$entradaUsuario['apellidos']." ".$entradaUsuario['nombres'];

			       //Cargo la imagen del globo que selecciono el usuario
			       $globosDAO= new EntityDAO("globos");
			       $resultGlobos= $globosDAO->get("*","idGlobo=".$entradaMensaje['idGlobo']);
			       while ($entradaGlobo=$globosDAO->fetchArray($resultGlobos)) {
			       $Fotos[$cont]=$entradaGlobo['imagen'];
			       }


					//Busco el estado y el pais para mostrar en el mensaje
					$resultEstados = $estadosDAO->get("*","id=".$entradaUsuario['idEstado']);
					while ($entradaEstado=$estadosDAO->fetchArray($resultEstados)) {
							$Estados[$cont]=$entradaEstado['nombre'];

							$resultPaises = $paisesDAO->get("*","id=".$entradaEstado['idPais']);
							while ($entradaPaises=$paisesDAO->fetchArray($resultPaises)) {
								$Paises[$cont]=$entradaPaises['nombre'];
							}
					}
			}
			}

			$cont = $cont + 1;
		}

		$data['IdMensajes']=$IdMensajes;
		$data['FechaHoraEnvio']=$FechaHoraEnvio;
		$data['Destinatario']=$Destinatario;
		$data['Paises']=$Paises;
		$data['Estados']=$Estados;
		$data['Fotos']=$Fotos;



		$this->view->echoView("mensajes-nuevos.php",$data);

	}

	/**
	 * Obtiene la página $page, de mensajes leídos del usuario logueado,
	 * paginados , retorna a la página un array con objetos mensaje en $data.
	 * tabla: mensajes
	 * @param $_GET['page']
	 */
	public function getMensajesLeidos() {
				 $usuariosDAO = new EntityDAO("usuarios");
                 $mensajesDestinatariosDAO= new EntityDAO("mensajesdestinatarios");
				 $estadosDAO = new EntityDAO("estados");
				 $paisesDAO = new EntityDAO("paises");

				 $idUsuario= Session::getInstance()->userId;
		  		 $resultDestinatarios = $mensajesDestinatariosDAO->get("*","leido=1 AND idDestinatario=".$idUsuario);

		$cont=0;
		$IdMensajes = array();
		$FechaHoraRecepcion = array();
		$Destinatario = array();
		$Estados = array();
		$Paises = array();
		$Fotos = array();
		while ($entrada=$mensajesDestinatariosDAO->fetchArray($resultDestinatarios)) {
			$mensajesDAO= new EntityDAO("mensajes");
			$resultMsj= $mensajesDAO->get("*","id=".$entrada['idMensaje']);
			while ($entradaMensaje = $mensajesDAO->fetchArray($resultMsj) )
			{
			$IdMensajes[$cont]= $entrada['idMensaje'];
			$FechaHoraEnvio[$cont]= $entrada['fechaHoraEnvio'];
			//Busco los datos del usuario que envio el msj -> Apellido y Nombre
			$resultUsuarios= $usuariosDAO->get("*","id=".$entradaMensaje['idUsuario']);
			while ($entradaUsuario=$usuariosDAO->fetchArray($resultUsuarios)) {
			       $Destinatario[$cont]=$entradaUsuario['apellidos']." ".$entradaUsuario['nombres'];

					//Cargo la imagen del globo que selecciono el usuario
			       $globosDAO= new EntityDAO("globos");
			       $resultGlobos= $globosDAO->get("*","idGlobo=".$entradaMensaje['idGlobo']);
			       while ($entradaGlobo=$globosDAO->fetchArray($resultGlobos)) {
			       $Fotos[$cont]=$entradaGlobo['imagen'];
			       }


		   			//Busco el estado y el pais para mostrar en el mensaje
					$resultEstados = $estadosDAO->get("*","id=".$entradaUsuario['idEstado']);
					while ($entradaEstado=$estadosDAO->fetchArray($resultEstados)) {
							$Estados[$cont]=$entradaEstado['nombre'];

							$resultPaises = $paisesDAO->get("*","id=".$entradaEstado['idPais']);
							while ($entradaPaises=$paisesDAO->fetchArray($resultPaises)) {
								$Paises[$cont]=$entradaPaises['nombre'];
							}
					}
			}
			}

			$cont = $cont + 1;
		}


		$data['IdMensajes']=$IdMensajes;
		$data['FechaHoraEnvio']=$FechaHoraEnvio;
		$data['Destinatario']=$Destinatario;
		$data['Paises']=$Paises;
		$data['Estados']=$Estados;
		$data['Fotos']=$Fotos;

		$this->view->echoView("mensajes-leidos.php",$data);



	}




	/**
	 * $_GET['idGlobo'] globo al cual se asociará el msg(se debe mantener este campo hidden
	 * a través del formulario de envio de msg.).
	 *
	 En esta página se encuentra el espacio que contiene
	 el área de texto para redactar el mensaje con el nombre de usuario
	 del remitente y la fecha predefinidos, y, los siguientes botones:
	 	-	No acepto respuesta / acepto respuesta
	 	(depende de la configuración en el perfil,
	 	marcaria lo contrario a lo seleccionado)
	 	(si es mensaje para un contacto o administrador, queda inactivo)
		-	Adjuntar archivo (hasta 2mb,  ,doc, .txt, .jpg, imágenes).
		-	Soltar al cielo (la lee y nuevamente vuelve a circular, como un no leído).
		-	Cancelar (este botón te lleva devuelta a “Hill”)
		-	No publicar en bitácora.
		-	Desplegable de selección de corriente
			(si es mensaje para un contacto o administrador, queda inactivo)
		-	Desplegable de selección de idioma
			por si se quiere enviar fuera del idioma por defecto.
			(si es mensaje para un contacto o administrador, queda inactivo)
		El mensaje deberá ser enviado a un usuario al azar que cumpla las condiciones de idioma y corriente.

	* @param $_GET['idGlobo']
	*/
	public function mensajeForm() {
		$data['tipoMsj']=4;
		if (isset($_GET['id'])) {
			$data['tipoMsj']=$_GET['id'];
		}
		$data['idGlobo']=$_GET['idGlobo'];
		$administradorUsuarios = new AdministradorUsuarios();

        $idUsuario= Session::getInstance()->userId;

        $administradorCorrientes= new AdministradorCorrientes();
        $corrientes=$administradorCorrientes->getCorrientesDelUsuario($idUsuario);

		$data['corrientes']=$corrientes;
		$administradorIdiomas = new AdministradorIdiomas();

		$idiomas = $administradorIdiomas->getAllIdiomas();
		$data['idiomas']=$idiomas;

		//datos para el form del usuario logueado,
		$usuario=$administradorUsuarios->getUsuario($idUsuario);

		$adminRegiones = new AdministradorRegiones();

		$data['idIdiomaDefecto']=$usuario['idIdiomaEscrituraDefecto'];
		$data['pais']=$adminRegiones->getNombrePais($usuario['idPais']);
		$data['estado']=$adminRegiones->getNombreEstado($usuario['idEstado']);
		$data['aceptaRespuestasDefecto']=$usuario['aceptaRespuestasDefecto'];

		$this->view->echoView("mensaje-form.php",$data);
	}




	/**
	 * Muestra el mensaje recibido seleccionado por el usuario y todas las acciones posibles
	 * sobre el mismo. Menú lateral izquierdo.
	 *
	 * @param $_GET['idMensaje']
	 *
	 */
	public function verMensajeRecibido() {
		$data['idMensaje']= $_GET['idMensaje'];
		$this->marcarLeido($data['idMensaje']);
		//Obtengo el asunto y el contenido para mostrar
		$mensajesDAO= new EntityDAO("mensajes");
		$result = $mensajesDAO->get("*","id=".$_GET['idMensaje']);
		while ($entrada=$mensajesDAO->fetchArray($result)) {
		       $asunto=$entrada['asunto'];
			   $contenido=$entrada['mensaje'];
			   $idUsuario=$entrada['idUsuario'];
		}

		//Busco el id del usuario quien mando el mensaje



		//Verifico que el mensaje no tenga archivos adjuntos, de tener, devuelvo en una variable el nombre del
		//archivo y en otro la ruta para accederlo.
		if(is_dir("./files/".$idUsuario))
			{
				if(is_dir("./files/".$idUsuario."/".$_GET['idMensaje']))
				{
					$mensajesadjuntosDAO= new EntityDAO("mensajesarchivosadjuntos");
					$resultmensajesadjuntos = $mensajesadjuntosDAO->get("*","idMensaje=".$data['idMensaje']);
					$cont=0;
					$archivosAdjuntos = array();
					$pathArchivosAdjuntos = array();
					while ($entradaMsjAdjunto=$mensajesadjuntosDAO->fetchArray($resultmensajesadjuntos))
					{
							$pathArchivosAdjuntos[$cont]="./files/".$idUsuario."/".$_GET['idMensaje']."/".$entradaMsjAdjunto['archivo'];
							$archivosAdjuntos[$cont]=$entradaMsjAdjunto['archivo'];
							$cont = $cont + 1;

					}
				}
			}

		$data['patharchivosAdjuntos'] = $pathArchivosAdjuntos;
		$data['archivosAdjuntos'] =$archivosAdjuntos;
		$data['asunto'] = $asunto;
		$data['mensaje'] = $contenido;
		$data['id'] = $_GET['idMensaje'];
		$adminRegiones= new AdministradorRegiones();
		$usuariosAdmin= new	AdministradorUsuarios();
		$usuario= $usuariosAdmin->getUsuario($idUsuario);
		$data['pais']=$adminRegiones->getNombrePais($usuario['idPais']);
		$data['estado']=$adminRegiones->getNombreEstado($usuario['idEstado']);
		$data['fechaHora'] = $usuario['fechaHora'];
		$data['sender'] = $usuario['apellidos'].", ".$usuario['nombres'];

		$this->view->echoView("ver-mensaje-recibido.php",$data);
	}


	/**
	 *
	 * El mensaje que se suelta ya fue guardado por el remitente original(paso 1 del enviarMensaje),
	 * Al soltarlo la se continua con el paso 2 de la funcionalidad enviarMensaje, a la/s.
	 * corrientes definidas por emisor original del globo. Entre los posibles destinatarios
	 * de tal globo no pueden ser el emisor original ni ningun usuario que ya lo haya leído
	 * y lo vuelve a soltar.
	 *
	 * Funcionalidad a definir NO PROGRAMAR AÚN: El algoritmo aquí,
	 * debe detectar un globo en el aire que ya haya sido leido
	 * y vuelto a soltar por todos los usuarios existentes
	 * no pudiendo ser enviado a nadie. En este caso, un mensaje indicando
	 * tal situación deberá aparecerle al usuario que lo suelta al cielo.
	 *
	 * @param $_GET['idMensaje']
	 *
	 */
	public function devolverAlCielo() {

		$arreglo = array();
		//Obtener los usuarios que ya recibieron este globo y asigno al usuario actual
		$arreglo = self::obtenerUsuariosRecibieronMsj($_GET['idMensaje']);



		//Copio el msj
		$mensajesDAO= new EntityDAO("mensajes");
		$resultMensaje = $mensajesDAO->get("*","id=".$_GET['idMensaje']);
		$entradaMensaje = $mensajesDAO->fetchArray($resultMensaje);
		$destinatario = self::seleccionarDestinatario($entradaMensaje['idIdioma'],$entradaMensaje['idCorriente'],$arreglo);

		//Si obtengo un usuario valido de acuerdo a la corriente y el idioma, sino le informo al usuario que no se encontro ningun usuario con ese criterio
		if ($destinatario != -1 )
		{
		//Guardo el msj -> Preguntar si debo guardar el msj????
		/*self::guardarMensaje("", $entradaMensaje['asunto'], $entradaMensaje['mensaje'],
		$entradaMensaje['idCorriente'], $entradaMensaje['idIdioma'], $entradaMensaje['idGlobo'],
		$entradaMensaje['aceptaRespuesta'], $entradaMensaje['publicarBitacora'],
		$entradaMensaje['soltarCielo'],$entradaMensaje['idUsuario'],$entradaMensaje['idTipoMensaje'],$entradaMensaje['idMensajeRespuesta']);

		//Busco el id del Mensaje del usuario actual para reportarlo como mensaje destinatario
		$idMensaje=self::obtengerUltimoMsj($entradaMensaje['idUsuario']);
		*/
		//Lo marco como enviado en la tabla mensajesdestinatarios
		self::marcarEnviado($destinatario, $_GET['idMensaje'], 0);

		$data['message']= ballom_echo("messageSentOk");
		}
		else //No se encontro un destinatario que cumpla las condiciones
			$data['message']= ballom_echo("Nodestiny");

		$this->view->echoView("mensaje-confirmacion.php", $data);
	}

	/**
	 *
	 * Metodo que devuelve el id del ultimo MSJ guardado en la base de datos con el fin que se corresponda
	 * con la tabla mensajesdestinatarios
	 * @param unknown_type $idUsuario
	 */
	private function obtengerUltimoMsj($idUsuario)
	{
		$mensajesDAO= new EntityDAO("mensajes");
		$result = $mensajesDAO->get("max(id)","idUsuario=".$idUsuario);
		$entrada=$mensajesDAO->fetchArray($result);
		return $entrada['max(id)'];
	}

	/**
	 *
	 * Funcion que devuelve todos los usuarios que recibieron un msj. Metodo que se utiliza en
	 * "Devolver al Cielo".
	 * @param unknown_type $idMensaje
	 */
	private function obtenerUsuariosRecibieronMsj($idMensaje)
	{

	    //En la posicion cero el usuario que escribio el mensaje
	    $mensajesDAO= new EntityDAO("mensajes");
	    $resultMensajes = $mensajesDAO->get("*","id=".$idMensaje);
	    $entradaMensaje = $mensajesDAO->fetchArray($resultMensajes);
	    $arreglo[0]= $entradaMensaje['idUsuario'];

	    //Cargo en el arreglo la persona que escribio el msj original
	    $mensajesdestinatariosDAO= new EntityDAO("mensajesdestinatarios");
	    $result = $mensajesdestinatariosDAO->get("*","idMensaje=".$idMensaje);
	    $contador=1;
		while ($entrada = $mensajesdestinatariosDAO->fetchArray($result) )
			{
					$arreglo[$contador] =$entrada['idDestinatario'];
					$contador = $contador + 1;
			}

		return $arreglo;
	}

	/**
	 *
	 * Muestra formulario de envio de correo. Preparando parámetros implícitos
	 * por ser una respuesta a otro mensaje:
	 * TipoDeMensaje del mensaje que se enviaría: 1 (Respuesta).
	 * Se reenvian al formulario para ser utilizados en el envio del mensaje
	 * Se debe mantener el tipo de mensaje respuesta,
	 * y el mensaje idMensajeRespuesta (el id del mensaje que se está respondiento)
	 * a través de la navegación y el mensaje guardarse como tal, idTipoMensaje
	 * con el correspondiente, idem el idMensajeRespuesta.
	 *
	 * param $_GET['idMensajeOriginal']: mensaje que estoy respondiendo, en la base idMensajeRespuesta.
	 * param $_GET['idDestinatario']: Usuario al cual debo remitir la respuesta.
	 *
	 */
	/**
	 *
	 * Muestra formulario de envio de correo. Preparando parámetros implícitos
	 * por ser una respuesta a otro mensaje:
	 * TipoDeMensaje del mensaje que se enviaría: 1 (Respuesta).
	 * Se reenvian al formulario para ser utilizados en el envio del mensaje
	 * Se debe mantener el tipo de mensaje respuesta,
	 * y el mensaje idMensajeRespuesta (el id del mensaje que se está respondiento)
	 * a través de la navegación y el mensaje guardarse como tal, idTipoMensaje
	 * con el correspondiente, idem el idMensajeRespuesta.
	 *
	 * param $_GET['idMensajeOriginal']: mensaje que estoy respondiendo, en la base idMensajeRespuesta.
	 * param $_GET['idDestinatario']: Usuario al cual debo remitir la respuesta.
	 *
	 */
	public function responder() {
		//Verifico si el mensaje permite respuesta
		$administradorUsuarios = new AdministradorUsuarios();
		if (self::getMensajeAceptaRespuesta($_GET['idMensaje'])==false)
		{
			$data['message']=str_ireplace("@usuario",$administradorUsuarios->getUsusarioEscribioMsj($_GET['idMensaje']),ballom_echo("NoRequestForAnswer"));
			$data['idTipoMensaje']=1;
			return $this->view->echoView("mensaje-confirmacion.php",$data);
		}
		else
		{
		$mensajesDAO= new EntityDAO("mensajes");
		$result = $mensajesDAO->get("*","id=".$_GET['idMensaje']);
		$entrada=$mensajesDAO->fetchArray($result);

		//Obtengo el usuario a quien le voy a contestar
		$usuariosDAO= new EntityDAO("usuarios");
		$resultUsuarios = $usuariosDAO->get("*","id=".$entrada['idUsuario']);
		$entradaUsuarios=$usuariosDAO->fetchArray($resultUsuarios);

		$data['msjDirigido'] = "Dirigido a ".$entradaUsuarios['apellidos']." ".$entradaUsuarios['nombres'];
		$data['tituloMail']="RE: ".$entrada['asunto'];
		$data['idGlobo']=$_GET['idGlobo'];
		$administradorIdiomas = new AdministradorIdiomas();
		$idiomas = $administradorIdiomas->getAllIdiomas();
		$data['idiomas']=$idiomas;
		$idiomaEscritura=$administradorUsuarios->getIdiomaQueEscribe($idUsuario);

		$data['tipoMsj']=1;
		$data['idIdiomaDefecto']=$idiomaEscritura;
		$data['pais']=$administradorUsuarios->getNombreDelPais(Session::getInstance()->userId);

		$data['estado']=$administradorUsuarios->getNombreDelEstado(Session::getInstance()->userId);

		$this->view->echoView("mensaje-form.php",$data);
		}
	}

		/**
		 *
		 * Metodo que devuelve si un mensaje permite respuesta o no
		 * @param unknown_type $idMensaje
		 */
		private function getMensajeAceptaRespuesta($idMensaje)
		{
			$mensajesDAO= new EntityDAO("mensajes");
		    $result = $mensajesDAO->get("*","id=".$idMensaje);
			$entrada=$mensajesDAO->fetchArray($result);
			if ($entrada['aceptaRespuesta']==0)
				return false;
			return true;
		}


	/**
	 * Se genera un mensaje en tabla Mensajes:
	 *
	 * Dicho mensaje no tiene titulo, contenido, ni nada, solamente tiene la referencia
	 * al mensaje que origina sobre el que se reporta del abuso
	 * (Mensajes.idMensajeRespuesta=idMensaje), la referencia de quien
	 * remite el abuso (el usuario logueado,idUsuario) y el tipo de mensaje(tipoDeMensaje
	 * :3 (Reporte de Abuso).
	 *
	 * Si ya existía un reporte de abuso del usuario logueado sobre dicho mensaje
	 * entonces se debe indicar con un mensaje apropiado(messageAdminReportSent).
	 * Sino existía y se crea como nuevo sin inconvenientes(messageAdminReportOk).
	 *
	 * Se "envia" al administrador, insertando una entrada en la tabla: MensajesDestinatarios.
	 * utilizar método getAdministradorId de la clase UserController, para indicar el
	 * destinatario del mensaje. fechaHoraEnvio: now(), fechaHoraRecepcion=null, esta se cambia
	 * cuando el administrador revisa los abusos(otra sección de web administración).
	 *
	 * Dicho mensaje será leído o no por el administrador.

	 * Preparando parámetros implícitos por ser un mensaje de abuso al administrador:
	 *)
	 * Se reenvian al formulario para ser utilizados en el envio del mensaje
	 *
	 * param $_GET['idMensaje']: mensaje que estoy reportando abuso

	 *
	 *
	 *
	 *
	 */
	public function reportarAbuso() {

	//Verifico si el mensaje permite respuesta
		if (!self::existeAbuso($_GET['idMensaje']))
        {
		$mensajesDAO= new EntityDAO("mensajes");
		$result = $mensajesDAO->get("*","id=".$_GET['idMensaje']);
		$entrada=$mensajesDAO->fetchArray($result);

		$data['msjDirigido'] = ballom_echo("MsjAdministradorAbuse");
		$data['tituloMail']= ballom_echo("titleReporteAbuse");
		$data['idGlobo']=$_GET['idGlobo'];
		$administradorIdiomas = new AdministradorIdiomas();
		$idiomas = $administradorIdiomas->getAllIdiomas();
		$data['idiomas']=$idiomas;
		$administradorUsuarios = new AdministradorUsuarios();
		$idiomaEscritura=$administradorUsuarios->getIdiomaQueEscribe($idUsuario);

		//Seteo el tipo de Mensaje de tipo 3 - Reporte de Abuso
		$data['tipoMsj']=3;
		$data['idIdiomaDefecto']=$idiomaEscritura;
		$data['pais']=$administradorUsuarios->getNombreDelPais(Session::getInstance()->userId);

		$data['estado']=$administradorUsuarios->getNombreDelEstado(Session::getInstance()->userId);

		$this->view->echoView("mensaje-form.php",$data);

        }
         else
         {
         	$data['message']= ballom_echo("messageAdminReportSent");
		    $this->view->echoView("mensaje-confirmacion.php", $data);
         }

	}

	/**
	 *
	 * Este metodo verifica si ya existe un abuso sobre un mensaje/globo
	 * @param unknown_type $idMensaje
	 * @param unknown_type $idUsuario
	 */
	private function existeAbuso($idMensaje)
	{
		$mensajesDAO= new EntityDAO("mensajes");
		$result = $mensajesDAO->get("count(*)","idMensajeRespuesta=".$idMensaje);
		$entrada=$mensajesDAO->fetchArray($result);
		if ($entrada['count(*)'] > 0 )
		    return true;
		return false;
	}

	/**
	 * Elimina de la tabla MensajesDestinatarios, la asociación de "mensaje recibido"
	 * por el usuario logueado.
	 * Si todo ok, messageDeleteOk
	 * Si hubo algún problema messageDeleteBad
	 * $_GET['idMensaje']
	 */
	public function eliminar() {
		$mensajesDestinatariosDAO= new EntityDAO("mensajesdestinatarios");
		$mensajesDestinatariosDAO->delete("idMensaje=".$_GET['idMensaje']);
		$data['message']= ballom_echo("messageDeleteOk");
		return $this->view->echoView("mensaje-confirmacion.php", $data);

	}


	/**
	 * Al hacer click en "Soltar Globo"
	 * Casos posibles:
	 * - envio ok.
	 * - envio fail.
	 * TODO: Se deberá mostrar un mensaje de lo ocurrido con dicho mensaje.
	 */
	public function enviarMensaje() {

		$data['idTipoMensaje'] = $_POST['idTipoMensaje'];
		if ($_POST['idTipoMensaje'] == '4')  //Es un Mensaje/Globo a enviar aleatoriamente
		{
			//Busco el destinatario por medio del algoritmo, buscando por idioma y corrientes. Si devuelve -1 no se encontro un destinatario.
			$destinatario = self::seleccionarDestinatario($_POST['selectIdioma'],$_POST['selectCorriente']);
		}elseif ($_POST['idTipoMensaje'] == '1')  //Es una respuesta
		{
			$destinatario = self::buscarUsuarioEscribioMsj($_POST['idMensaje']);
			$data['message'] = ballom_echo("AnswerCorrect");
		}
		elseif ($_POST['idTipoMensaje'] == '3')  //Es un reporte de abuso
		{
			if (!self::existeAbuso($_POST['idMensaje']))
        	{
        		$administradorUsuarios = new AdministradorUsuarios();
				$destinatario = $administradorUsuarios->getAdministradorId();
				$data['message']=str_ireplace("@usuario",$administradorUsuarios->getUsusarioEscribioMsj($_POST['idMensaje']),ballom_echo("messageAdminReportOk"));
        	}
        	else //Guardo el mensaje que ya se le envio el mensaje de abuso
        		$data['message']=ballom_echo("messageAdminReportSent");
		}
		elseif ($_POST['idTipoMensaje'] == '2')  //Es sugerencia de corriente
		{		$administradorUsuarios = new AdministradorUsuarios();
				$destinatario = $administradorUsuarios->getAdministradorId();
				$data['message']=str_ireplace("@usuario",$administradorUsuarios->getUsusarioEscribioMsj($_POST['idMensaje']),ballom_echo("messageAdminSuggestAirstreamOk"));
		}

		//Verifica que haya un usuario disponible para enviar el msj
		if ($destinatario <> -1 )
		{
		//Guardo el mensaje en la tabla Mensajes
		if (self::guardarMensaje($_POST['idMensaje'],$_POST['asunto'],$_POST['mensaje'],$_POST['selectCorriente'],
		$_POST['selectIdioma'],$_POST['inputtipoGlobo'],$_POST['aceptaRespuestasDefecto'],$_POST['checkboxPublicarBitacora'],
		1,Session::getInstance()->userId,$_POST['idTipoMensaje'],$_POST['idMensaje']))
           {
				//Busco el id del Mensaje del usuario actual
				$idMensaje=self::obtengerUltimoMsj(Session::getInstance()->userId);
				//Marco como enviado el msj: en la tabla de mensajesdestinatarios
				self::marcarEnviado($destinatario, $idMensaje);
				if (!$data['message']) {// si tiene mensaje entonces era con destino fijo.
				$data['message']=ballom_echo("messageSentOk");
				}
            }
		else
			{	if (!$data['message']) {// si tiene mensaje entonces era con destino fijo.
				$data['message']= $data['message']."  ".ballom_echo("messageSentFail");}
			}
			//Si el usuario adjunto archivos, lo levanto al servidor a la carpeta correspondiente del usuario
			//y el mensaje. Creo los directorios necesarios para guardar los archivos adjuntos.
			self::arrangeAdjuntarArchivos($idUsuario, $idMensaje);
         }
		else
			{	if (!$data['message']) {
					$data['message']= $data['message']."  ".ballom_echo("Nodestiny");
				}
			}


			$this->view->echoView("mensaje-confirmacion.php", $data);

		}



		public function enviarMensajeContacto() {
			$usuarioLogueado= Session::getInstance()->userId;
			$admin = new AdministradorUsuarios();
			$idIdioma=$admin->getIdiomaQueEscribe($usuarioLogueado);
			$destinatario=$_POST['idContacto'];
			$_POST['idTipoMensaje']=5; //destino especifico.
			$_POST['selectIdioma']=$idIdioma; //destino especifico.
			$data=$this->enviarMensajeDestinatario($destinatario);
			//print_r($data);
			$this->view->echoView("contacto-mensaje-confirmacion.php", $data);
		}


		/**
		 * Envia un msg, a un destino preciso.
		 * Devuelve en $data mensajes de error o confirmaciones de envio.
		 * Enter description here ...
		 * @param unknown_type $destinatario
		 */
		private function enviarMensajeDestinatario($destinatario) {
		if ($destinatario <> -1 )
		{
		//Guardo el mensaje en la tabla Mensajes
		if (self::guardarMensaje($_POST['idMensaje'],$_POST['asunto'],$_POST['mensaje'],$_POST['selectCorriente'],
		$_POST['selectIdioma'],$_POST['inputtipoGlobo'],$_POST['aceptaRespuestasDefecto'],$_POST['checkboxPublicarBitacora'],
		1,Session::getInstance()->userId,$_POST['idTipoMensaje'],$_POST['idMensaje']))
           {
				//Busco el id del Mensaje del usuario actual
				$idMensaje=self::obtengerUltimoMsj(Session::getInstance()->userId);
				//Marco como enviado el msj: en la tabla de mensajesdestinatarios
				self::marcarEnviado($destinatario, $idMensaje);
				if (!$data['message']) {// si tiene mensaje entonces era con destino fijo.
				$data['message']=ballom_echo("messageSentOk");
				}
            }
		else
			{	if (!$data['message']) {// si tiene mensaje entonces era con destino fijo.
				$data['message']= $data['message']."  ".ballom_echo("messageSentFail");
			}
			}
			//Si el usuario adjunto archivos, lo levanto al servidor a la carpeta correspondiente del usuario
			//y el mensaje. Creo los directorios necesarios para guardar los archivos adjuntos.
			self::arrangeAdjuntarArchivos($idUsuario, $idMensaje);
         }
		else
			{	if (!$data['message']) {
					$data['message']= $data['message']."  ".ballom_echo("Nodestiny");
				}
			}

		return $data;
		}

		/*
		private function enviarMensajeContacto() {
			$destinatario=$_POST['idContacto'];
			$data['message']=str_ireplace("@usuario",$administradorUsuarios->getUsusarioEscribioMsj($_POST['idMensaje']),ballom_echo("messageAdminReportOk"));
		}
		*/

		/**
		 *
		 * Verifica si hay archivos para adjuntar y si los llega a ver, realiza todas las acciones
		 * para subirlos al servidor, creando las carpetas correspondientes si fuera necesiario (carpeta usuario/ carpeta mensaje).
		 * @param unknown_type $idUsuario
		 * @param unknown_type $idMensaje
		 */
		private function arrangeAdjuntarArchivos($idUsuario,$idMensaje)
		{
		if (isset ($_FILES["archivos"])) {
			 //obtenemos la cantidad de elementos que tiene el arreglo archivos
			 $tot = count($_FILES["archivos"]["name"]);

			//Obtengo el id del usuario de la sesion
			$idUsuario= Session::getInstance()->userId;
			//Creo la carpeta para el usuario sino existe
			if(!is_dir("./files/".$idUsuario))
			{
				//Creo la carpeta del usuario
				@mkdir("./files/".$idUsuario, 0777);
			}
			//Creo la carpeta del mensaje dentro de la carpeta del usuario
				@mkdir("./files/".$idUsuario."/".$idMensaje, 0777);
				$upload_path="./files/".$idUsuario."/".$idMensaje."/";
			//-----------------------------------------------------------------------------------------------------//

                  if(!is_writable($upload_path))
                    die('You cannot upload to the specified directory, please CHMOD it to 777.');

				for ($i = 0; $i < $tot; $i++){
                $tipo_archivo = $_FILES['archivos']['type'][$i];
                $tamano_archivo = $_FILES['archivos']['size'][$i];
                $nombre_archivo=$_FILES['archivos']['name'][$i];
                $dir=$_FILES['archivos']['tmp_name'][$i];
                if ($nombre_archivo!=""){
                if (move_uploaded_file($_FILES['archivos']['tmp_name'][$i],$upload_path.$nombre_archivo))
                    {
						//Metodo para guardar en la tabla de mensajesadjuntos el archivo adjunto
						self::adjuntarArchivos($idMensaje,$nombre_archivo);
						$correct=true;
					}
                else
                    die($nombre_archivo." ".$tipo_archivo." ".$tamano_archivo." ".$dir." ". $_SERVER['PHP_SELF'] );
                }
				}
			}
		}

		/**
		 *
		 * Devuelve el usuario que escribio un mensaje. Funcion que se utiliza para "Responder".
		 * @param unknown_type $idMensaje
		 */
		private function buscarUsuarioEscribioMsj($idMensaje)
		{
				$mensajesDAO= new EntityDAO("mensajes");
				$result = $mensajesDAO->get("idUsuario","id=".$_POST['idMensaje']);
				$entrada=$mensajesDAO->fetchArray($result);
				return $entrada['idUsuario'];
		}

	 /**
	 * "será enviado a un usuario": Esto significa que se deberá crear una asociación
		en la tabla MensajesDestinatarios, donde el destinatario es el
		que cumple las reglas arriba descriptas.
	 *nm
	 * @param idDestinatario
	 * @param leido=false
	 * @param fechaHoraEnvio=now()
	 */
	public function marcarEnviado($idDestinatario, $idMensaje, $leido) {

		$values =
    	array(
    	'leido' => 0,
		'fechaHoraEnvio'=>'now()',
		'idMensaje' =>  $idMensaje,
		'idDestinatario' => $idDestinatario,
		);

		$mensajesDestinatariosDAO= new EntityDAO("mensajesdestinatarios");
		$mensajesDestinatariosDAO->insert($values);

		return true;
	}

	public function marcarLeido($idMensaje) {
		$userId=Session::getInstance()->userId;
		    	$where =
    	array(
    	'idMensaje='.$idMensaje);

		$values =
    	array(
    	'leido' => 1,
    	'fechaHoraRecepcion'=> 'now()',
		'idMensaje' =>  $idMensaje,
		'idDestinatario' => $userId
		);

		$mensajesDestinatariosDAO= new EntityDAO("mensajesdestinatarios");
		$mensajesDestinatariosDAO->update($values,$where);

		//$this->colinaVacia();
	}

	/**
	 * Si el parametro idMensaje está establecido, se trata de un mensaje ya existente, con  lo
	 * cual se debe actualizar el mismo y todas sus asociaciones.
	 *
	 * En ambos casos ese parámetro debe viajar al formulario $data=['idMensaje']=$id del mensaje
	 * creado como nuevo/existente.
	 *
	 *
	 * Caso contrario, se debe crear como nuevo.
	 *
	 * Guardar el mensaje, y todas sus asociaciones en el modelo de datos:
	 * 			- usuarioEmisor,
	 * 			- corrienteDestino,
	 * 			- idiomaEscritura,
	 * 			- titulo
	 * 2. Si tiene establecido publicaEnBitacora, debe agregarlo como entrada a la misma.
	 * $_GET['idMensaje']
	 * $_GET['asunto']
	 * $_GET['mensaje']
	 * $_GET['idIdiomaEscritura']
	 * $_GET['idCorriente']
	 * $_GET['idGlobo']
	 *
	 * ..
	 * @return true todo ok, false algún problema al guardar.
	 */
	public function guardarMensaje($idMensaje,$asunto,$mensaje,$selectCorriente,
		$selectIdioma,$inputtipoGlobo,$aceptarRespuesta,$checkboxPublicarBitacora,
		$soltarCielo,$id,$idTipoMensaje,$idMensajeRespuesta) {

		$adminMensajes= new AdministradorMensajes();
		//Obtengo los valores del check de publicarBitacora y noAceptarRespuesta, sino lo chequeo viene vacio. Si lo chequeo viene con valor 1.
		if ($checkboxPublicarBitacora!="") //No esta  chequeado si viene vacio
			$publicarBitacora=0;
		else
			$publicarBitacora=1;


		if ($aceptarRespuesta!="")
			$aceptarRespuesta =1;
		else
			$aceptarRespuesta =0;

		$corriente=$selectCorriente;

		$idTipoMensaje=$idTipoMensaje;

		$idIdioma=$selectIdioma;
		$idTipoGlobo = $inputtipoGlobo;

		//Si el mensaje es una respuesta pongo el idioma y la corriente
		//del mensaje original
		if ($idTipoMensaje==1)
		{
			$mensajesDAO= new EntityDAO("mensajes");
		    $result = $mensajesDAO->get("*","id=".$_POST['idMensaje']);
			$entrada=$mensajesDAO->fetchArray($result);
			$corriente = $entrada['idCorriente'];
			$idIdioma= $entrada['idIdioma'];
			$idTipoGlobo= $entrada['idGlobo'];
		}



		$values =
    	array(
    	'asunto' => $asunto,
    	'mensaje'=> $mensaje,
		'fechaHoraCreacion'=>'now()',
		'aceptaRespuesta' =>  $aceptarRespuesta,
		'publicarBitacora' => $publicarBitacora,
		'soltarCielo' => 1,
		'idIdioma' => $idIdioma,
		'idCorriente' => $corriente,
		'idUsuario' => $id,
		'idGlobo' => $idTipoGlobo,
		'idTipoMensaje' =>$idTipoMensaje,
		);

		//Si es un reporte de abuso, le agrego al campo idMensajeRespuesta el msj de abuso y seteo con cualquier valor el tipo de globo y la corriente ya que no importa
		if ($idTipoMensaje==3)
		{
				$values =
    	array(
    	'asunto' => $asunto,
    	'mensaje'=> $mensaje,
		'fechaHoraCreacion'=>'now()',
		'aceptaRespuesta' =>  $aceptarRespuesta,
		'publicarBitacora' => $publicarBitacora,
		'soltarCielo' => 1,
		'idIdioma' => $idIdioma,
		'idCorriente' => 1,
		'idUsuario' => $id,
		'idGlobo' => 1,
		'idTipoMensaje' =>$idTipoMensaje,
    	'idMensajeRespuesta' =>$idMensajeRespuesta,
		);

		}
		elseif ($idTipoMensaje==5) {
				$values =
    	array(
    	'asunto' => $asunto,
    	'mensaje'=> $mensaje,
		'fechaHoraCreacion'=>'now()',
		'aceptaRespuesta' =>  $aceptarRespuesta,
		'publicarBitacora' => $publicarBitacora,
		'soltarCielo' => 1,
		'idIdioma' => $idIdioma,
		'idCorriente' => 1,
		'idUsuario' => $id,
		'idGlobo' => 1,
		'idTipoMensaje' =>$idTipoMensaje
		);
		}	elseif ($idTipoMensaje==2) {
			$values=$adminMensajes->crearSugerenciaDeCorriente($id, $asunto, $mensaje,$idIdioma);

		}




		$mensajesDAO= new EntityDAO("mensajes");
		$insert = $mensajesDAO->insert($values);

		//Si no esta chequeado el "no publicar en bitacora" lo agrego a la bitacora
		if ($insert and $publicarBitacora=='1')
		{
			self::publicarEntradaBitacora($asunto,$mensaje,$id);
		}


		return $insert;

	}


	/**
	 *
	 Selecciona un usuario al azar que cumpla las reglas:

	  1 - Es un usuario que se encuentra suscripto a la misma corriente.
	  2 - Es un usuario que puede leer el idioma en que fue escrito el mensaje.
	  4 - Es usuario que nunca leyó el mensaje.
	  3 - Obviamente no es el usuario logueado.

	 * @param $_GET['idIdiomaEscritura']
	 * @param $_GET['idCorriente']
	 * @param Session->id (logued user)
	 * @return el id del destinatario y en $data el msg de error correspondiente
	 */
	public function seleccionarDestinatario($idIdiomaEscritura,$idCorriente,$parametro ){
		            //Obtengo el id de idioma, id de corriente y id de Usuario

            $id= Session::getInstance()->userId;

			$possibleUsersPost = array();

			//Obtengo los id de usuarios que cumplen los requisitos del idioma del globo.
			$idiomaDAO = new EntityDAO("idiomausuarioslectura");
			$resultIdioma= $idiomaDAO->get('*','idIdioma='.$idIdiomaEscritura.' AND idUsuario!='.$id);

			$contador=0;

            while ($entradaIdiomasUsuario = $idiomaDAO->fetchArray($resultIdioma) )
			{

				if ($entradaIdiomasUsuario['idIdioma']==$idIdiomaEscritura)
				{
				$possibleUsersPost[$contador]=$entradaIdiomasUsuario['idUsuario'];
				$contador = $contador + 1;
				}
			}



			$possibleUsers = array();
			$contador2=0;
			for ($i=0; $i<count($possibleUsersPost);$i++)
			{
				$corrientesUsuariosDAO= new EntityDAO("corrientesusuarios");
                $resultCorrienteUsuarios = $corrientesUsuariosDAO->get('*','idUsuario='.$possibleUsersPost[$i]);
				while ($entradaCorriente = $corrientesUsuariosDAO->fetchArray($resultCorrienteUsuarios) )
				{
					if ($idCorriente == $entradaCorriente['idCorriente'])
					{
					//Si vino un arreglo con idUsuarios, estos no pueden ser parte de la seleccion del nuevo usuario a enviar
					//porque ya recibio el msj
					if ((count($parametro)>0) )
						{
							if (self::contieneUsuario($parametro,$entradaCorriente['idUsuario'])==false)
							{
							$possibleUsers[$contador2]=$entradaCorriente['idUsuario'];
							$contador2=$contador2+1;
							}
						}
						else
						{
							$possibleUsers[$contador2]=$entradaCorriente['idUsuario'];
							$contador2=$contador2+1;
						}
					}
				}
			}




		    $get= count($possibleUsers)-1;
            $number= rand(0,$get);

            /***************************************************************************************/
            //Devuelvo el Id de Usuario que va a recibir el globo. Si no hay destinatarios mostramos un msj de que intente nuevamente.
			if (count($possibleUsers)>0)
				$aux=$possibleUsers[$number];
			else
				$aux=-1;

            return $aux;


	}


	/**
	 *
	 * Funcion que se utiliza para verifiacar si un usuario ya recibio un msj. Perteneciente
	 * al metodo "SeleccionarDestinatario".
	 * @param unknown_type $arreglo
	 * @param unknown_type $id
	 */
	private function contieneUsuario($arreglo, $id)
	{
		for ($i=0; $i<count($arreglo)-1; $i++)
		{
			if ($arreglo[$i]==$id)
			    return true;
		}

	return false;
	}

	public function publicarEntradaBitacora($asunto, $mensaje, $idUsuario) {
		$values =
    	array(
    	'texto' => $asunto." - ".$mensaje,
    	'fechaHora'=>'now()',
		'idUsuario'=>$idUsuario,
		);

		$bitacoraDAO= new EntityDAO("bitacora");
		$bitacoraDAO->insert($values);

		return true;
	}


	/**
	 *
	 * Para adjuntar archivos se debe haber guardado el borrador del mensaje.
	 *
	 * Guarda los archivos adjuntos en la carpeta destinada para guardar los adjuntos del mensaje del
	 * usuario logueado. La carpeta se denominará: idUsuario/idMensaje/archivo.extension.
	 *
	 * Relaciona un mensaje que se guardó ($idMensaje)  con uno o más archivos subidos (adjuntos)
	 * en el formulario en la tabla MensajesArchivosAdjuntos. En tal tabla se mantendrá solo el nombre
	 * del archivo ya que la ubicación de la carpeta se deduce de la lógica aplicada en punto
	 * anterior.
	 *
	 * Restricción: se puede adjuntar hasta dos archivos adjuntos por mensaje y en conjunto
	 * no pueden superar no más de 2mb por mensaje. Mensajes de error:  Sección Message Attachment.

	 * $_FILES['archivo1']['tmp_name']
	 * $_FILES['archivo2']['tmp_name']
	 * $_GET['idMensaje']
	 *
	 * Ver proyecto papifutbol, perfil adminweb, notas-abm-enviar.php y encapsular comportamiento
	 *
	 * Si todo ok, vuelve al mensaje que se está redactando y al cual se le adjuntaron los mensajes.
	 * Si archivo supera tamaño: volver al formulario, con mensaje de error correspondiente.
	 *
	 * Se deben completar para que se muestren en el formulario los nombres de los archivos adjuntos.
	 * El formulario mensaje-form.php debe mostrar el nuevo adjunto como parte del mensaje a enviar.
	 *
	 * tabla: mensajesarchivosadjuntos
	 */
	public function adjuntarArchivos($idMensaje,$nombre_archivo)
	{
		$values =
    	array(
    	'archivo' => $nombre_archivo,
    	'idMensaje'=>$idMensaje
		);

		$mensajesarchivosadjuntosDAO= new EntityDAO("mensajesarchivosadjuntos");
		$mensajesarchivosadjuntosDAO->insert($values);

		return true;
	}

	/**
	 *
	 * Eliminar la referencia desde la base de datos del archivo adjunto.
	 * Eliminar el archivo del disco de la ubicaciï¿½n correspondiente.
	 * @param unknown_type $data
	 *
	 * El formulario mensaje-form.php debe mostrar que el adjunto que ya no existe.
	 * tabla: mensajesarchivosadjuntos
	 *
	 * Ver proyecto papifutbol(action=delete-imagen) perfil adminweb, notas-abm-enviar.php y encapsular comportamiento
	 */
	public function desadjuntarArchivos() {

		$this->view->echoView("mensaje-form.php",$data);


	}

	public function sugerirCorriente() {

		$idUsuario= Session::getInstance()->userId;

		$administradorIdiomas = new AdministradorIdiomas();

		$idiomas = $administradorIdiomas->getAllIdiomas();
		$data['idiomas']=$idiomas;

		$administradorUsuarios = new AdministradorUsuarios();

		$idiomaEscritura=$administradorUsuarios->getIdiomaQueEscribe($idUsuario);

		$data['idIdiomaDefecto']=$idiomaEscritura;

		// harcoded: utilizar funciones:
		$data['pais']=$administradorUsuarios->getNombreDelPais($idUsuario);

		$data['estado']=$administradorUsuarios->getNombreDelEstado($idUsuario);

		$this->view->echoView("corriente-sugerida-form.php", $data);

	}

 	public function enviarMensajeContactoForm() {
    	$data['idGlobo']=$_GET['idGlobo'];
		$administradorUsuarios = new AdministradorUsuarios();
		//datos para el form a quien va dirigido,
		$idContacto=$_GET['idContacto'];
		if ($idContacto) {
			$entradaUsuarios=$administradorUsuarios->getUsuario($idContacto);
			$data['msjDirigido'] = "Dirigido a ".$entradaUsuarios['apellidos']." ".$entradaUsuarios['nombres'];
			$data['idContacto']=$idContacto; //si fuese dirigido
		}

        $idUsuario= Session::getInstance()->userId;

        $administradorCorrientes= new AdministradorCorrientes();
        $corrientes=$administradorCorrientes->getCorrientesDelUsuario($idUsuario);

		$data['corrientes']=$corrientes;
		$administradorIdiomas = new AdministradorIdiomas();

		$idiomas = $administradorIdiomas->getAllIdiomas();
		$data['idiomas']=$idiomas;

		//datos para el form del usuario logueado,
		$usuario=$administradorUsuarios->getUsuario($idUsuario);

		$adminRegiones = new AdministradorRegiones();

		$data['idIdiomaDefecto']=$usuario['idIdiomaEscrituraDefecto'];
		$data['pais']=$adminRegiones->getNombrePais($usuario['idPais']);
		$data['estado']=$adminRegiones->getNombreEstado($usuario['idEstado']);
		$data['aceptaRespuestasDefecto']=$usuario['aceptaRespuestasDefecto'];

		$this->view->echoView("contacto-mensaje-form.php",$data);

    }


}



