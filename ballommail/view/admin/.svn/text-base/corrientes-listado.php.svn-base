<script src="js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="js/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<link href="js/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen"/>

<script type="text/javascript">

function reloadListaCorrientes()
{
	//alert($('#select1').val());
	$("#rmksSelectedClass").attr('value',$('#select1').val());
	//$("#paginado").click();	 	      
     $('#frmRemarks').submit();
	 
}



function display (who) {
	$.fancybox({
	'href': 'confirmarEliminacionCorriente.php'+who,
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
	  display("?id=11");
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

<div id="formPaginado" >
<form id="frmRemarks" name="frmRemarks" action="contenidoIndexAdmin.php" >
<input type="hidden" name ="page" id="rmksSelectedClass"  value="">
<input type="hidden" name ="menuOption" id="menuOption"  value="corrientes-listadoCorrientes">
<input type="hidden" name ="contenido" id="contenido"  value="getListadoCorrientes">
<input type="hidden" name ="controller" id="controller"  value="AdministradorAdminCorrientes">
</form>
</div>
<div id="center-column">
                <div class="top-bar">
                    <a href="contenidoIndexAdmin.php?menuOption=corrientes-FormModificarCorrientes&contenido=getFormModificarCorriente&controller=AdministradorAdminCorrientes&accion=alta" class="button">Agregar Nueva </a>
                    <h1>Corrientes</h1>
                    <div class="breadcrumbs">Altas/Bajas/Modificaciones de Corrientes</div>
                </div>

                <div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Corrientes</th>
                            <th>Modificacion</th>
                            <th>Baja</th>
                        </tr>
                        <?php 
                        for ($i=0; $i<count($nombreCorrientes); $i++)
                        {
                        	echo '<tr><td class="style3">'.$nombreCorrientes[$i].'</td>';
                        	echo '<td><a href="contenidoIndexAdmin.php?menuOption=corrientes-FormModificarCorrientes&contenido=getFormModificarCorriente&controller=AdministradorAdminCorrientes&accion=modifica&idCorriente='.$idCorrientes[$i].'" class="button"><img src="img/add-icon.gif" width="16" height="16" alt="add" /></a></td>';
                        	echo '<td>';                        	
                        	$aux = '?id='.$idCorrientes[$i];                        	                        	
                        	echo '<a onclick="javascript:display(';                        	
                        	echo "'".$aux."'";
                        	echo ');"  href="#"  >';
                        	echo '<img src="img/hr.gif" width="16" height="16" alt="" /></a></td>';
                        	echo '</tr>';							                        
                        }                                               
                        ?>
                    </table>
                    <div class="select">
                        <strong>Otras paginas: </strong>
                        <select id="select1" name="select1" onchange="reloadListaCorrientes();">
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
                <div class="table">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            
                        </tr>
                    </table>
                </div>
            </div>
			
			 <div id="right-column"><strong class="h">Listado de Corrientes</strong>
			   <div class="box">
			   Gestiona la modificaci&oacute;n de claves y traducciones de una corriente y la baja de las mismas. Las corrientes se muestran ordenadas por orden ascendente de sus &quot;nombres&quot;, que son claves en la tabla <strong>claveslenguajes.  Las bajas deben mostrar un mensaje de confirmaci&oacute;n para el borrado previo. </div>
</div>          