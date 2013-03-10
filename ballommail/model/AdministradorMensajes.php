<?php
/**
 * L�gica de la aplicaci�n relacionada con corrientes
 * @author Margarita
 *
 */
class AdministradorMensajes {

	function __construct()
	{

	}

	function getCantMensajesEnviados($idUsuario = NULL){
		$mensajesDAO = new EntityDAO("mensajes");

		if(is_null($idUsuario)){
			$result = $mensajesDAO->get('count(id) as cant', 'idTipoMensaje=4' , null);
		} else {
			$result = $mensajesDAO->get('count(id) as cant', 'idTipoMensaje=4 and idUsuario=' . $idUsuario, null);
		}

		$cantidad = $mensajesDAO->fetchArray($result);
		$mensajes_enviados = $cantidad['cant'];
		return $mensajes_enviados;
	}

	function getCantMensajesRecibidos($idUsuario = NULL){

		$mensajesdestinatariosDAO = new EntityDAO("mensajesdestinatarios");
		if(is_null($idUsuario)){
			$result = $mensajesdestinatariosDAO->get('count(id) as cant', 'fechaHoraRecepcion is not NULL' , null);
		} else {
			$result = $mensajesdestinatariosDAO->get('count(id) as cant', 'idDestinatario=' . $idUsuario . ' and fechaHoraRecepcion is not NULL ', null);
		}
		$cantidad = $mensajesdestinatariosDAO->fetchArray($result);

		return $cantidad['cant'];

	}

	function getContinentesMensajes($type = 'all' , $idUser = NULL) {
		$cond  = '';
		$cond2 = '';

		$continentes = array();
		$administradorRegiones = new AdministradorRegiones();
		$continentes_array = $administradorRegiones->getContinentes();

		//SELECT * FROM `mensajes` inner join usuarios on usuarios.id = mensajes.idUsuario WHERE 1
		//SELECT count(m.id) as cant FROM `mensajes` m inner join usuarios u on u.id = m.idUsuario WHERE u.idPais in (Select id from paises where idContinente = 1)
		foreach ($continentes_array as $key => $value) {
			switch ($type) {
				case 'enviado':
					if (!is_null($idUser)) {
						//$cond = ' m.idUsuario = ' . $idUser . ' AND m.idTipoMensaje=4 AND ';
						$cond_fix = ' mj.idUsuario = ' . $idUser . ' AND ';
					}
					//$sql = "SELECT count(m.id) as cant FROM `mensajes` m inner join usuarios u on u.id = m.idUsuario WHERE $cond u.idPais in (Select id from paises where idContinente = $value )";

					$sql = "SELECT count(m.id) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
						inner join mensajes mj on mj.id = m.idMensaje
						inner join usuarios u on u.id = m.idDestinatario
						inner join paises p on p.id = u.idPais
						WHERE $cond_fix  mj.idTipoMensaje=4 AND u.idPais in (Select id from paises where idContinente = $value )
						";

					break;
				case 'recibido':
					if (!is_null($idUser)) {
						$cond = ' m.idDestinatario = ' . $idUser . ' AND ';
					}
					//$sql = "SELECT count(m.id) as cant FROM `mensajesdestinatarios` m inner join usuarios u on u.id = m.idDestinatario WHERE $cond m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $value )";
					$sql = "SELECT count(m.id) as cant FROM `mensajesdestinatarios` m
					inner join mensajes mj on mj.id = m.idMensaje
					inner join usuarios u on u.id = mj.idUsuario
					inner join paises p on p.id = u.idPais
					WHERE $cond m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $value )";

					break;

				default:
					if (!is_null($idUser)) {
						//$cond = ' m.idUsuario = ' . $idUser . ' AND m.idTipoMensaje=4 AND ';
						$cond2 = ' m.idDestinatario = ' . $idUser . ' AND ';
						$cond_fix = ' mj.idUsuario = ' . $idUser . ' AND ';
					}
					//$sql_env = "SELECT count(m.id) as cant FROM `mensajesdestinatarios` m inner join usuarios u on u.id = m.idDestinatario WHERE $cond2 m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $value )";
					$sql_env = "SELECT count(m.id) as cant FROM `mensajesdestinatarios` m
						inner join mensajes mj on mj.id = m.idMensaje
						inner join usuarios u on u.id = mj.idUsuario
						inner join paises p on p.id = u.idPais
						WHERE $cond2 m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $value )";

					//$sql = "SELECT count(m.id) + ($sql_env) as cant FROM `mensajes` m inner join usuarios u on u.id = m.idUsuario WHERE $cond u.idPais in (Select id from paises where idContinente = $value )";;



					$sql = "SELECT count(m.id) + ($sql_env) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
						inner join mensajes mj on mj.id = m.idMensaje
						inner join usuarios u on u.id = m.idDestinatario
						inner join paises p on p.id = u.idPais
						WHERE $cond_fix  mj.idTipoMensaje=4 AND u.idPais in (Select id from paises where idContinente = $value )
						";
				break;
			}

			//echo $sql;
			$dataBase=Database::getInstance();
			$data = $dataBase->executeQuery($sql);

