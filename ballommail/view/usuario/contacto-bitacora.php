        <div id="papiro">
          <table width="670" height="358" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="132" rowspan="3" valign="top" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
<p><?php include_once 'contacto-menu.php';?></p>
                <p>&nbsp;</p></td>
              <td height="30" background="imagenes/papiro/papiro_02.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="40" rowspan="3" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat">&nbsp;</td>
            </tr>
            <tr>
              <td height="270" valign="top" style="background-image:url(imagenes/papiro/papiro_03big.jpg); background-position:center"><div id="papiro_central">
                <div id="ficha"><span class="ficha_titulo"><table width="100%" border="0" cellpadding="0" cellspacing="0">

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
	 	                    <td width="10" valign="top" background="imagenes/fondocabmsj.png"></td>
						<?php

						}

						else {
							echo '</strong></p></td>';
							?>
			                 <td valign="top"><a href="contenidoIndex.php?menuOption=eliminarBitacora&page=<?php echo $page; ?>&id=<?php echo $key;?>&retornaPaginaCompleta=true" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar3','','imagenes/cerrar2.png',1)"></a></td>
						<?php

						};

						?>
					 	</tr>
						<?php
						$linea++;

					}

				?>


                  </table>
                </span></div>
              </div></td>
            </tr>
            <tr>
              <td width="480" height="47" background="imagenes/papiro/papiro_05.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>
        </div>