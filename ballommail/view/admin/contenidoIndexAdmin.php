<?php
error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));
session_start();
include ('../../commons/AdminFrontController.php');
require_once ('../../commons/languages.php');
require_once '../../commons/elgglib.php';
require_once ('../../settingsAdmin.php');
if(!$_SESSION['usuario'])
{	
	//Session comienza en settings.php
	//No tiene session, ir a ver si tiene cookie
	header ('Location: ../admin/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
.Estilo1 {
	color: #FF6600;
	font-size: 36px;
}
-->
    </style>
</head>
<body>
    <div id="main">
        <div id="header">
            <a href="#" class="logo Estilo1">Administraci&oacute;n Balloon Mail </a>

              <?php


					include ('menu-superior.php');

              ?>

      </div>
        <div id="middle">





			<!--  Carga lo relativo al menu de la izquierda segun la pestaña en la que estoy posicionado -->
			<?php

			AdminFrontController::invoke($_GET['contenido'],$_GET['controller'] , 1, $_GET['menuOption']);

			?>

			<!--  Carga el contenido principal del administrador -->





			<?php

				AdminFrontController::invoke($_GET['contenido'],$_GET['controller'] , 0, $_GET['menuOption']);

			?>



        </div>
        <div id="footer"><p>Developed by <a href="http://www.globalscope.com.ar">GlobalScope</a> 2011. Updated for HTML5/CSS3</p></div>
    </div>
</body>
</html>