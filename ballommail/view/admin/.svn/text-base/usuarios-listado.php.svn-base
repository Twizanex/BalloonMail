<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="js/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<link href="js/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen"/>

<script type="text/javascript">

function reloadListaUsuarios()
{
	//alert($('#select1').val());
	$("#rmksSelectedClass").attr('value',$('#select1').val());
	//$("#paginado").click();	 	      
     $('#frmRemarks').submit();
	 
}

function displayEliminar (who) {
	$.fancybox({
	'href': 'confirmarEliminacionUsuario.php'+who,
	'width'    : '30%',
	'height'   : '20%',
	'autoScale'   : false,
	'transitionIn'  : 'none',
	'transitionOut'  : 'none',
	'type'    : 'iframe',
		'onClosed': function() { parent.location.reload(true); ; }
	 });
	} 




function displayBloqueo (who) {
	$.fancybox({
	'href': 'confirmarBloqueoUsuario.php'+who,
	'width'    : '30%',
	'height'   : '20%',
	'autoScale'   : false,
	'transitionIn'  : 'none',
	'transitionOut'  : 'none',
	'type'    : 'iframe',
		'onClosed': function() { parent.location.reload(true); ; }
	 });
	}


$(".create").click(function() {
	  display("?idUsuario=11");
	});

function cerrarFancy()
{
	parent.jQuery.fancybox.close();
	$("#resetButton").click();
}

</script>
<?php 
if ($elimino!="")
{ ?>
<script languaje="javascript"> 
cerrarFancy();
</script> 
<?php 
}
?>
<style type="text/css">
<!--
.Estilo2 {
	color: #990000;
	font-weight: bold;
}
-->
</style>

<div id="formPaginado" >
<form id="frmRemarks" name="frmRemarks" action="contenidoIndexAdmin.php" >
<input type="hidden" name ="page" id="rmksSelectedClass"  value="">
<input type="hidden" name ="menuOption" id="menuOption"  value="usuarios-listadoUsuarios">
<input type="hidden" name ="contenido" id="contenido"  value="getListadoUsuarios">
<input type="hidden" name ="controller" id="controller"  value="AdministradorAdminUsuarios">
</form>
</div>

<div id="center-column">
                <div class="top-bar">

                    <h1>Listado de usuarios </h1>
                    <div class="breadcrumbs"></div>
                </div>
            <div class="table">
                  <table class="listing" cellpadding="0" cellspacing="0">
                    <tr>
                      <th width="263">Nombre de usuario </th>
                      <th width="136">Eliminar </th>
                      <th width="100">Bloquear</th>
                      <th width="112">Envio de advertencia </th>
                    </tr>
                     <?php 
                        for ($i=0; $i<count($emailUsuarios); $i++)
                        {
                        	echo '<tr><td class="style3">'.$emailUsuarios[$i].'</td>';
                        	echo '<td>';
                        	$aux2 ='?idUsuario='.$idUsuarios[$i];
                        	echo '<a onclick="javascript:displayEliminar(';
                        	echo "'".$aux2."'";
                        	echo ');" href="#"  >';
                        	echo '<img src="img/hr.gif" width="16" height="16" alt="" /></a></td>';                        	
                        	echo '<td>';                        	
                        	$aux = '?idUsuario='.$idUsuarios[$i];
                        	if ($bloqueado[$i]==0)
                        	{                        	                        	
                        		echo '<a onclick="javascript:displayBloqueo(';                        	
                        		echo "'".$aux."'";
                        		echo ');"  href="#"  >';
                        		echo '<img src="img/hr.gif" width="16" height="16" alt="" /></a></td>';
                        	}
                        	else 
                        	{
                        		echo '<b>bloqueado</b></td>';                        		
                        	}
                        	echo '<td><a href="contenidoIndexAdmin.php?menuOption=usuarios-advertencia-form&contenido=getFormAdvertencia&controller=AdministradorAdminUsuarios&idUsuario='.$idUsuarios[$i].'" class="button"><img src="img/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>';
                        	echo '</tr>';							                        
                        }                                               
                        ?>                  
                    <tr>
                    <td colspan="4" class="style3">
                    <p class="box"> </p>                        
                        <p class="box">&nbsp;</p></td>
                        </tr>
                    <tr>
                    <td class="style2">                    </tr>
                  </table>
                  <div class="select">
                        <strong>Otras pagina : </strong>
                        <select id="select1" name="select1" onchange="reloadListaUsuarios();">
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
                <strong class="h">Listado de usuarios </strong>
                <div class="box">Gestiona los usuarios de la red social. Ordenado por nombre de usuario en forma ascendente.</div>
</div>