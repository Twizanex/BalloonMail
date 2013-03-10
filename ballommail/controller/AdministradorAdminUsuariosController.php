<?php

include ('../../model/AdministradorUsuarios.php');
include ('../../commons/ConfigAdmin.php');

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

class AdministradorAdminUsuariosController{
	
	
	private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $page
	 */
	private function armarListadoUsuarios($page)
	{
		$config = ConfigAdmin::singleton();		 		
				
		if ($page=="")
			$page=1;							
		
	 	$result = array();
		$idUsuarios = array();
		$emailUsuarios = array();		
		$bloqueado = array();
		$usuariosDAO = new EntityDAO("usuarios");        	
		$resultTotalUsuarios = $usuariosDAO->get("*","");
		$size=$usuariosDAO->getTotalFilas($resultTotalUsuarios);			
		$resultUsuarios = $usuariosDAO->getPage("*",$config->get('entradasPorListadoUsuario'),$page,"", "email", "desc");		
		$i =0;
		while ($entrada=$usuariosDAO->fetchArray($resultUsuarios)) 
		{							
			$idUsuarios[$i]=$entrada['id'];			
			$emailUsuarios[$i]=$entrada['email'];
			if ($entrada['bloqueado']!=null)
			{
				if ($entrada['bloqueado'])
				$bloqueado[$i]=1;
				else
				$bloqueado[$i]=0;		
			}
			else
			$bloqueado[$i]=0;	
			$i=$i+1;					
		}
		$usuariosDAO->freeResult($resultUsuarios);	

		$result[0]=$idUsuarios;
		$result[1]=$emailUsuarios;
		$result[2]= ceil($size / $config->get('entradasPorListadoUsuario') );
		$result[3] = $page;
		$result[4] = $bloqueado;
		return $result;		
	}
	
	
	
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function getListadoUsuarios() {
		$result=self::armarListadoUsuarios($_GET['page']);	
		$data['idUsuarios']=$result[0];
		$data['emailUsuarios']=$result[1];
		$data['cantPaginas']= $result[2];
		$data['paginaSeleccionada'] = $result[3];
		$data['bloqueado']=$result[4];
		$this->view->echoView("usuarios-listado.php ",$data);
	}
	
	
	
/**
	 * 
	 * Enter description here ...
	 */
	public function getListadoSugerenciasCorrientes() {

		$config = ConfigAdmin::singleton();		 		
				
		if ($_GET['page']=="")
			$page=1;	
		else 
			$page = $_GET['page'];					
		
        $mailUsuarios = array();
		$corrienteSugerida = array();		
		$fechaMensaje = array();
		$administradorUsuarios = new AdministradorUsuarios(); 
		
		$mensajesDestinatariosDAO = new EntityDAO("mensajesdestinatarios");        						
		$resultMensajesDestinatariosTotal = $mensajesDestinatariosDAO->get("*","idDestinatario=".$administradorUsuarios->getAdministradorId()." AND leido=0");
		$size=$mensajesDestinatariosDAO->getTotalFilas($resultMensajesDestinatariosTotal);
		$resultMensajesDestinatarios = $mensajesDestinatariosDAO->getPage("*",$config->get('entradasPorListadoSugerenciaCorrientes'),$page,"idDestinatario=".$administradorUsuarios->getAdministradorId()." AND leido=0","fechaHoraEnvio", "desc");
		$i =0;
		while ($entrada=$mensajesDestinatariosDAO->fetchArray($resultMensajesDestinatarios)) 
		{
			$fechaMensaje[$i]=$entrada['fechaHoraEnvio'];							
			$mensajesDAO = new EntityDAO("mensajes");
			$resultMensajes = $mensajesDAO->get("*","id=".$entrada['idMensaje']." AND idTipoMensaje=2");
			while ($entradaMensajes=$mensajesDAO->fetchArray($resultMensajes)) 
				{
					//Obtengo el usuario
					$usuariosDAO = new EntityDAO("usuarios");
					$resultUsuarios = $usuariosDAO->get("*","id=".$entradaMensajes['idUsuario']);
					$usuarioEncontrado=mysql_fetch_object($resultUsuarios);
					$mailUsuarios[$i]=$usuarioEncontrado->email;															
					$corrienteSugerida[$i]=$entradaMensajes['asunto'].": ".$entradaMensajes['mensaje'];																							
					$i=$i+1;
				}			
		}
		
		$data['emailUsuarios']=$mailUsuarios;
		$data['corrientesSugeridas']=$corrienteSugerida;	
		$data['fechaHoraRecepcion']=$fechaMensaje;	
		$data['cantidadPaginas']= ceil($size / $config->get('entradasPorListadoSugerenciaCorrientes') );
		$data['paginaSeleccionada'] = $page;
		$this->view->echoView("usuarios-corrientes-sugeridas-listado.php",$data);
	}
	
