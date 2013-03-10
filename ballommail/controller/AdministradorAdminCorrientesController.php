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

class AdministradorAdminCorrientesController{

	private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}

	/**
	 *
	 * Método privado que arma un listado de corrientes que posee BalloonMail.
	 */
	private function getCorrientes($page)
	{
		$config = ConfigAdmin::singleton();

		if ($page=="")
			$page=1;

		$idCorrientes = array();
		$nombreCorrientes = array();
		$corrientesDAO = new EntityDAO("corrientes");

		$resultTotalCorrientes = $corrientesDAO->get("*","active=true");
		$size=$corrientesDAO->getTotalFilas($resultTotalCorrientes);

		$resultCorrientes = $corrientesDAO->getPage("*",$config->get('entradasPorCorrientes'),$page,"active=true", "nombre", "asc");
		$i =0;
		while ($entrada=$corrientesDAO->fetchArray($resultCorrientes))
		{
			$idCorrientes[$i]=$entrada['id'];
			$nombreCorrientes[$i]=$entrada['nombre'];
			$i=$i+1;
		}

		$result = array();
		$result[0] =$idCorrientes;
		$result[1] =$nombreCorrientes;
		$result[2]= ceil($size / $config->get('entradasPorCorrientes') );
		$result[3] = $page;
		return $result;
	}

	/**
	 *
	 * Obtiene el listado de Corrientes que tiene la aplicación.
	 */
	public function getListadoCorrientes() {
		$result = self::getCorrientes($_GET['page']);
		$data['idCorrientes']=$result[0];
		$data['nombreCorrientes']=$result[1];
		$data['cantPaginas']= $result[2];
		$data['paginaSeleccionada'] = $result[3];
		$this->view->echoView("corrientes-listado.php",$data);
	}

	/**
	 *
	 * Devuelve el formulario para modificar una corriente
	 */
	public function getFormModificarCorriente()
	{
		if ($_GET['accion']=='modifica')
		{
			$idClaveLenguaje = array();
			$clave = array();
			$idioma = array();

			$corrientesDAO = new EntityDAO("corrientes");
			$resultCorrientes = $corrientesDAO->get("*","id=".$_GET['idCorriente']);
			$corriente=mysql_fetch_object($resultCorrientes);
			$data['claveCorriente']=$corriente->nombre;

			$idiomasDAO = new EntityDAO("idiomas");

			$resultIdiomas = $idiomasDAO->get("*","");
			$i =0;
			while ($entrada=$idiomasDAO->fetchArray($resultIdiomas))
			{
				$idIdioma=$entrada['id'];

				$clavesLenguajeDAO = new EntityDAO("claveslenguajes");

				$resultClavesLenguaje = $clavesLenguajeDAO->get("*","clave='".$corriente->nombre."' and idIdioma=".$idIdioma);
				$claveLenguajeIdioma1=mysql_fetch_object($resultClavesLenguaje);
				$idClaveLenguaje[$i]=$claveLenguajeIdioma1->idIdioma;
				$clave[$i]=$claveLenguajeIdioma1->valor;
				$idioma[$i]=$entrada['nombre'];
				$i=$i+1;
			}

			$data['clave']=$clave;
			$data['idClaveLenguaje']=$idClaveLenguaje;
			$data['idioma']=$idioma;
			$data['idCorriente']=$_GET['idCorriente'];
		}
		else
		{
			$idiomasDAO = new EntityDAO("idiomas");
			$resultIdiomas = $idiomasDAO->get("*","");
			$i =0;
			while ($entrada=$idiomasDAO->fetchArray($resultIdiomas))
			{
				$idIdioma=$entrada['id'];

				$clavesLenguajeDAO = new EntityDAO("claveslenguajes");

				$resultClavesLenguaje = $clavesLenguajeDAO->get("*","clave='".$corriente->nombre."' and idIdioma=".$idIdioma);
				$claveLenguajeIdioma1=mysql_fetch_object($resultClavesLenguaje);
				$idClaveLenguaje[$i]=$claveLenguajeIdioma1->idIdioma;
				$clave[$i]=$claveLenguajeIdioma1->valor;
				$idioma[$i]=$entrada['nombre'];
				$i=$i+1;
			}
			$data['clave']=$clave;
			$data['idClaveLenguaje']=$idClaveLenguaje;
			$data['idioma']=$idioma;
			$data['idCorriente']=$_GET['idCorriente'];
		}

		$data['accion']=$_GET['accion'];
		$this->view->echoView("corrientes-alta-form.php",$data);
	}

	/**
	 *
	 * Método privado: Verifica si existe la clave de lenguaje
	 * @param unknown_type $claveLenguaje
	 */
	private function existeClaveLenguaje($claveLenguaje,$accion,$idCorriente)
	{

		$corrienteDAO = new EntityDAO("corrientes");
		$resultCorrientes = $corrienteDAO->get("*","");
		$i =0;
		if ($accion=='alta') //alta
		{
		while ($entrada=$corrienteDAO->fetchArray($resultCorrientes))
			{
			if ($claveLenguaje==$entrada['nombre'])
				return true;
			}
			return false;
		}
		else //Modifica
		{
			while ($entrada=$corrienteDAO->fetchArray($resultCorrientes))
			{
			if (($claveLenguaje==$entrada['nombre']) && ($entrada['id']!=$idCorriente))
				return true;
			}
			return false;
		}

	}

	/**
	 *
	 * Método privado: Realiza el alta de la corriente en las tablas: claveLenguaje y en la tabla corrientes
	 * @param unknown_type $claveCorriente
	 * @param unknown_type $corrienteIdioma1
	 * @param unknown_type $corrienteIdioma2
	 */
	private function altaCorriente($claveCorriente,$corrienteIdioma1,$idIdioma1,$corrienteIdioma2,$idIdioma2)
	{
		//Inserto en la tabla clavesLenguajes para cada idioma
		$clavesLenguajeDAO = new EntityDAO("claveslenguajes");
		$idiomasDAO = new EntityDAO("idiomas");

		$resultIdiomas=$idiomasDAO->get("*","");
		while ($entrada=$idiomasDAO->fetchArray($resultIdiomas))
		{
				//Defino que corrienteIdioma voy a guardar dependiendo el idioma
				if ($entrada['id']==$idIdioma1)
					$valor=$corrienteIdioma1;
				if ($entrada['id']==$idIdioma2)
					$valor=$corrienteIdioma2;
				$valuesIdioma =
    						array(
    								'clave' => $claveCorriente,
									'idIdioma'=>$entrada['id'],
									'valor' =>  $valor,
								);

				$clavesLenguajeDAO->insert($valuesIdioma);
		}

		//Por ultimo inserto en la tabla Corrientes
		$corrientesDAO = new EntityDAO("corrientes");
		$valuesCorrientes =
    	array(
    	'nombre' => $claveCorriente,
		'descripcion'=>$claveCorriente.'Description',
    	'active' => true,
		);

		$corrientesDAO->insert($valuesCorrientes);

	}

	/**
	 *
	 * Método privado: Modificar la corriente y las claves de lenguaje de las mismas
	 * @param unknown_type $idCorriente
	 * @param unknown_type $claveCorriente
	 * @param unknown_type $corrienteIdioma1
	 * @param unknown_type $corrienteIdioma2
	 */
	private function modificarCorriente($idCorriente,$claveCorriente,$corrienteIdioma1,$idIdioma1,$corrienteIdioma2,$idIdioma2)
	{

			//Obtengo el ultimo clave de Corriente
			$corrientesDAO = new EntityDAO("corrientes");
			$resultCorriente = $corrientesDAO->get("*","id=".$idCorriente);
			$corriente=mysql_fetch_object($resultCorriente);


			$values = array('nombre' => $claveCorriente);
    		$where = array("id=".$idCorriente);
			$corrientesDAO->update($values,$where);

			$clavesLenguajeDAO = new EntityDAO("claveslenguajes");
			$values2 = array('valor' => $corrienteIdioma1,
							'clave' => $claveCorriente,);
    		$where2 = array("clave='".$corriente->nombre."' and idIdioma=".$idIdioma1);
			$clavesLenguajeDAO->update($values2,$where2);

			$values3 = array('valor' => $corrienteIdioma2,
							 'clave' => $claveCorriente,);
    		$where3 = array("clave='".$corriente->nombre."' and idIdioma=".$idIdioma2);
			$clavesLenguajeDAO->update($values3,$where3);

	}


	/**
	 *
	 * Enter description here ...
	 */
	public function getAltaModificarCorriente()
	{
		if (self::existeClaveLenguaje($_POST['claveCorriente'],$_GET['accion'],$_GET['idCorriente']))
		{
			$data['mensajeError']="Error: La clave ya existe";
			//Vuelvo a cargar los datos para cargarlos en el formulario
			$idClaveLenguaje = array();
			$clave = array();
			$idioma = array();

			$corrientesDAO = new EntityDAO("corrientes");
			$resultCorrientes = $corrientesDAO->get("*","id=".$_GET['idCorriente']);
			$corriente=mysql_fetch_object($resultCorrientes);
			$data['claveCorriente']=$corriente->nombre;

			$idiomasDAO = new EntityDAO("idiomas");

			$resultIdiomas = $idiomasDAO->get("*","");
			$i =0;
			while ($entrada=$idiomasDAO->fetchArray($resultIdiomas))
			{
				$idIdioma=$entrada['id'];

				$clavesLenguajeDAO = new EntityDAO("claveslenguajes");

				$resultClavesLenguaje = $clavesLenguajeDAO->get("*","clave='".$corriente->nombre."' and idIdioma=".$idIdioma);
				$claveLenguajeIdioma1=mysql_fetch_object($resultClavesLenguaje);
				$idClaveLenguaje[$i]=$claveLenguajeIdioma1->idIdioma;
				$clave[$i]=$claveLenguajeIdioma1->valor;
				$idioma[$i]=$entrada['nombre'];
				$i=$i+1;
			}

			$data['clave']=$clave;
			$data['idClaveLenguaje']=$idClaveLenguaje;
			$data['idioma']=$idioma;
			$data['idCorriente']=$_GET['idCorriente'];
			$data['accion']=$_GET['accion'];
			$data['claveCorriente']=$_POST['claveCorriente'];
			$clave= array();
			$clave[0]=$_POST['corrienteIdioma1'];
			$clave[1]=$_POST['corrienteIdioma2'];
			$data['clave']=$clave;
			$data['idCorriente']=$_GET['idCorriente'];
			$this->view->echoView("corrientes-alta-form.php",$data);
		}
		else
		{
		if ($_GET['accion']=="alta")
		{
			self::altaCorriente($_POST['claveCorriente'], $_POST['corrienteIdioma1'],$_POST['idiomaCorriente1'], $_POST['corrienteIdioma2'],$_POST['idiomaCorriente2']);
		}
		else //Si no es una alta, es una modificacion
		{
			self::modificarCorriente($_GET['idCorriente'], $_POST['claveCorriente'], $_POST['corrienteIdioma1'], $_POST['idiomaCorriente1'],$_POST['corrienteIdioma2'],$_POST['idiomaCorriente2']);
		}

		//Devuelvo el listado de Corrientes si guardo bien la corriente junto con su clave
		$result = self::getCorrientes($_GET['page']);
		$data['idCorrientes']=$result[0];
		$data['nombreCorrientes']=$result[1];
		$data['cantPaginas']= $result[2];
		$data['paginaSeleccionada'] = $result[3];
		$this->view->echoView("corrientes-listado.php",$data);
		}
	}


	/**
	 *
	 * Enter description here ...
	 */
	public function eliminarCorriente()
	{
		$corrientesDAO = new EntityDAO("corrientes");
		$values = array('active' => false);
    	$where = array('id='."'".$_GET['idCorriente']."'");
		$corrientesDAO->update($values,$where);
		//Devuelvo el listado de Corrientes si guardo bien la corriente junto con su clave
		$result = self::getCorrientes($_GET['page']);
		//Variable que se utiliza para cerrar el fancyBox de la confirmación.
		$data['elimino']="eliminoOK";
		$data['idCorrientes']=$result[0];
		$data['nombreCorrientes']=$result[1];
		$data['cantPaginas']= $result[2];
		$data['paginaSeleccionada'] = $result[3];
		$this->view->echoView("corrientes-listado.php",$data);
	}
}