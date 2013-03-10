<div id="papiro">
	      <table width="670" height="358" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="132" rowspan="3" valign="middle" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p><a href="#"><?php  echo ballom_echo("saveMessage");?></a><?php echo "<a href='contenidoIndex.php?menuOption=devolverAlCielo&idMensaje=".$id."'>"; ?><?php  echo ballom_echo("returnToHeaven");?></a><?php echo "<a href='contenidoIndex.php?menuOption=responder&idMensaje=".$id."'>"; ?><?php  echo ballom_echo("reply");?></a><?php echo "<a href='contenidoIndex.php?menuOption=eliminarGlobo&idMensaje=".$id."'>"; ?><?php  echo ballom_echo("delete");?></a><?php echo "<a href='contenidoIndex.php?menuOption=reportarAbuso&idMensaje=".$id."'>"; ?><?php  echo ballom_echo("reportAbuse");?>
</a><a href="contenidoIndex.php?menuOption=bloquearContactoConfirmacion&idMensaje=<?php echo $id; ?>"><?php  echo ballom_echo("blockUser");?></a><a href="contenidoIndex.php?menuOption=peticionContactoConfirmacion&idMensaje=<?php echo $id; ?>"><?php  echo ballom_echo("contactRequest");?>
</a></p></td>
              <td height="30" background="imagenes/papiro/papiro_02.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="40" rowspan="3" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat">&nbsp;</td>
              <td></td>

            </tr>
            <tr>
              <td height="270" valign="top" style="background-image:url(imagenes/papiro/papiro_03big.jpg); background-position:center">

			  <div id="papiro_central">
			   <table width="100%" border="0" cellpadding="0" cellspacing="2">
                <tr>
                  <td colspan="2"><h1><?php  echo ballom_echo("sender").$sender?> </h1></td>
                  <td width="30%" align="right" class="fecha"><?php echo $estado.", ".$pais." ".date('M-d-Y H:i', strtotime($fechaHora));?></td>
                  <td width="1%" colspan="2" align="right">&nbsp;</td>
                </tr>
                </table>

                <h1><?php echo $asunto; ?></h1>
                <p><?php echo $mensaje; ?></p>
                <br />
                <br />
                  <?php
			  for ($i=0; $i<count($archivosAdjuntos);$i++)
			  {
			  	if ($i==0)
			  	    {echo "<b>".ballom_echo("attach")."</b> <br />";}

				echo "<a target='_blank' href='".$patharchivosAdjuntos[$i]."'>".$archivosAdjuntos[$i]."</a><br />";
			   }
			  ?>
              </div>
			  </td>

            </tr>
            <tr>
              <td width="480" height="47" background="imagenes/papiro/papiro_05.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>

            </tr>
          </table>


        </div>

