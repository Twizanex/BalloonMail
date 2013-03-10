
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ballon mail</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- include the Tools -->
<link rel="stylesheet" type="text/css" href="css/scrollable-navigator.css"/>
<link rel="stylesheet" type="text/css" href="css/scrollable-horizontal.css"/>
<link rel="stylesheet" type="text/css" href="css/scrollable-buttons.css"/>

<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>


	<!-- standalone page styling (can be removed) -->



<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<body onload="MM_preloadImages('imagenes/publicar2.png','imagenes/cerrar2.png','imagenes/fant2.jpg','imagenes/fpos2.png','imagenes/publicarover.png')">

<div id="paisaje">
  <div id="cabecera">
    <div id="nube_login">
      <table width="280" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td colspan="3" align="left"><h1><?php
			echo Session::getInstance()->nombres;
		?>'s Hill</h1></td>
        </tr>
        <tr>
          <td width="70%" align="right" valign="top"><a href="../../logout.php"><?php  echo ballom_echo("closeSession");?>
</a></td>
          <td width="118" colspan="2" align="center"><a href="#"><img src="imagenes/user.jpg" width="60" height="61" /></a></td>
        </tr>
      </table>
    </div>
    <img src="imagenes/logobaloon.png" width="302" height="157" />
    <div id="contenido">
      <div id="col_central">


<div id="papiro">
          <table width="670" height="354" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="143" rowspan="3" valign="top" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td height="28" background="imagenes/papiro/papiro_02.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="47" rowspan="3" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat">&nbsp;</td>
            </tr>
            <tr>
              <td height="262" valign="top" style="background-image:url(imagenes/papiro/papiro_03big.jpg); background-position:center"><div id="papiro_central">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">

                                <?php

                	$linea=1;
					foreach ($bitacora as $key=>$value) {
						?>
						<tr>
						<?php
						if ($linea%2 == 0){
							echo '<td background="imagenes/fondocabmsj.png"> <h1>';
						}
						else	{
							echo '<td><p><strong>';
						};

						echo date('M-d-Y H:i', strtotime($value['fechaHora']))." ". $value['texto'];

						if ($linea%2 == 0){
							echo '</h1></td>';
							?>
	 	                    <td width="10" valign="top" background="imagenes/fondocabmsj.png"><a href="contenidoIndex.php?menuOption=eliminarBitacora&page=<?php echo $page; ?>&id=<?php echo $key;?>&retornaPaginaCompleta=true" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar" width="9" height="9" border="0" class="cerrar_msj" id="cerrar" /></a></td>
						<?php

						}

						else {
							echo '</strong></p></td>';
							?>
			                 <td valign="top"><a href="contenidoIndex.php?menuOption=eliminarBitacora&page=<?php echo $page; ?>&id=<?php echo $key;?>&retornaPaginaCompleta=true" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar3','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar3" width="9" height="9" border="0" class="cerrar_msj" id="cerrar3" /></a></td>
						<?php

						};

						?>
					 	</tr>
						<?php
						$linea++;

					}

				?>
