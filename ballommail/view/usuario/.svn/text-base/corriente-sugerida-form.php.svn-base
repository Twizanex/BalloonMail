
<div id="papiro">
	 <form class="form" method="post" name="mensajeForm" action="contenidoIndex.php?menuOption=soltarGlobo" enctype="multipart/form-data" >

          <table width="670" height="356" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="75" rowspan="3" valign="top" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td height="30" background="imagenes/papiro/papiro_02enviar.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="91" rowspan="3" valign="top" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat"><a href="contenidoIndex.php?menuOption=hill" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" alt="" name="cerrar" width="9" height="9" border="0" class="cerrar_msj" id="cerrar" /></a></td>
            </tr>
            <tr>
              <td height="266" valign="top" style="background-image:url(imagenes/papiro/papiro_03enviar.jpg); background-position:center"><table width="100%" border="0" cellpadding="0" cellspacing="2">
                <tr>
                  <td colspan="2"><h1>
                    <input name="asunto" style="width:98%;background-color:transparent; overflow-x:hidden; overflow-y:auto; border: solid thin #999999;" value="<?php  echo ballom_echo("sugestAirstreamTitle");?>" label="label"/></input>
                  </h1></td>
                  <td width="64%" align="right" class="fecha"><?php echo $estado.", ".$pais." ".date('M/d/Y');?></td>
                  <td width="1%" colspan="2" align="right">&nbsp;</td>
                </tr>
                </table>
                <div id="papiro_central_enviar">
                <table width="100%" border="0" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="200%" height="190" colspan="4" valign="top"><textarea label name="mensaje" style="width:98%; height:90%; background-color:transparent; overflow-x:hidden; overflow-y:auto; border: solid thin #999999;"/></textarea></td>
                  </tr>
                  </table>
              </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="30%" rowspan="2" valign="middle" class="anotacion"><p>
					</td>
                    <td width="31%" rowspan="2" align="center"><input name="enviar" type="submit" class="button" value="<?php  echo ballom_echo("sugest");?>" /></td>
                    <td width="21%" align="center">Dirigido a: Administrador BM</td>
                    <td width="18%" align="center"><select name="selectIdioma" class="bajo_soltar" id="select" style="border:none; width:80px; background-color:transparent">
                      <?php
                      	foreach ($idiomas as $key=>$value)
	 					{
						    if ($key == $idIdiomaDefecto) {
								$select=' selected="selected"';
							}
							echo '<option'.$select.' value="'.$key.'">'.$value["traduccion"].'</option>';
					    }
					?>
                    </select></td>
                  </tr>
                  <tr>
                      <td align="center" valign="middle" colspan="2"><div id="adjuntos"></div><label><a href="#" onClick="addCampo()"></a></label>
                      </td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td width="504" height="47" background="imagenes/papiro/papiro_05enviar.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>
		<input name="idTipoMensaje" type="hidden" value="2">


          </form>
        </div>