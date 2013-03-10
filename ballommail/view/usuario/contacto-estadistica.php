  <div id="contenido_menu">
     <!-- javascript coding -->
<script>
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
$(document).ready(function() {

// initialize scrollable together with the navigator plugin
$("#browsable").scrollable().navigator();
});
</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
     <tr>
       <td width="17%" height="39">
       	<?php
       	$selected = '';
       	if ( 'enviado' == $_GET['mensaje']){
       		$selected = ' class="selected" ';
       	}
       	?>
       	<strong><a <?php echo $selected;?> href="contenidoIndex.php?menuOption=vuelos&mensaje=enviado">
       	<?php  echo ballom_echo("messagesSent");?>
 	   	(<?php echo $data['mensajes_enviados'];?>)</a></strong>
 	  </td>
       <td width="18%" rowspan="3" background="imagenes/backcolum.png" style="background-repeat:repeat-y">

       <table width="100%" border="0" cellpadding="2" cellspacing="3">
       <?php foreach ($data['continentes'] as $key => $value) {
        $selected = '';
       	if (key($value) == $_GET['cont']){
       		$selected = ' class="selected" ';
       	}
       	?>
         <tr>
           <td><em><a <?php echo $selected;?> href="contenidoIndex.php?menuOption=vuelos&mensaje=<?php echo $_GET['mensaje']?>&cont=<?php echo key($value);?>"><?php echo ballom_echo($key);?> (<?php echo $value[key($value)];?>)</a></em></td>
         </tr>
         <?php } ?>
       </table>
       </td>
       <td width="65%" rowspan="3">
       <div class="double-both" style="width: 100%;height: 150px;overflow-y: auto;overflow-x: hidden;">
	       <table width="100%" border="0" cellpadding="2" cellspacing="3" background="imagenes/backcolum.png" style="background-repeat:repeat-y">
	       <?php
	       $col = 2;
	       foreach ($data['paises'] as $key => $value) {
	       	//$col++;
	       	if ($col%2!=0){
	       	  echo "<tr>";
	       	}
	       ?>
	           <td><em><a href="contenidoIndex.php?menuOption=vuelos&mensaje=<?php echo $_GET['mensaje']?>&cont=<?php echo $_GET['cont']?>"><?php echo ballom_echo($key);?> (<?php echo $value;?>)</a></em></td>
	       <?php
	       	if ($col%2==0){
	       	  echo "</tr>";
	       	}
	       }
	       ?>
	      </table>
      </div>
      </td>
     </tr>
     <tr>
       <td height="56">
       	<?php
       	$selected = '';
       	if ( 'recibido' == $_GET['mensaje']){
       		$selected = ' class="selected" ';
       	}
       	?>
       	<strong><a <?php echo $selected;?> href="contenidoIndex.php?menuOption=vuelos&mensaje=recibido"><?php  echo ballom_echo("messageReceived");?>
 		(<?php echo $data['mensajes_recibidos'];?>)</a></strong>
 		</td>
     </tr>
     <tr>
       <td height="33%">
       <?php
       	$selected = '';
       	if (!isset($_GET['mensaje']) || 'ver todo' == $_GET['mensaje'] || '' == $_GET['mensaje']){
       		$selected = ' class="selected" ';
       	}
       	?>
       <strong><a <?php echo $selected;?> href="contenidoIndex.php?menuOption=vuelos&mensaje=ver todo" ><?php  echo ballom_echo("seeAll");?>
 (<?php echo $data['mensajes_total'];?>)</a></strong></td>
     </tr>
     </table>
   <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>

</div>
