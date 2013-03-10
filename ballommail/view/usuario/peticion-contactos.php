<?php //print_r($bitacora);
//<?php echo date('d-m-Y H:i:s', time());

?>

<div id="papiro">
Peticiones de Contacto Pendientes
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
						else{echo '<td><p><strong>';};

						echo date('M-d-Y H:i', $value['fechaHora'])." ". $value['texto'];

						if ($linea%2 == 0){
							echo '</h1></td>';
							?>
	 	                    <td width="10" valign="top" background="imagenes/fondocabmsj.png"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar" width="9" height="9" border="0" class="cerrar_msj" id="cerrar" /></a></td>
						<?php

						}

						else {echo '</strong></p></td>';
																	?>
			                    <td valign="top"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar3','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" name="cerrar3" width="9" height="9" border="0" class="cerrar_msj" id="cerrar3" /></a></td>
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
              <td width="480" height="63" align="center" valign="top" background="imagenes/papiro/papiro_05bit.png" style="background-position:bottom; background-repeat:no-repeat"><a href="contenidoIndex.php?menuOption=bitacora&page=<?php echo $paginaAnterior; ?>" class="flecha" onmouseover="MM_swapImage('anterior','','imagenes/fant2.jpg',1)" onmouseout="MM_swapImgRestore()"></a><span class="paginacion"><?php echo $paginaActual; ?>de <?php echo $totalPaginas; ?></span><a href="contenidoIndex.php?menuOption=bitacora&page=<?php echo $paginaSiguiente; ?>" class="flecha" onmouseover="MM_swapImage('posterior','','imagenes/fpos2.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="imagenes/fpos1.jpg" name="posterior" width="10" height="10" border="0" id="posterior" /></a></td>
            </tr>
          </table>
        </div>