			while ($info = $dataBase->fetchArray($data)) {
				$continentes[$key] = array($value => $info['cant']);
			}
		}

		return $continentes;
	}

	function getPaisesMensajes($continente_id = NULL, $type = 'all', $idUser = NULL) {
		if (is_null($continente_id)){
			return array();
		}

		$cond  = '';
		$cond2 = '';

		switch ($type) {
			case 'enviado':
				if (!is_null($idUser)) {
				//		$cond = ' m.idUsuario = ' . $idUser . ' AND m.idTipoMensaje=4 AND';
						$cond_fix = ' mj.idUsuario = ' . $idUser . ' AND ';
				}
				/*
				$sql = "SELECT count(m.id) as cant, p.nombre as pais FROM `mensajes` m
							inner join usuarios u on u.id = m.idUsuario
							inner join paises p on p.id = u.idPais
							WHERE $cond u.idPais in (Select id from paises where idContinente = $continente_id )
							group by p.nombre";

				*/
				$sql = "SELECT count(m.id) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
						inner join mensajes mj on mj.id = m.idMensaje
						inner join usuarios u on u.id = m.idDestinatario
						inner join paises p on p.id = u.idPais
						WHERE $cond_fix  mj.idTipoMensaje=4 AND u.idPais in (Select id from paises where idContinente = $continente_id )
						group by p.nombre";

				//echo $sql;
				break;

			case 'recibido':
				if (!is_null($idUser)) {
						$cond = ' m.idDestinatario = ' . $idUser . ' AND ';
				}
				$sql = "SELECT count(m.id) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
							inner join mensajes mj on mj.id = m.idMensaje
							inner join usuarios u on u.id = mj.idUsuario
							inner join paises p on p.id = u.idPais
							WHERE $cond m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $continente_id )
							group by p.nombre";
				break;

			default:

				if (!is_null($idUser)) {
					$cond = ' mj.idUsuario = ' . $idUser . ' AND ';
					$cond2 = ' m.idDestinatario = ' . $idUser . ' AND ';
					$cond_fix = ' mj.idUsuario = ' . $idUser . ' AND ';
				}
				/*
				$sql = "SELECT rand() as id, count(m.id) as cant, p.nombre as pais FROM `mensajes` m
				inner join usuarios u on u.id = m.idUsuario
				inner join paises p on p.id = u.idPais
				WHERE $cond u.idPais in (Select id from paises where idContinente = $continente_id )

				group by p.nombre

				union

				SELECT rand() as id, count(m.id) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
				inner join mensajes mj on mj.id = m.idMensaje
				inner join usuarios u on u.id = mj.idUsuario
				inner join paises p on p.id = u.idPais
				WHERE $cond2 m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $continente_id )

				group by p.nombre";

				*/
				$sql = "SELECT rand() as id, count(m.id) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
						inner join mensajes mj on mj.id = m.idMensaje
						inner join usuarios u on u.id = m.idDestinatario
						inner join paises p on p.id = u.idPais
						WHERE $cond_fix  mj.idTipoMensaje=4 AND u.idPais in (Select id from paises where idContinente = $continente_id )
						group by p.nombre

				union

				SELECT rand() as id, count(m.id) as cant, p.nombre as pais FROM `mensajesdestinatarios` m
				inner join mensajes mj on mj.id = m.idMensaje
				inner join usuarios u on u.id = mj.idUsuario
				inner join paises p on p.id = u.idPais
				WHERE $cond2 m.fechaHoraRecepcion is not NULL and u.idPais in (Select id from paises where idContinente = $continente_id )

				group by p.nombre";

				/*$sql = "select count(m.id) as cant, p.nombre from `mensajes` m inner join usuarios u on u.id = m.idUsuario inner join paises p on p.id = u.idPais inner join
						`mensajesdestinatarios` m2 on m.idUsuario = m2.idDestinatario
						WHERE m.idUsuario = $idUser AND u.idPais in (Select id from paises where idContinente = $continente_id ) group by p.nombre
						";
						*/
				//echo '::'.$sql.'::';
				break;
		}
		//echo $sql;
		$dataBase=Database::getInstance();
		$data = $dataBase->executeQuery($sql);
		$paises_array = array();
		while ($info = $dataBase->fetchArray($data)) {
				$paises_array[$info['pais']] = $paises_array[$info['pais']] + $info['cant'];
		}
		return $paises_array;
	}

	function getMensajeLatLong($direccion){
	  $URL = "http://maps.google.co.uk/maps/geo?q=" . urlencode($direccion);
	  $data = file_get_contents($URL);
	  if($data){
	  	$data = json_decode($data);
	  	if($data->Status->code != 200){
	  		return FALSE;
	  	}
	    foreach ($data->Placemark as $result){
	    		$address	= $data->Placemark[0]->address;
	      		$long 		= $data->Placemark[0]->Point->coordinates[0];
		    	$lat 		= $data->Placemark[0]->Point->coordinates[1];
		    	break;
	    }
	    return array('Latitude'=>$lat,'Longitude'=>$long, 'address' => $address);

	  }else return false;

	}

	/**
	 *
	 * Retorna el id de usuario que remite el mensaje $idMensaje.
	 * @param unknown_type $idMensaje
	 */
	public function getRemitente($idMensaje) {
		$mensajesDAO= new EntityDAO("mensajes");
    	$mensajesResult= $mensajesDAO->get("idUsuario", "id='".$idMensaje."'");
    	$messagesArray=$mensajesDAO->fetchArray($mensajesResult);
    	$mensajesDAO->freeResult($result);
    	return $messagesArray['idUsuario'];
	}

	public function crearSugerenciaDeCorriente($id,$asunto,$mensaje,$idIdioma) {
		$values =
    	array(
    	'asunto' => $asunto,
    	'mensaje'=> $mensaje,
		'fechaHoraCreacion'=>'now()',
		'aceptaRespuesta' =>  0,
		'publicarBitacora' => 0,
		'soltarCielo' => 0,
		'idIdioma' => $idIdioma,
		'idCorriente' => 1,
		'idUsuario' => $id,
		'idGlobo' => 1,
		'idTipoMensaje' => 2
    	);
    	return $values;


	}

}
?>