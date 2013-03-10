<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script type="text/javascript">

function reloadListaEstadisticaMemoria()
{
	//alert($('#select1').val());
	$("#rmksSelectedClass").attr('value',$('#select1').val());
	//$("#paginado").click();	 	      
     $('#frmRemarks').submit();
	 
}
</script>

<div id="formPaginado" >
<form id="frmRemarks" name="frmRemarks" action="contenidoIndexAdmin.php" >
<input type="hidden" name ="page" id="rmksSelectedClass"  value="">
<input type="hidden" name ="menuOption" id="menuOption"  value="estadistica-espacioMemoriaUsuarios">
<input type="hidden" name ="contenido" id="contenido"  value="getCantidadEspacioMemoria">
<input type="hidden" name ="controller" id="controller"  value="AdministradorEstadisticas">
</form>
</div>         
          <div id="center-column">
                <div class="top-bar">
                   
                    <h1>Cantidad de mensajes y espacio utilizado </h1>
            </div>
                <div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="251">Nombre de usuario </th>
                            <th width="169">Cantidad de mensajes </th>
                            <th width="191">Espacio utilizado </th>
                        </tr>
                         <?php 
                        for ($i=0; $i<count($Emails); $i++)
                        {
                        	echo '<tr><td class="style3">'.$Emails[$i].'</td><td class="style2">'.$CantidadMensajes[$i].'</td><td class="style2">'.$CantidadMemoria[$i].'</td></tr>';							                        
                        }                                               
                        ?>     
                        <tr>
                        <td colspan="3"  class="style3">
                    <p >Total de espacio utilizado: <strong><?php echo $TotalCantidadMensajesEspacio; ?></strong>.</p>                                                
                        </tr>                 
                    </table>
                    <div class="select">
                        <strong>Otras p&aacute;ginas : </strong>
                        <select id="select1" name="select1" onchange="reloadListaEstadisticaMemoria();">
                        <?php 
                        for ($i=0; $i<$cantPaginas;$i++)
                        {
                        	echo '<option value="'.($i+1).'"';
                        	if ( ($i+1)==$paginaSeleccionada )
                        	{
                        		echo " SELECTED ";
                        	}
                        	echo '>'.($i+1).'</option>';
                        }
                        ?>      
                        </select>
                    </div>
                </div>
          </div>
          
          <div id="right-column">
                <strong class="h">Espacio Utilizado </strong>
                <div class="box">Listado ordenado en forma descendente por espacio utilizado. Considerar el espacio utilizado en el directorio del usuario: files/idUsuario. </div>
</div>          