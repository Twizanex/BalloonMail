<?php

error_reporting(E_ALL && ~(E_NOTICE & E_WARNING));
require_once 'autoload.php';
require_once ('../../settings.php');
require_once ('../../commons/languages.php');
require_once '../../commons/elgglib.php';


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



<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>


	<!-- standalone page styling (can be removed) -->


</head>

<body>

<div id="papiro_perfil">
          <table width="640" height="358" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="99" rowspan="3" valign="top" background="imagenes/papiro/papirotrans_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td width="508" height="34" background="imagenes/papiro/papirotrans_02.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
              <td width="33" rowspan="3" background="imagenes/papiro/papirotrans_03.png" style="background-position:left; background-repeat:no-repeat">&nbsp;</td>
            </tr>
            <tr>
              <td width="508" height="361" valign="top" style="background-image:url(imagenes/papiro/papirotrans_04.png); background-position:center; ba"><div id="papiro_central_perfil">
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="3">
                  <tr>
                    <td width="25%" align="right">Adjunto 1:</td>
                    <td width="40%" align="center" class="txt_login"><input name="textfield2" type="file" id="textfield2" size="28" style="border:none" /></td>
                    <td width="35%" rowspan="3" align="left" valign="middle"></td>
                  </tr>
                  <tr>
                    <td align="right">Adjunto 2:</td>
                    <td align="center" class="txt_login"><input name="textfield" type="file" id="textfield" size="28" style="border:none" /></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"></td>
                  </tr>
                  
                  <tr>
                    <td colspan="3" align="right" valign="top"></td>
                  </tr>
                  
                  <tr>
                    <td align="right" valign="top">&nbsp;</td>
                    <td colspan="2" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="3">
                      <tr>
                        <td align="right">

                          <label> </label>                          <label></label>                          <input name="button2" type="submit" class="txt_login" id="button2" value="Guardar" />
                          <input name="button" type="submit" class="txt_login" id="button" value="Cancelar" /></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
              </div></td>
            </tr>
            <tr>
              <td width="508" height="47" background="imagenes/papiro/papirotrans_05.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>
        </div>
		
		</body>
</html>
