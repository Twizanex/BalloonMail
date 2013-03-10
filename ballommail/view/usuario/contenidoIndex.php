<?php
error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));
require_once 'autoload.php';
require_once ('../../settings.php');
if(!$_SESSION['usuario'])
{
	//Session comienza en settings.php
	//No tiene session, ir a ver si tiene cookie
	header ('Location: /view/usuario/index.php');
}

require_once ('../../commons/languages.php');
require_once '../../commons/elgglib.php';

 
if ($elimino=='fotoperfil')
{
?>

<script type="text/javascript">
	window.location.href='contenidoIndex.php?menuOption=hill';
	</script>
	<?php 
}


if ($_REQUEST['retornaPaginaCompleta']) {

	UserFrontController::invoke($_REQUEST['action'], $_REQUEST['controller'], 1, $_REQUEST['menuOption']);
}
else {


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ballon mail</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="css/globo.css" rel="stylesheet" type="text/css" />
	<!-- include the Tools -->
<link rel="stylesheet" type="text/css" href="css/scrollable-navigator.css"/>
<link rel="stylesheet" type="text/css" href="css/scrollable-horizontal.css"/>
<link rel="stylesheet" type="text/css" href="css/scrollable-buttons.css"/>



</head>

<body>

<div id="paisaje">
  <div id="cabecera">
	<?php UserFrontController::invoke($_REQUEST['action'], $_REQUEST['controller'], 0, $_REQUEST['menuOption']);?>
    <img src="imagenes/logobaloon.png" width="302" height="157" />
    <div id="contenido">
      <div id="col_central">
        <?php

        	UserFrontController::invoke($_REQUEST['action'], $_REQUEST['controller'], 1, $_REQUEST['menuOption']);


		?>
      </div>
      <div id="col_lateral"><img src="imagenes/bnews.png" width="87" height="29" /><img src="imagenes/bnews_foto.jpg" width="100" height="66" />
        <p>Concurso de Literatura<br />
        Se realizara un concurso de literatura el dia 30/02/2011 a las 21:00h en la biblioteca nacional.</p>
      </div>

    </div>
  </div>
  <div id="bajomenu">
   <div id="menuback">
   <div id="menu"><?php if ($_REQUEST['menuOption']=='hill') {?> <span class="seleccionado"><?php  echo ballom_echo("hill"); ?></span><?php } else {?> <a href="contenidoIndex.php?menuOption=hill"><?php  echo ballom_echo("hill"); }?>
</a> <?php if ($_REQUEST['menuOption']=='enviarGlobo') {?> <span class="seleccionado"><?php  echo ballom_echo("sentBallon"); ?></span><?php } else {?><a href="contenidoIndex.php?menuOption=enviarGlobo&id=4"><?php  echo ballom_echo("sentBallon"); }?>
</a> <?php if ($_REQUEST['menuOption']=='bitacora') {?> <span class="seleccionado"><?php  echo ballom_echo("bitacora"); ?></span><?php } else {?><a href="contenidoIndex.php?menuOption=bitacora&retornaPaginaCompleta=true"><?php  echo ballom_echo("bitacora"); }?></a> <?php if ($_REQUEST['menuOption']=='vuelos') {?> <span class="seleccionado"><?php  echo ballom_echo("flights"); ?></span><?php } else {?><a href="contenidoIndex.php?menuOption=vuelos"><?php  echo ballom_echo("flights");}?>
</a> <?php if ($_REQUEST['menuOption']=='contactos') {?> <span class="seleccionado"><?php  echo ballom_echo("contacts"); ?></span><?php } else {?><a href="contenidoIndex.php?menuOption=contactos"><?php  echo ballom_echo("contacts"); }?>
</a> <?php if ($_REQUEST['menuOption']=='perfil') {?> <span class="seleccionado"><?php  echo ballom_echo("profile"); ?></span><?php } else {?><a href="contenidoIndex.php?menuOption=perfil"><?php  echo ballom_echo("profile");}?>
</a>
<!--<a href="#"><?php //echo ballom_echo("bNews");?></a>-->
</div>
   </div>

   <?php
   	UserFrontController::invoke($_REQUEST['action'], $_REQUEST['controller'], 2, $_REQUEST['menuOption']);
	?>

  </div>
<div id="pieback">
<div id="pie"><a href="contenidoIndex.php?country_code=es&menuOption=<?php echo Session::getInstance()->menuOption;?>&idContacto=<?php echo $_REQUEST['idContacto']?>"><?php  echo ballom_echo("spanish");?>
</a> <a href="contenidoIndex.php?country_code=en&menuOption=<?php echo Session::getInstance()->menuOption;?>&idContacto=<?php echo $_REQUEST['idContacto']?>"><?php  echo ballom_echo("english");?>
</a></div>
</div>
</div>

</body>
</html>
<?php
}
?>