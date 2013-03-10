<link href="js/calendario-jquery/calendario-jquery/calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="js/calendario-jquery/calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/calendario-jquery/calendario-jquery/calendario_dw/calendario_dw.js"></script>
<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script type="text/javascript">

function reloadListaEstadisticaConexiones()
{
	//alert($('#select1').val());
	$("#rmksSelectedClass").attr('value',$('#select1').val());
	//$("#paginado").click();	 	      
     $('#frmRemarks').submit();
	 
}
</script>

<div id="formPaginado" >
<form id="frmRemarks" name="frmRemarks" action="contenidoIndexAdmin.php?menuOption=estadistica-conexionesUsuarios&contenido=getUsuariosConexiones&controller=AdministradorEstadisticas" method="post" >
<input type="hidden" name ="page" id="rmksSelectedClass"  value="">
<input type="hidden" name ="menuOption" id="menuOption"  value="estadistica-conexionesUsuarios">
<input type="hidden" name ="contenido" id="contenido"  value="getUsuariosConexiones">
<input type="hidden" name ="controller" id="controller"  value="AdministradorEstadisticas">
<input type="hidden" name ="fechaDesde" id="fechaDesde"  value="<?php echo $fechaDesde; ?>">
<input type="hidden" name ="fechaHasta" id="fechaHasta"  value="<?php echo $fechaHasta; ?>">
</form>
</div>  


<div id="center-column">
                <div class="top-bar">

                    <h1>Listado de usuarios conectados entre fechas </h1>
                    <br />                    
                    <div class="breadcrumbs">
                  <a href="contenidoIndexAdmin.php?menuOption=estadistica-conexionesUsuarios&contenido=getFormBusquedaConexiones&controller=AdministradorEstadisticas">
                    Desde 
   <?php echo $fechaDesde; ?>
    hasta 
<?php echo $fechaHasta; ?></a>      
 </div>
                </div>
                <div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Nombre de usuario </th>
                            <th>Cantidad de conexiones </th>
                        </tr>
                        <?php 
                        for ($i=0; $i<count($ConexionesUsuarios); $i++)
                        {
                        	echo '<tr><td class="style3">'.$Emails[$i].'</td><td class="style2">'.$ConexionesUsuarios[$i].'</td></tr>';							                        
                        }                                               
                        ?>
                        <tr>
                    <td colspan="2" style="background-color:#D8D8D8;">
                    <p >El total de usuarios que se conectaron entre <strong><?php echo $fechaDesde; ?></strong> y <strong><?php echo $fechaHasta;  ?></strong>: <strong><?php echo $TotalBusquedaConexiones; ?></strong>.</p>                                                
                        </tr>
                    <tr>
                    </table>
                    <div class="select">
                        <strong>Otras p&aacute;ginas : </strong>
                        <select id="select1" name="select1" onchange="reloadListaEstadisticaConexiones();">
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

          <div id="right-column"><strong class="h">Conexiones por Fecha</strong>
            <div class="box">Listado de conexiones por usuario, ordenado en forma descendente por cantidad de conexiones. Al hacer click en Desde f1 Hasta f2 debe llevar al formulario para reformular fechas de estadísticas de conexiones.  </div>
</div>