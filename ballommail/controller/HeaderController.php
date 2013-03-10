<?php


class HeaderController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	/**
	 *
	 * Devuelve los datos requeridos para visualizar el header  Vicente's Hill.
	 */
	public function getHeader() {
		$idContacto= $_REQUEST['idContacto'];
		$usuarioDAO = new EntityDAO("usuarios");
		$boolean=true;
		if ($idContacto) {
			$boolean=false;
   			$idUsuario=$idContacto;
		}
		else {
			$idUsuario= Session::getInstance()->userId;
		}
		$usuarioResult=$usuarioDAO->get("nombres, id, foto","id=".$idUsuario);
    	$usuario=$usuarioDAO->fetchArray($usuarioResult);
		$data['nombresHill']=$usuario['nombres'];
		$data['idHill']=$usuario['id'];
		if ($usuario['foto']!=null)
			$data['foto']="files/".$usuario['id']."/foto/".$usuario['foto'];
		else
			$data['foto']="../../imagenes/user.jpg";
		$data['esUsuarioLogueado']=$boolean;
		$data['idContacto']=$idContacto;
		$this->view->echoView("nube.php",$data);
	}


public function SubirFotoPerfil()
	{
		$upload_path="./files/".Session::getInstance()->userId."/foto/".$_FILES['archivos']['name'];
		if(!is_dir("./files/".Session::getInstance()->userId))
					@mkdir("./files/".Session::getInstance()->userId, 0777);
		{		//Creo la carpeta del usuario
			if(!is_dir("./files/".Session::getInstance()->userId."/foto"))
		{	
				@mkdir("./files/".Session::getInstance()->userId."/foto", 0777);
		}		
		}
		if (isset ($_FILES["archivos"]))
		{
		$tipo_archivo = $_FILES['archivos']['type'];
    	$tamano_archivo = $_FILES['archivos']['size'];
    	$nombre_archivo=$_FILES['archivos']['name'];
    	$dir=$_FILES['archivos']['tmp_name'];
    	if ($nombre_archivo!=""){
    	 if (copy($_FILES['archivos']['tmp_name'],$upload_path)) {
            self::adjuntarFotoPerfil(Session::getInstance()->userId,$_FILES['archivos']['name']);
			$status = "Archivo subido: <b>".$archivo."</b>";

        } else {
            $status = "Error al subir el archivo";
        }
    	}
		}

		//Devuelve la vista correspondiente
		/*
		$usuarioDAO = new EntityDAO("usuarios");
		$idContacto= $_REQUEST['idContacto'];
		$boolean=true;
		if ($idContacto) {
			$boolean=false;
   			$idUsuario=$idContacto;
		}
		else {
			$idUsuario= Session::getInstance()->userId;
		}
		$usuarioResult=$usuarioDAO->get("nombres, id, foto","id=".$idUsuario);
    	$usuario=$usuarioDAO->fetchArray($usuarioResult);
		$data['nombresHill']=$usuario['nombres'];
		$data['idHill']=$usuario['id'];
		if ($usuario['foto']!=null)
			$data['foto']="files/".$usuario['id']."/foto/".$usuario['foto'];
		else
			$data['foto']="vacio";
		$data['esUsuarioLogueado']=$boolean;
		
		 $this->view->echoView("contenidoIndex.php",$data);*/
		//self::getHeader();
		$data['elimino']='fotoperfil';
		//header("");
		$this->view->echoView("contenidoIndex.php",$data);
		//header('location:"../contenidoIndex.php?menuOption=hill"');		
	}

	public function adjuntarFotoPerfil($idUsuario,$nombreFoto)
	{
		$values = array('foto' => $nombreFoto);
    	$where = array("id=".Session::getInstance()->userId);
		$usuariosDAO= new EntityDAO("usuarios");
		$usuariosDAO->update($values,$where);

		return true;
	}


	public function EliminarFotoPerfil()
	{
		$usuarioDAO = new EntityDAO("usuarios");
		$values = array('foto' => null);
    	$where = array("id=".Session::getInstance()->userId);
		$usuarioDAO->update($values,$where);
		$idContacto= $_REQUEST['idContacto'];
		$boolean=true;
		if ($idContacto) {
			$boolean=false;
   			$idUsuario=$idContacto;
		}
		else {
			$idUsuario= Session::getInstance()->userId;
		}
		$usuarioResult=$usuarioDAO->get("nombres, id, foto","id=".$idUsuario);
    	$usuario=$usuarioDAO->fetchArray($usuarioResult);
		$data['nombresHill']=$usuario['nombres'];
		$data['idHill']=$usuario['id'];
		if ($usuario['foto']!=null)
			$data['foto']="files/".$usuario['id']."/foto/".$usuario['foto'];
		else
			$data['foto']="vacio";
		$data['esUsuarioLogueado']=$boolean;
		$data['elimino']='fotoperfil';
		$this->view->echoView("contenidoIndex.php",$data);

	}
}

?>