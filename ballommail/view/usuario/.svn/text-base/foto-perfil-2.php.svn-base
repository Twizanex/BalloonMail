<?php
require_once 'autoload.php';
require_once ('../../commons/languages.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

function cerrarFancy()
{
	parent.jQuery.fancybox.close();
	$("#enlace").click();
}
</script>

<?php
if(isset($elimino)) 
if ($elimino!="")
{ ?>
<script type="text/javascript">
cerrarFancy();
$("#enlace").click();
</script>

<?php }?>

</head>


<body>
	 <form class="form" method="post" name="mensajeForm" action="contenidoIndex.php?menuOption=SubirFotoPerfil&controller=Header" enctype="multipart/form-data" >

          <table width="670" height="356" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="75" rowspan="3" valign="top" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td height="30" background="imagenes/papiro/papiro_02enviar.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="91" rowspan="3" valign="top" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat"><a href="contenidoIndex.php?menuOption=hill" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','imagenes/cerrar2.png',1)"></a></td>
            </tr>
            <tr>
              <td height="266" valign="top" style="background-image:url(imagenes/papiro/papiro_03enviar.jpg); background-position:center"><table width="100%" border="0" cellpadding="0" cellspacing="2">
                </table>
                <div id="papiro_central_enviar">
                <table width="100%" border="0" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="200%" height="190" colspan="4" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td height="24">&nbsp;</td>
                        <td width="1%" colspan="2" align="right">&nbsp;</td>
                      </tr>
                    </table>

                      <table width="100%" border="0" cellpadding="0" cellspacing="2">
                        <tr>
                          <td colspan="2"><div align="right"><?php echo ballom_echo("avatarPhoto"); ?></div></td>
                          <td width="72%" align="left" class="fecha"><span class="txt_login">
                            <input name="archivos" type="file" id="archivos" size="28" style="border:none" value="<?php echo $usuario['email'];?>"/>
                          </span></td>
                          <td width="1%" colspan="2" align="right">&nbsp;</td>
                        </tr>
                      </table>
                      <div align="center">
                        <table width="100%" border="0" cellpadding="0" cellspacing="2">
                          <tr>
                            <td height="24">
                              <div align="center">
                                <input name="enviar" type="submit" value="<?php echo ballom_echo("avataruploadPhoto"); ?>" />
                              </div></td>
                            <td width="1%" colspan="2" align="right">&nbsp;</td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="2">
                          <tr>
                            <td height="24"><div align="center"></div></td>
                            <td width="1%" colspan="2" align="right">&nbsp;</td>
                          </tr>
                        </table>
                        <img src="<?php echo $_GET['foto']; ?>" width="60" height="61" />
                      </div>
                    <p align="center"><a href="contenidoIndex.php?menuOption=eliminarPerfil&controller=Header" ><?php echo ballom_echo("avatardeletePhoto"); ?></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="parent.jQuery.fancybox.close();"><?php echo ballom_echo("avatarclosePhoto"); ?></a>                    </p></td>
                  </tr>
                  </table>
              </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td valign="middle" class="anotacion"><p>
				    <div align="center"></div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td width="504" height="47" background="imagenes/papiro/papiro_05enviar.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>
		<input name="idTipoMensaje" type="hidden" value="2">


          </form>
</body>
</html>