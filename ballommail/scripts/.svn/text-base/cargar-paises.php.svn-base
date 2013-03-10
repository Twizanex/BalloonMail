<?php
//include("clases/class.mysql.php");
//include("clases/class.combos.php");

include_once("model/AdministradorRegiones.php");

$administradorRegiones = new AdministradorRegiones();
$paises = $administradorRegiones->getAllPaises();
foreach($paises as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>