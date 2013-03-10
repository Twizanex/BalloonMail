<div id="center-column">
                <div class="top-bar">
                    
                    <h1>Corrientes</h1>
                    <div class="breadcrumbs">Alta/ Baja /Modificaciones</div>
                </div>
                
                <span class="select-bar">
                <label></label>
                <label></label>
                </span>
                <div class="table">  
                <?php 
                if ($mensajeError!="")
                {
                	echo "<b><font color='#DC143C'>";
                	echo $mensajeError;
                	echo "</font></b>";
                }
                ?>              
                <form method="post" name=formCorriente" action="
                <?php 
                if ($accion!='modifica')
                	echo "contenidoIndexAdmin.php?menuOption=corrientes-AltaModificarCorriente&contenido=getAltaModificarCorriente&controller=AdministradorAdminCorrientes&accion=alta"; 
                else 
                	echo "contenidoIndexAdmin.php?menuOption=corrientes-AltaModificarCorriente&contenido=getAltaModificarCorriente&controller=AdministradorAdminCorrientes&accion=modifica&idCorriente=".$idCorriente;
                	?>
                " >                
                  <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Listado</th>
                        </tr>
                        <tr>
                        <td width="172"><strong>Clave de la corriente  :</strong></td>
                            <td><input name="claveCorriente" type="text" class="text" value="<?php if ($accion=='modifica') echo $claveCorriente;?>" /></td>
                        </tr>
                        <?php 
                        for ($i=0; $i<count($idioma);$i++)
                        {
                        	$cont = $i+1;                        	
                        	echo '<tr>';
                        	$idiomaClean =str_ireplace("Ã±", "&ntilde;", $idioma[$i]);
                        	$idiomaClean =str_ireplace("Ã©", "&eacute;", $idiomaClean);
                        	echo '<td><strong>Corriente en '.$idiomaClean.'</strong></td>';
                        	echo "<td><input name='corrienteIdioma";
                        	echo $cont."'";
                        	echo "type='text' class='text' value='";
                        	if ($accion=='modifica') 
                        	{echo $clave[$i];}
                        	echo "'/>";
                        	echo "<input type='hidden' value='";
                        	echo $cont;
                        	echo "' name='idiomaCorriente";
                        	echo $cont;
                        	echo "' />";
                        	echo '</td>';
                        	echo '</tr>';	
                        }                        
                        ?>                                             
                          <td>&nbsp;</td>
                          <td><input type="submit" name="Submit2" value="<?php if ($accion=='modifica') echo "Modificar"; else echo "Agregar";?>" /></td>
                        </tr>
                        <tr>
                          <td colspan="2">Para poder darse de alta/modificarla no debe existir una corriente con el mismo nombre. El alta de una corriente impactará en la tabla corrientes, en la tabla claves lenguajes: en donde se incorporará por cada idioma existente en la tabla idiomas la traducción para dicha clave. Consultar por documentación web multilenguaje para desarrollar esto</td>
                        </tr>
                    </table>
                    </form>
              </div>
            </div>
			
			 <div id="right-column">
			 <strong class="h">Alta/Modificaci&oacute;n de Corriente</strong>
                <div class="box">
				Permite Agregar o Modificar una corriente en el sistema.
				</div>
</div>          