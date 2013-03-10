<?php
//include("clases/class.mysql.php");
//include("clases/class.combos.php");
include_once("../commons/Session.php");
include_once("../commons/EntityDAO.php");
include_once("../commons/Database.php");
include_once("../model/AdministradorRegiones.php");
include_once("../model/AdministradorUsuarios.php");

$administradorUsuarios = new AdministradorUsuarios();
$userId=Session::getInstance()->userId;
if (isset($userId)) {
	$paisSelected=$administradorUsuarios->getPais($userId);
}

$administradorRegiones = new AdministradorRegiones();
$paises = $administradorRegiones->getAllPaises();

//echo "País Seleccionado del Perfil: ".$paisSelected."<br/>";
if (!$paisSelected) { //No tiene país almacenado.
		echo '<option value="0" selected="selected">Selecciona Uno...</option>';
}
foreach($paises as $key=>$value)
{	$nombreCorto=substr($value, 0, 28);
	if ($key == $paisSelected) {
		echo "<option value=\"$key\" selected=\"selected\" >$nombreCorto</option>";
	}
	else
		echo "<option value=\"$key\">$nombreCorto</option>";

}
?>