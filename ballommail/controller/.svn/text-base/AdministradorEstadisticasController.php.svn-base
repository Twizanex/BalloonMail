<?php

include ('../../commons/View.php');
include ('../../commons/EntityDAO.php');
include ('../../commons/Session.php');

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

class AdministradorEstadisticasController{

	 private $view=NULL;

	function __construct()
	{
	    $this->view = new View();
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function getUsuariosConexiones() {

		$config = ConfigAdmin::singleton();
		
		if ($_GET['page']=="")
			$page=1;
		else
			$page=$_GET['page'];
		
		$usuariosDAO = new EntityDAO("usuarios");
		
		$fechaHasta="";
		$fechaDesde="";		
		if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			$fechaHasta=$_POST['fechaHasta'];
			$fechaDesde=$_POST['fechaDesde'];
			$page=$_POST['page'];
		}	
		else		
		{
			$fechaHasta=$fecha_dia = date  ("d")."/".$fecha_mes = date  ("m")."/".$fecha_year = date  ("Y");
			$fechaDesde="01/".$fecha_mes = date  ("m")."/".$fecha_year = date  ("Y"); 			 			
		}
		
		$arrayIdUsuario = array();
		$arrayEmail = array();
		$arrayConexiones = array();
		
                		
		$idUsuario= Session::getInstance()->userId;
		$resultUsuarios = $usuariosDAO->get("*","");
		$i =0;
		$size = 0;
		$auxArray = array();
		while ($entrada=$usuariosDAO->fetchArray($resultUsuarios)) 
		{
			$cant=self::getCantConexiones($entrada['id'],$fechaDesde,$fechaHasta);
			if ($cant>0)
			{
			$arrayConexiones[$i]=$cant;
			$arrayIdUsuario[$i]=$entrada['id'];
			$arrayEmail[$i]=$entrada['email'];							
			$i=$i+1;
			if ( !self::existeArreglo($auxArray, $entrada['id']))
				{
					$auxArray[count($auxArray)]=$entrada['id'];
					$size = $size + 1;
				}
			}
		}				

		$data['TotalBusquedaConexiones']=count($arrayConexiones);
			
		//Ordeno el arreglo
		if (count($arrayConexiones)>0)
		{
			$ret=self::burbuja2($arrayConexiones, $arrayEmail, $arrayIdUsuario,count($arrayConexiones));
		}		
		
		$result = self::paginar($ret[0],$ret[1],$ret[2],$config->get('entradasPorListadoUsuariosConectadoEntreFechas'),$page);		
		if (count($result[0])>0)
		{
			$ret=self::burbuja2($result[0], $result[1], $result[2],count($result[0]));
		}		

		$data['ConexionesUsuarios']=$ret[0];
        $data['Emails']=$ret[1];
        $data['IdUsuarios']=$ret[2];
        $data['cantPaginas']= ceil($size / $config->get('entradasPorListadoUsuariosConectadoEntreFechas') );
		$data['paginaSeleccionada']= $page;
		$data['fechaDesde']=$fechaDesde;
		$data['fechaHasta']=$fechaHasta;
		$this->view->echoView("estadistica-conexiones-listado.php",$data);
	}
	
	
	private function existeArreglo($arreglo,$item)
	{
		for ($i=0; $i<count($arreglo); $i++)
		{
			if ( $arreglo[$i]==$item )
				return true;
		}
		return false;
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $idUsuario
	 * @param unknown_type $fechaDesde
	 * @param unknown_type $fechaHasta
	 */
	private function getCantConexiones($idUsuario,$fechaDesde,$fechaHasta)
	{
		$conexionesDAO = new EntityDAO("conexiones");
	
		if (($fechaHasta!='') && ($fechaDesde!=''))
		{
			//Cambio el formato de la fecha ingresada de $fechaDesde
			$fechaExplode = explode("/", $fechaDesde);
			$fechaDesde = date("Y-m-d", mktime(0,0,0,$fechaExplode[1], $fechaExplode[0], $fechaExplode[2]));
			$fechaDesde = $fechaDesde." 00:00:00";
			
			//Cambio el formato de la fecha ingresada de $fechaHasta
			$fechaExplode = explode("/", $fechaHasta);
			$fechaHasta = date("Y-m-d", mktime(0,0,0,$fechaExplode[1], $fechaExplode[0], $fechaExplode[2]));
			$fechaHasta = $fechaHasta." 23:59:59";		
			
			$resultConexiones = $conexionesDAO->get("count(*)","idUsuario=".$idUsuario." and fecha>='".$fechaDesde."' and fecha<='".$fechaHasta."'");
		}
		else
			$resultConexiones = $conexionesDAO->get("count(*)","idUsuario=".$idUsuario);
		
			$entrada=$conexionesDAO->fetchArray($resultConexiones);					
		return $entrada['count(*)'];	
	}
	
	
function burbujaMemoria($A,$B,$C,$n)
	{
        for($i=1;$i<$n;$i++)
        {
                for($j=0;$j<$n-$i;$j++)
                {                	
                		//Obtengo la extesion de cada uno los espacios de memoria
						if ( (strpos($A[$j],"kB") === true) && (strpos($A[$j+1],"kB") === true) )
						{                	
							echo "entro1";
                        if($A[$j]<$A[$j+1])
                        {
                        	$k=$A[$j+1]; 
                        	$A[$j+1]=$A[$j]; 
                        	$A[$j]=$k;
                        	
                        	$k1=$B[$j+1]; 
                        	$B[$j+1]=$B[$j]; 
                        	$B[$j]=$k1;
                        	
                        	$k2=$C[$j+1]; 
                        	$C[$j+1]=$C[$j]; 
                        	$C[$j]=$k2;
                        }
						}
						
                		if ( (strpos($A[$j],"kB") === true) && (strpos($A[$j+1],"MB") === true) )
						{      
							echo "entro2";          	                        
                        	$k=$A[$j+1]; 
                        	$A[$j+1]=$A[$j]; 
                        	$A[$j]=$k;
                        	
                        	$k1=$B[$j+1]; 
                        	$B[$j+1]=$B[$j]; 
                        	$B[$j]=$k1;
                        	
                        	$k2=$C[$j+1]; 
                        	$C[$j+1]=$C[$j]; 
                        	$C[$j]=$k2;                        
						}
						
                		if ( (strpos($A[$j],"MB") === true) && (strpos($A[$j+1],"MB") === true) )
						{
							echo "entro3";                	
                        if($A[$j]<$A[$j+1])
                        {
                        	$k=$A[$j+1]; 
                        	$A[$j+1]=$A[$j]; 
                        	$A[$j]=$k;
                        	
                        	$k1=$B[$j+1]; 
                        	$B[$j+1]=$B[$j]; 
                        	$B[$j]=$k1;
                        	
                        	$k2=$C[$j+1]; 
                        	$C[$j+1]=$C[$j]; 
                        	$C[$j]=$k2;
                        }
						}
						
						
						
                }
        } 
        
      $ret = array();
      $ret[0]=$A;
	  $ret[1]=$B;
	  $ret[2]=$C;            
      return $ret;
    }
	
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $A
	 * @param unknown_type $B
	 * @param unknown_type $C
	 * @param unknown_type $n
	 */
	function burbuja2($A,$B,$C,$n)
	{
        for($i=1;$i<$n;$i++)
        {
                for($j=0;$j<$n-$i;$j++)
                {
                        if($A[$j]<$A[$j+1])
                        {
                        	$k=$A[$j+1]; 
                        	$A[$j+1]=$A[$j]; 
                        	$A[$j]=$k;
                        	
                        	$k1=$B[$j+1]; 
                        	$B[$j+1]=$B[$j]; 
                        	$B[$j]=$k1;
                        	
                        	$k2=$C[$j+1]; 
                        	$C[$j+1]=$C[$j]; 
                        	$C[$j]=$k2;
                        }
                }
        } 
        
      $ret = array();
      $ret[0]=$A;
	  $ret[1]=$B;
	  $ret[2]=$C;            
      return $ret;
    }
    
    
/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $A
	 * @param unknown_type $B
	 * @param unknown_type $C
	 * @param unknown_type $n
	 */
	function burbuja1($A,$B,$C,$n)
	{
        for($i=1;$i<$n;$i++)
        {
                for($j=0;$j<$n-$i;$j++)
                {
                        if($A[$j]>$A[$j+1])
                        {
                        	$k=$A[$j+1]; 
                        	$A[$j+1]=$A[$j]; 
                        	$A[$j]=$k;
                        	
                        	$k1=$B[$j+1]; 
                        	$B[$j+1]=$B[$j]; 
                        	$B[$j]=$k1;
                        	
                        	$k2=$C[$j+1]; 
                        	$C[$j+1]=$C[$j]; 
                        	$C[$j]=$k2;
                        }
                }
        } 
        
      $ret = array();
      $ret[0]=$A;
	  $ret[1]=$B;
	  $ret[2]=$C;            
      return $ret;
    }
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $directory
	 */
    function dirSize($directory) {  
    $size = 0;  
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){  
        $size+=$file->getSize();  
    }  
    return $size;  
}  




function getSize($path, $formated = true, $retstring = null){
    if(!is_dir ($path) || !is_readable ($path)){
        if(is_file ($path) || file_exists ($path)){
            $size = filesize ($path);
        } else {
            return false;
        }
    } else {
        $path_stack[] = $path;
        $size = 0;
       
        do {
            $path   = array_shift ($path_stack);
            $handle = opendir ($path);
            while(false !== ($file = readdir ($handle))) {
                if($file != '.' && $file != '..' && is_readable ($path . DIRECTORY_SEPARATOR . $file)) {
                    if(is_dir ($path . DIRECTORY_SEPARATOR . $file)){ $path_stack[] = $path . DIRECTORY_SEPARATOR . $file; }
                    $size += filesize ($path . DIRECTORY_SEPARATOR . $file);
                }
            }
            closedir ($handle);
        } while (count ($path_stack)> 0);
    }
    return $size;
}

    
	 /**
	 * 
	 * Enter description here ...
	 */
	public function getCantidadEspacioMemoria() {        
        $arrayIdUsuario = array();
		$arrayEmail = array();
		$arrayCantidadMensajes = array();
		$arrayCantidadMemoria = array();
		
		
		$config = ConfigAdmin::singleton();		 		
				
		if ($_GET['page']=="")
			$page=1;
		else
			$page=$_GET['page'];
				
        
		$directorioActual=getcwd();		
		$directorioActual=str_replace("admin","usuario",$directorioActual);		
		$directorioActual=$directorioActual."\\files\\";
			
			
		$usuariosDAO = new EntityDAO("usuarios");        		
		$idUsuario= Session::getInstance()->userId;
		
		$resultTotalUsuarios = $usuariosDAO->get("*","");
		$i=0;
		while ($entrada2=$usuariosDAO->fetchArray($resultTotalUsuarios))
		{
		//Obtengo el espacio utilizado por el usuario			
			if(!is_dir($directorioActual."".$entrada2['id']))
			{$arrayCantidadMemoria2[$i]=0;}
			else 
			{				
				$cantidad=self::getSize($directorioActual."".$entrada2['id']."\\");
				$arrayCantidadMemoria2[$i]= $cantidad;
			}
			$i=$i+1;	
		}
		
		//Calcula y formatea el total de espacio utilizado
		$resultadoTotal = array();
		$resultadoTotal[0]=self::getSize($directorioActual."".$entrada2['id']."\\");
		$resultadoTotal=self::formatear($resultadoTotal);
		$data['TotalCantidadMensajesEspacio']=$resultadoTotal[0];
		
		
		$size=$usuariosDAO->getTotalFilas($resultTotalUsuarios);		
		
		$resultUsuarios = $usuariosDAO->get("*","");
		$i =0;		
					
		while ($entrada=$usuariosDAO->fetchArray($resultUsuarios)) 
		{
			//Obtengo el espacio utilizado por el usuario			
			if(!is_dir($directorioActual."".$entrada['id']))
			{$arrayCantidadMemoria[$i]=0;}
			else 
			{
				$cantidad=self::getSize($directorioActual."".$entrada['id']."\\");								
				$arrayCantidadMemoria[$i]= $cantidad;
			}
			//Obtengo la cantidad de mensajes que tiene el usuario			
			$arrayCantidadMensajes[$i]=self::getCantidadMensajesUsuario($entrada['id']);										
			$arrayIdUsuario[$i]=$entrada['id'];
			$arrayEmail[$i]=$entrada['email'];							
			$i=$i+1;			
		}			
			
		//Ordeno el arreglo
		
		if (count($arrayCantidadMensajes)>0)
		{
			$ret=self::burbuja2($arrayCantidadMemoria, $arrayEmail, $arrayCantidadMensajes,count($arrayEmail));
		}
		

		$result = self::paginar($ret[0],$ret[1],$ret[2],$config->get('entradasPorListadoCantidadMemoria'),$page);		
		

		
		if (count($result[0])>0)
		{
			$ret=self::burbuja2($result[0], $result[1], $result[2],count($result[0]));
		}
		
		$resultadoFormatear = array();
		$resultadoFormatear=self::formatear($ret[0]);

		$data['CantidadMemoria']=$resultadoFormatear;
        $data['Emails']=$ret[1];
        $data['CantidadMensajes']=$ret[2];
        $data['cantPaginas']= ceil($size / $config->get('entradasPorListadoCantidadMemoria') );
		$data['paginaSeleccionada']= $page;
		$this->view->echoView("estadistica-memoriaporusuario-listado.php",$data);
	}

