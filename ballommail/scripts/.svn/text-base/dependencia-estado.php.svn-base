<?php
//include("clases/class.mysql.php");
//include("clases/class.combos.php");

include_once("model/AdministradorRegiones.php");
//$estados = new selects();
//$estados->code = $_GET["code"];
//$estados = $estados->cargarEstados();
$administradorRegiones = new AdministradorRegiones();
$estados=$administradorRegiones->getEstados($_GET["code"]);

foreach($estados as $key=>$value)
{	echo "<option value=\"$key\">$value</option>";
}
?>