<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script type="text/javascript">

function reloadListaSugerenciasUsuarios()
{
	//alert($('#select1').val());
	$("#rmksSelectedClass").attr('value',$('#select1').val());
	//$("#paginado").click();	 	      
     $('#frmRemarks').submit();
	 
}
</script>


<style type="text/css">
<!--
.Estilo2 {
	color: #990033;
	font-weight: bold;
}
-->
</style>

<div id="formPaginado" >
<form id="frmRemarks" name="frmRemarks" action="contenidoIndexAdmin.php" >
<input type="hidden" name ="page" id="rmksSelectedClass"  value="">
<input type="hidden" name ="menuOption" id="menuOption"  value="usuarios-sugerenciasCorrientes">
<input type="hidden" name ="contenido" id="contenido"  value="getListadoSugerenciasCorrientes">
<input type="hidden" name ="controller" id="controller"  value="AdministradorAdminUsuarios">
</form>
</div>

          <div id="center-column">
                <div class="top-bar">

                    <h1>Sugerencias de corrientes  </h1>
                    <div class="breadcrumbs"></div>
                </div>
<div class="table">
                  <table class="listing" cellpadding="0" cellspacing="0">                                   
                    <tr>
                      <th width="150">Fecha </th>
                      <th width="136">Nombre de usuario </th>
                      <th width="263">Corriente sugerida  </th>                      
                    </tr>
                    <?php 
                        for ($i=0; $i<count($emailUsuarios); $i++)
                        {
                        	echo '<tr>';
                        	echo '<td class="style3">'.$fechaHoraRecepcion[$i].'</td>';
                        	echo '<td class="style3">'.$emailUsuarios[$i].'</td>';
                        	echo '<td class="style3">'.$corrientesSugeridas[$i].'</td>';                        	                        	                        
                        	echo '</tr>';							                        
                        }                                               
                        ?>                    
                    <tr>
                      <td class="style2">                    </tr>
                  </table>
                  <div class="select">
                        <strong>Otras pagina : </strong>
                        <select id="select1" name="select1" onchange="reloadListaSugerenciasUsuarios();">
                        <?php 
                        for ($i=0; $i<$cantidadPaginas;$i++)
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

          <div id="right-column"><strong class="h">Sugerencias de corriente </strong>
            <div class="box">Las sugerencias de corriente son mensajes enviados por un usuario al administrador del sistema. </div>
</div>
