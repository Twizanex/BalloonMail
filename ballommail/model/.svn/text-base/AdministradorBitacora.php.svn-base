<?php
/**
 * Lógica de la aplicación relacionada con bitacora
 * @author Margarita
 *
 */
class AdministradorBitacora {

	function __construct()
	{

	}

	/**
	 *
	 * Elimina la entrada $idEntrada de la bitácora.
	 * @param integer $idEntrada
	 */
	public function eliminarEntrada($idEntrada) {
		$bitacoraDAO= new EntityDAO("bitacora");
		$bitacoraDAO->delete("id=".$_REQUEST['id']);
	}





}