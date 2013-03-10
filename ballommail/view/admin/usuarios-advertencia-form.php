<div id="center-column">
                <div class="top-bar">
                    
                    <h1>Advertencia a Usuario </h1>
                    <div class="breadcrumbs"></div>
                </div>
                
                <span class="select-bar">
                <label></label>
                <label></label>
                </span>
                <div class="table">
                <form method="post" name=formAdvertenciaUsuario" action="contenidoIndexAdmin.php?menuOption=usuarios-envio-advertencia-form&contenido=envioAdvertencia&controller=AdministradorAdminUsuarios" >
                  <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Este es un mensaje de advertencia al usuario <?php echo $Usuario; ?> </th>
                        </tr>
                        <tr>
                            <td width="172"><strong>Contenido del mensaje:</strong></td>
                            <td>
                            <input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario'];?>" />
                                <label>
                                  <textarea name="txtAdvertencia" rows="10">Este es un mensaje de advertencia por haber utilizado palabras inapropiadas para comunicarse con otros usuairos de la red social.....</textarea>
                                </label>
                                                          </td>
                        </tr>
                        
                        
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                            <input type="submit" name="Submit" value="Enviar" />							</td>
                        </tr>
                    </table>
                    </form>
              </div>
            </div>
			
			 <div id="right-column">
			 <strong class="h">A/M Corriente</strong>
                <div class="box">
				La advertencia se enviar&aacute; como un mensaje al usuario de la red social. Se enviar&aacute; un mensaje a la casilla de correo del usuario y un mensaje BM, a su cuenta. (tabla mensajes / mensajesdestinatarios). El mensaje es de tipo advertencia: ver tabla tiposmensajes.</div>
           </div>          
           
           
           
           