	private function formatear($result)
	{				
		$sizes = array ('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		for ($i=0; $i<count($result); $i++)
		{
		$size = $result[$i];        
        if($retstring == null) { $retstring = '%01.2f %s'; }
        $lastsizestring = end ($sizes);
        foreach($sizes as $sizestring){
            if($size <1024){ break; }
            if($sizestring != $lastsizestring){ $size /= 1024; }
        }
        if($sizestring == $sizes[0]){ $retstring = '%01d %s'; } // los Bytes normalmente no son fraccionales
        $size = sprintf ($retstring, $size, $sizestring);
			
		$result[$i]=$size;
		}		
		
		return $result;
	}
	
	private function sumaTamañoTotalEspacio($arreglo)
	{
		$suma =0;
		for ($i=0; $i<count($arreglo); $i++)
		{
			$suma = $suma + $arreglo[$i];
		}
		return $suma;
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $dir
	 */
	public function calcularTotalEspacioUsuario($dir)
	{	
		 $size = 0;  
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){  
        $size+=$file->getSize();  
    }  
    return $size;  
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $idUsuario
	 */
	public function getCantidadMensajesUsuario($idUsuario)
	{
		
		$mensajesDAO = new EntityDAO("mensajes");        				
		$resultMensajes = $mensajesDAO->get("*","");
		$cantidad=0;
		$i =0;
		while ($entrada=$mensajesDAO->fetchArray($resultMensajes)) 
		{
			if ($entrada['idUsuario']==$idUsuario)
				$cantidad=$cantidad+1;			
		}
		
		return $cantidad;
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function getCantidadMsjsXCorriente() {        
	
		$arrayIdCorriente = array();
		$arrayNombreCorriente = array();
		$arrayCantidad = array();
		
		$config = ConfigAdmin::singleton();
		
		if ($_GET['page']=="")
			$page=1;
		else
			$page=$_GET['page'];
			
		
        $corrientesDAO = new EntityDAO("corrientes");                				
		
		$resultTotalCorrientes = $corrientesDAO->get("*","");
		$i=0;
		while ($entrada2=$corrientesDAO->fetchArray($resultTotalCorrientes)) 
		{			
			$arrayCantidad2[$i]=self::getCantMsjsCorrientesUsuario($entrada2['id']);												
			$i=$i+1;
		}	
		$data['TotalCantidadMensajesXCorriente']=self::sumaTamañoTotalEspacio($arrayCantidad2);
		
		
		$size=$corrientesDAO->getTotalFilas($resultTotalCorrientes);
		
		$resultCorrientes = $corrientesDAO->get("*","");
		$i =0;
		while ($entrada=$corrientesDAO->fetchArray($resultCorrientes)) 
		{
			$arrayIdCorriente[$i]=$entrada['id'];
			$arrayNombreCorriente[$i]=$entrada['nombre'];
			$arrayCantidad[$i]=self::getCantMsjsCorrientesUsuario($entrada['id']);												
			$i=$i+1;
		}		
			
		//$config->get('entradasPorListadoCantidadMsjXCorriente')
		//Ordeno el arreglo
		
		if (count($arrayNombreCorriente)>0)
		{
			$ret=self::burbuja2($arrayCantidad, $arrayNombreCorriente, $arrayIdCorriente,count($arrayNombreCorriente));
		}
		
		$result = self::paginar($ret[0],$ret[1],$ret[2],$config->get('entradasPorListadoCantidadMsjXCorriente'),$page);
		
		
		if (count($result)>0)
		{
			$ret=self::burbuja2($result[0], $result[1], $result[2],count($result[2]));
		}

		$data['CantidadCorrientes']=$ret[0];
        $data['NombreCorrientes']=$ret[1];
        $data['IdCorrientes']=$ret[2];		
        $data['cantPaginas']= ceil($size / $config->get('entradasPorListadoCantidadMsjXCorriente') );
		$data['paginaSeleccionada']= $page;
		$this->view->echoView("estadistica-corrientesporusuario-listado.php",$data);
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $idCorriente
	 */
	private function getCantMsjsCorrientesUsuario($idCorriente)
	{
		$mensajesDAO = new EntityDAO("mensajes");        		
		$resultMensajes = $mensajesDAO->get("*","");
		$count =0;
		while ($entrada=$mensajesDAO->fetchArray($resultMensajes)) 
		{
				if ($entrada['idCorriente']==$idCorriente)
					$count=$count+1;
		}
		return $count;
	}
	
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function getCantidadUsuariosXPais() {        
        $arrayIdPais = array();
		$arrayNombrePais = array();
		$arrayCantidad = array();
		
		$config = ConfigAdmin::singleton();
		
		if ($_GET['page']=="")
			$page=1;
		else
			$page=$_GET['page'];
		
			
		
			
		$usuariosDAO = new EntityDAO("usuarios");        		
		$resultUsuariosTotales = $usuariosDAO->get("distinct(idPais)","");
		$size=$usuariosDAO->getTotalFilas($resultUsuariosTotales);
		
		
		$resultUsuarios = $usuariosDAO->get("*","");
		$i=0;
		$cont=0;
		while ($entrada=$usuariosDAO->fetchArray($resultUsuarios)) 
		{
			if (!in_array($entrada['idPais'], $arrayIdPais))
			{
				$arrayNombrePais[$i]=self::getNombrePais($entrada['idPais']);
				$arrayIdPais[$i]=$entrada['idPais'];
				$arrayCantidad[$i]=1;
				$i=$i+1;
			}			
			else
			{
				//Obtengo la posicion del pais
				$pos=self::getPosArray($entrada['idPais'], $arrayIdPais);
				$arrayCantidad[$pos]=$arrayCantidad[$pos]+1;
			}
			$cont=$cont+1;
		}
		
		$data['TotalUsuarios']=$cont;
		
		//Ordeno el arreglo
		if (count($arrayNombrePais)>0)
		{
			$ret=self::burbuja2($arrayCantidad, $arrayNombrePais, $arrayIdPais,count($arrayNombrePais));
		}

		$result = self::paginar($ret[0],$ret[1],$ret[2],$config->get('entradasPorListadoCantidadUsuariosXPais'),$page);
		
		
		if (count($result)>0)
		{
			$ret=self::burbuja2($result[0], $result[1], $result[2],count($result[2]));
		}
		$data['CantidadPaises']=$ret[0];
        $data['NombrePaises']=$ret[1];
        $data['IdPaises']=$ret[2];		
		$data['cantPaginas']= ceil($size / $config->get('entradasPorListadoCantidadUsuariosXPais') );
		$data['paginaSeleccionada']= $page;
		$this->view->echoView("estadistica-usuarios-porpais-listado.php",$data);
	}
	
	private function paginar($arreglo1,$arreglo2,$arreglo3,$entradasXPaginas,$pageActual)
	{
		$maximo=$entradasXPaginas*$pageActual-1;
		$p1 = array();
		$p2 = array();
		$p3 = array();
		$cont=0;
		$minimo=($maximo- ($entradasXPaginas-1));
		

		for ($i=$minimo;$i<=$maximo;$i++)
		{
			if ($arreglo2[$i]!="")
			{
			$p1[$cont]=$arreglo1[$i];
			$p2[$cont]=$arreglo2[$i];
			$p3[$cont]=$arreglo3[$i];
			$cont = $cont+1;
			}
		}		
		
		$result = array();
		$result[0]=$p1;
		$result[1]=$p2;
		$result[2]=$p3;
		return $result;
	}
	
	public function getPosArray($idPais,$arreglo)
	{
	for ($i=0; $i<$arreglo;$i++)
	{
		if ($arreglo[$i]==$idPais)
			return $i;
	}
	return -1;
	}

	public function getNombrePais($idPais)
	{
		$paisesDAO = new EntityDAO("paises");        		
		$resultPaises = $paisesDAO->get("*","id=".$idPais);				
		$entrada=mysql_fetch_object($resultPaises);
		return $entrada->nombre;		
	}		
	
	public function getFormBusquedaConexiones()
	{
		$data['fechaDesde']="01/".$fecha_mes = date  ("m")."/".$fecha_year = date  ("Y");
		$data['fechaHasta']=$fecha_dia = date  ("d")."/".$fecha_mes = date  ("m")."/".$fecha_year = date  ("Y");		 	
		$this->view->echoView("estadistica-conexiones-listado-form.php",$data);
	}



}



