<link href="js/calendario-jquery/calendario-jquery/calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="js/calendario-jquery/calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/calendario-jquery/calendario-jquery/calendario_dw/calendario_dw.js"></script>

<script type="text/javascript">
$(document).ready(function(){
   $(".campofecha").calendarioDW();
});
</script>
<div id="center-column">
				<div class="top-bar">                    
                    <h1>Conexiones por fecha</h1>
                    <div class="breadcrumbs">Indique las fechas para la busqueda</div>
					<div class="table">
					<form class="form" method="post" name="listadoConexiones" action="contenidoIndexAdmin.php?menuOption=estadistica-conexionesUsuarios&contenido=getUsuariosConexiones&controller=AdministradorEstadisticas" enctype="multipart/form-data" >
                      <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Listado por fecha</th>
                        </tr>
                        <tr>
                            <td width="172"><strong>Fecha de inicio </strong></td>
                            <td><input type="text" name="fechaDesde" class="campofecha" value="<?php echo $fechaDesde; ?>" /></td>
                        </tr>
                        <tr>                        </tr>
                        <tr>
                          <td><strong>Fecha de fin</strong></td>
                          <td><input type="text" class="campofecha" name="fechaHasta" value="<?php echo $fechaHasta; ?>"/></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><input type="submit" name="Submit" value="Buscar" /></td>
                        </tr>
                        <tr>
                            
                        </tr>
                        <tr>                        </tr>
                    </table>
                    </form>
                </div>
                </div>

        </div>
		
		                
            <div id="right-column">
                <strong class="h">Conexiones por Fecha </strong>
                <div class="box">Formulario para indicar parametros de busquedad. A la derecha  debe aparecer el calendario para seleccionar las fechas entre las cuales se quieren visualizar la estadistica. </div>
            </div>