<!--

					<tr>

                   <td background="imagenes/fondocabmsj.png"><h1>Mar. 23 / 2011 12:31 "El Viento trae una Copla" El viento trae una copla, recuerdos del temporal, que un dia me... </h1></td>
                    <td width="10" valign="top" background="imagenes/fondocabmsj.png"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar" width="9" height="9" border="0" class="cerrar_msj" id="cerrar" /></a></td>
                  </tr>

                  <tr>
                    <td><p><strong>Febr. 15 / 2011 15:40 "Quien Dijo que Todo Esta Perdido" Quien dijo que todo esta perdido, yo vengo a ofrecer mi corazon... </strong></p></td>
                    <td valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar3','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar3" width="9" height="9" border="0" class="cerrar_msj" id="cerrar3" /></a></td>
                  </tr>
                  <tr>
                    <td background="imagenes/fondocabmsj.png"><h1>Dic. 24 / 2010 25:36 "Una Navidad Para Todos" <br />
                      Les deseo una requete feliz navidad a todos, llena de esperanza... </h1></td>
                    <td valign="top" background="imagenes/fondocabmsj.png"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar2','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar2" width="9" height="9" border="0" class="cerrar_msj" id="cerrar2" /></a></td>
                  </tr>
                  <tr>
                    <td><p>Nov. 23 / 2010 24:01 <strong>“Cuando me Empiece a Quedar Solo” </strong><br />
                      Tendré los ojos muy lejos <br />
                      y un cigarrillo en la boca, <br />
                      el pecho dentro de un hueco <br />
                      y una gata medio loca. <br />
                      <br />
                      Un escenario vacío, <br />
                      un libro muerto de pena, <br />
                      un dibujo destruído <br />
                      y la caridad ajena. </p></td>
                    <td valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar1','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar1" width="9" height="9" border="0" class="cerrar_msj" id="cerrar1" /></a></td>
                  </tr>
 -->

                  </table>

              </div></td>
            </tr>
            <tr>
              <td width="480" height="63" align="center" valign="top" background="imagenes/papiro/papiro_05bit.png" style="background-position:bottom; background-repeat:no-repeat"><a href="contenidoIndex.php?menuOption=bitacora&retornaPaginaCompleta=true&page=<?php if ($paginaAnterior) echo $paginaAnterior; else echo "1"; ?>" class="flecha" onmouseover="MM_swapImage('anterior','','imagenes/fant2.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="imagenes/fant2.jpg" name="anterior" width="10" height="10" border="0" id="anterior" /></a><span class="paginacion"><?php echo $page; ?> de <?php echo $totalPaginas; ?></span><a href="contenidoIndex.php?menuOption=bitacora&retornaPaginaCompleta=true&page=<?php if ($paginaSiguiente<$totalPaginas) echo $paginaSiguiente; else echo $totalPaginas;?>" class="flecha" onmouseover="MM_swapImage('posterior','','imagenes/fpos2.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="imagenes/fpos1.jpg" name="posterior" width="10" height="10" border="0" id="posterior" /></a></td>
            </tr>
          </table>
        </div>
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
   <div id="contenido_menu">
     <form  method="post" name="formRegistro" action="contenidoIndex.php?menuOption=publicarBitacora&controller=Bitacora&retornaPaginaCompleta=true" enctype="multipart/form-data" >

   <div id="mensajes">
        <label><table width="680" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10" colspan="2" style="background-image:url(imagenes/area_01.png); background-repeat:no-repeat; background-position:left top"></td>
    </tr>
  <tr>
    <td width="600" align="center" style="background-image:url(imagenes/area_02.png); background-repeat:repeat-y; background-position:left top; border:0"><textarea name="texto" cols="70" rows="8" id="texto" ></textarea></td>
    <td><input name="button" type="submit" class="txt_login" id="button" value="<?php  echo ballom_echo("publish");?>" />
    </td>
  </tr>
  <tr>
    <td style="background-image:url(imagenes/area_03.png); background-repeat:no-repeat; background-position:left top">&nbsp;</td>
    <td width="80">&nbsp;</td>
  </tr>
  </table>
   </div>
   </form>
   <p>&nbsp;</p>
     <p>&nbsp;</p>

   </div>
  </div>
<div id="pieback">
<div id="pie"><a href="contenidoIndex.php?country_code=es&retornaPaginaCompleta=true&menuOption=<?php echo Session::getInstance()->menuOption;?>"><?php  echo ballom_echo("spanish");?>
</a> <a href="contenidoIndex.php?country_code=en&retornaPaginaCompleta=true&menuOption=<?php echo Session::getInstance()->menuOption;?>"><?php  echo ballom_echo("english");?>
</a></div>
</div>
</div>

</body>
</html>
