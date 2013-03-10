<?php
include('../../comunes/funciones.php');
require('../../comunes/conectar.php');
mysql_connect($bd_host,$bd_usuario,$bd_password);
mysql_query("SET NAMES utf8"); 
error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));
$action=$_REQUEST['action'];
$content=$HTTP_GET_VARS['content'];

$content=$HTTP_GET_VARS['content'];
if ($content != false) {
	include ('includes/'.$content.".php" );
	} else include ('includes/principal.php' );

?>