	/**
	 * 
	 * Obtener el formulario de Advertencia
	 */
	public function getFormAdvertencia()
	{		
		$usuariosDAO= new EntityDAO("usuarios");
		$resultUsuarios=$usuariosDAO->get('*','id='.$_GET['idUsuario']);
		$usuario = mysql_fetch_object($resultUsuarios);
		$data['Usuario']=$usuario->email;
		$this->view->echoView("usuarios-advertencia-form.php",$data);
	}
	
	public function envioAdvertencia()
	{								
		
		$administradorUsuarios = new AdministradorUsuarios();
				 
		//Inserto en la tabla mensajes
		$values =
    	array(
    	'asunto' => "BalloonMail: Advertencia",
    	'mensaje'=> $_POST['txtAdvertencia'],
		'fechaHoraCreacion'=>'now()',
		'aceptaRespuesta' =>  0,
		'publicarBitacora' => 0,
		'soltarCielo' => 1,
		'idIdioma' => 1,
		'idCorriente' => 1,
		'idUsuario' => $administradorUsuarios->getAdministradorId(),
		'idGlobo' => 1,
		'idTipoMensaje' =>3,
		);
				
		$mensajesDAO= new EntityDAO("mensajes");
		$insert = $mensajesDAO->insert($values);
		
		//Inserto en la tabla mensajesdestinatarios
		$idMensaje=self::obtengerUltimoMsj($administradorUsuarios->getAdministradorId());
		$values =
    	array(
    	'leido' => 0,
		'fechaHoraEnvio'=>'now()',
		'idMensaje' =>  $idMensaje,
		'idDestinatario' => $_POST['idUsuario'],
		);

		$mensajesDestinatariosDAO= new EntityDAO("mensajesdestinatarios");
		$mensajesDestinatariosDAO->insert($values);
		
		//Envio el mail al usuario advirtiendole de la advertencia
		self::enviarMail($_POST['idUsuario'],$_POST['txtAdvertencia']);
		
		
		//Devuelvo el listado de usuarios
		$result=self::armarListadoUsuarios(1);	
		$data['idUsuarios']=$result[0];
		$data['emailUsuarios']=$result[1];
		$data['cantPaginas']= $result[2];
		$data['paginaSeleccionada'] = $result[3];	
		$data['bloqueado']=$result[4];	
		$this->view->echoView("usuarios-listado.php ",$data);		
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $idUsuario
	 * @param unknown_type $cuerpo
	 */
	private function enviarMail($idUsuario,$cuerpo)
	{
		//Obtengo datos del usuario
		$usuariosDAO = new EntityDAO("usuarios");        				
		$resultUsuarios = $usuariosDAO->get("*","id=".$idUsuario);
		$usuario = mysql_fetch_object($resultUsuarios);
		
		//Estoy recibiendo el formulario, compongo el cuerpo 
   		$cuerpo = "BalloonMail: Advertencia\n"; 
   		$cuerpo .= "Nombre: " . $usuario->apellidos." ".$usuario->nombres . "\n"; 
   		$cuerpo .= "Email: " . $usuario->email . "\n"; 
   		$cuerpo .= $cuerpo; 
		
   		 $headers = "From: admin@balloonmail.com \r\n";
	   	//mando el correo...
	   	 	   		   	
   		mail($usuario->email,'BalloonMail: Envio de Advertencia',$cuerpo);   		
	}
	
	/**
	 * 
	 * Enter description here ...
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
	 * Enter description here ...
	 */
	public function bloqueoUsuario()
	{				
			$usuariosDAO = new EntityDAO("usuarios");	
			$values = array('bloqueado' => true);
    		$where = array("id=".$_GET['idUsuario']);
			$usuariosDAO->update($values,$where);

			$result=self::armarListadoUsuarios(1);	
			//Variable que se utiliza para cerrar el fancyBox de la confirmación.
			$data['elimino']="bloqueoOK";
			$data['idUsuarios']=$result[0];
			$data['emailUsuarios']=$result[1];
			$data['cantPaginas']= $result[2];
			$data['paginaSeleccionada'] = $result[3];
			$data['bloqueado']=$result[4];		
			$this->view->echoView("usuarios-listado.php ",$data);
	}
	
	/**
	 * 
	 * Elimina un usuario completamente de la aplicación
	 */
	public function eliminarUsuario()
	{			
			//Obtengo el idUsuario
			$idUsuario = $_GET['idUsuario'];
			
			//Creo las DAO para cada una de las tablas
			$usuariosDAO = new EntityDAO("usuarios");
			$mensajesDAO = new EntityDAO("mensajes");
			$mensajesDestinatariosDAO = new EntityDAO("mensajesdestinatarios");			
			$bitacoraDAO = new EntityDAO("bitacora");
			$conexionesDAO = new EntityDAO("conexiones");
			$contactosDAO = new EntityDAO("contactos");
			$corrientesUsuariosDAO = new EntityDAO("corrientesusuarios");
			$idiomausuarioslecturaDAO = new EntityDAO("idiomausuarioslectura");		
			$mensajesarchivosadjuntosDAO = new EntityDAO("mensajesarchivosadjuntos");
			
			//Elimino los mensajes que tiene el usuario y los archivos adjuntos de los mismos			
			$resultMensajesDestinatarios = $mensajesDestinatariosDAO->get("*","idDestinatario=".$idUsuario);
			while ($entradaMensajesDestinatario=$mensajesDestinatariosDAO->fetchArray($resultMensajesDestinatarios)) 
				{
					$idMensaje=$entradaMensajesDestinatario['idMensaje'];
					$mensajesDestinatariosDAO->delete("id=".$entradaMensajesDestinatario['id']);
					$mensajesarchivosadjuntosDAO->delete("idMensaje=".$idMensaje);
					$mensajesDAO->delete("id=".$idMensaje);
				}
				
			//Elimino los mensajes que envio el usuario y los archivos adjuntos de los mismos
			$resultMensajes = $mensajesDAO->get("*","idUsuario=".$idUsuario);
			while ($entradaMensajes=$mensajesDAO->fetchArray($resultMensajes)) 
				{
					$mensajesDestinatariosDAO->delete("idMensaje=".$entradaMensajes['id']);
					$mensajesarchivosadjuntosDAO->delete("idMensaje=".$entradaMensajes['id']);						
					$mensajesDAO->delete("id=".$entradaMensajes['id']);
				}
			
			//Elimino el directorio fisico del usuario (si existe)
			if(is_dir("./files/".$idUsuario))
			{							
				@rmdir("./files/".$idUsuario); 
			}
			
			
			//Elimino de la bitacora
			$bitacoraDAO->delete("idUsuario=".$idUsuario);
			
			//Elimino las conexiones
			$conexionesDAO->delete("idUsuario=".$idUsuario);
			
			//Elimino los contactos
			$contactosDAO->delete("idUsuario=".$idUsuario);
			$contactosDAO->delete("idUsuarioContacto=".$idUsuario);
			
			//Elimino los corrientesUsuarios
			$corrientesUsuariosDAO->delete("idUsuario=".$idUsuario);
			
			//Elimino los idiomausuarioslectura
			$idiomausuarioslecturaDAO->delete("idUsuario=".$idUsuario);
			
			//Elimino el usuario!
			$usuariosDAO->delete("id=".$idUsuario);	
			$result=self::armarListadoUsuarios(1);	
			//Variable que se utiliza para cerrar el fancyBox de la confirmación.
			$data['elimino']="eliminoOK";
			$data['idUsuarios']=$result[0];
			$data['emailUsuarios']=$result[1];
			$data['cantPaginas']= $result[2];
			$data['paginaSeleccionada'] = $result[3];		
			$data['bloqueado']=$result[4];
			$this->view->echoView("usuarios-listado.php ",$data);
		
	}
	

	


}