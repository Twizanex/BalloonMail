<?php

include_once("../commons/Session.php");
include_once("../commons/EntityDAO.php");
include_once("../commons/Database.php");
include_once("../model/AdministradorRegiones.php");
include_once("../model/AdministradorUsuarios.php");

$administradorRegiones = new AdministradorRegiones();
$pais=$_GET["code"];

if (!$pais) {
	//echo "entra aquí";
	$administradorUsuarios = new AdministradorUsuarios();
	$userId=Session::getInstance()->userId;
	//echo $userId;
	$estadoSelected=$administradorUsuarios->getEstado($userId);
	$pais=$administradorUsuarios->getPais($userId);

}

$estados=$administradorRegiones->getEstados($pais);

if ($estados) {
foreach($estados as $key=>$value)
{


	$nombreCorto=substr($value, 0, 28);
	if ($key == $estadoSelected) {
		echo '<option value="'.$key.'" selected="selected" >'.$nombreCorto.'</option>';
	}
	else
		echo '<option value="'.$key.'">'.$value.'</option>';
}
}



//echo '<option value="1">Buenos Aires</option>';

?>