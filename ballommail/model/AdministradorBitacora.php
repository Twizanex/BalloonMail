<?php
/**
 * L�gica de la aplicaci�n relacionada con bitacora
 * @author Margarita
 *
 */
class AdministradorBitacora {

	function __construct()
	{

	}

	/**
	 *
	 * Elimina la entrada $idEntrada de la bit�cora.
	 * @param integer $idEntrada
	 */
	public function eliminarEntrada($idEntrada) {
		$bitacoraDAO= new EntityDAO("bitacora");
		$bitacoraDAO->delete("id=".$_REQUEST['id']);
	}





}