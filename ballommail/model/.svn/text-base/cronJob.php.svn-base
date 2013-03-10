<?php

	$conexion = mysql_connect ("localhost", "mburiano_bm", "26opo1unsm7v");
	mysql_select_db ("mburiano_balloonmail", $conexion);
	
	$que = "INSERT INTO procesos (fecha) ";
	$que.= "VALUES (now()) ";
	$res = mysql_query ($que, $conexion) or die (mysql_error ());

?>