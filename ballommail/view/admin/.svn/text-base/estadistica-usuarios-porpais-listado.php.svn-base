<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script type="text/javascript">

function reloadListaEstadisticaMensajesPais()
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
<input type="hidden" name ="menuOption" id="menuOption"  value="estadistica-cantUsuariosXPais">
<input type="hidden" name ="contenido" id="contenido"  value="getCantidadUsuariosXPais">
<input type="hidden" name ="controller" id="controller"  value="AdministradorEstadisticas">
</form>
</div> 
          <div id="center-column">
                <div class="top-bar">
                   
                    <h1>Cantidad de usuarios por pa&iacute;s </h1>
            </div>
                <div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="251">Pa&iacute;s</th>
                            <th width="169">Cantidad de usuarios </th>
                        </tr>
                         <?php 
                        for ($i=0; $i<count($CantidadPaises); $i++)
                        {
                        	echo '<tr><td class="style3">'.$NombrePaises[$i].'</td><td class="style2">'.$CantidadPaises[$i].'</td></tr>';							                        
                        }                                               
                        ?>    
                         <tr>
                        <td colspan="2" style="background-color:#D8D8D8;" >
                    <p >Total de usuarios de la red: <strong><?php echo $TotalUsuarios; ?></strong>.</p>                                                
                        </tr>
                    </table>
                    <div class="select">
                        <strong>Otras p&aacute;ginas : </strong>
                       <select id="select1" name="select1" onchange="reloadListaEstadisticaMensajesPais();">
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
                <strong class="h">Usuarios por Pa&iacute;s</strong>
                <div class="box">Ordenado en forma descendente por cantidad de usuarios agrupados por pa&iacute;s. </div>
</div>          