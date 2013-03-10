<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarPaises()
	{
		$consulta = parent::consulta("SELECT nombre,id FROM paises ORDER BY nombre ASC");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$paises = array();
			while($pais = parent::fetch_assoc($consulta))
			{
				$code = $pais["id"];
				$name = $pais["nombre"];				
				$paises[$code]=$name;
			}
			return $paises;
		}
		else
		{
			return false;
		}
	}
	function cargarEstados()
	{
		
		$consulta = parent::consulta("SELECT nombre FROM estados WHERE idPais = '".$this->code."' Order by nombre");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
				$name = $estado["nombre"];				
				$estados[$name]=$name;
			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
		
}
?>