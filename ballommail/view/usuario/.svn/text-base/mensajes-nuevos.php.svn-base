  <div id="contenido_menu">

 <div id="mensajes">
 <?php
if (count($IdMensajes)!=0 ){ ?>
     <div class="navi"></div>
	 <a class="prev browse left"></a>

<div class="scrollable" id="browsable">

    <div class="items">

     <?php
	 if (count($IdMensajes)!=0 )
	 {
	 $aux2=	$config->get('mensajesPorSlideInterval');
	 $aux=$config->get('mensajesPorSlideInterval');
     for($i=0;$i<count($IdMensajes);$i++)
	 {
	 	 //-------------------------Cambio el formato de la fecha por la maquetación---------//
		$fechaModificada = str_replace("-", "/", $FechaHoraEnvio[$i]);
		$fechaModificada = str_replace(" ", " - ", $fechaModificada);
		$fechaModificada = substr_replace($fechaModificada,"h",strlen($fechaModificada)-3);
		//-----------------------------------------------------------------------------------//
	  if ( $i % $config->get('mensajesPorSlideMax') == 0 )
	  	  {echo "<div>";}
	  echo "<a href='contenidoIndex.php?menuOption=verMensajeRecibido&idMensaje=".$IdMensajes[$i]."' ><div id='contenedor'>";
echo "<img src='imagenes/globo/".$Fotos[$i]."' width='75' height='75' class='perfil' />";
echo "<h1><img src='imagenes/globo/bandera.png' width='9' height='8' border='0' class='bandera' />".$Destinatario[$i]."
  <img src='imagenes/globo/flecha_cerrar.png' width='10' height='6' border='0' /></h1>
<h4>".$fechaModificada."<br />
  ".$Estados[$i]." - ".$Paises[$i]."</span><br />
</h4>
</div></a>";

	if ( $aux == $i )
	 {
	 	echo "</div>";
		  $aux = $aux + $config->get('mensajesPorSlideMax');
		  }
	 }

	 if ($aux2 <= $aux)
	    echo "</div>";

	 }
	 ?>


     </div>
	 </div>

	<a class="next browse right"></a>
	<div class="naviPag">1 de <?php echo ceil(count($IdMensajes)/6); ?></div>
	<?php
}
else
				echo "<br /><br /><p style='font-size:14px' align='center'><strong>";
		echo ballom_echo("msjSinMsjsPorLeer"); echo"</strong></p>";
?>
  </div>



<script>
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
$(document).ready(function() {


$("#browsable").scrollable().navigator();
});
</script>

 <p><a href="contenidoIndex.php?menuOption=getMensajesNuevos&controller=Mensajes&panel=2" class="boton_bajomenu"><?php  echo ballom_echo("newMessages");?></a></p>
     <p>
       <a href="contenidoIndex.php?menuOption=getMensajesLeidos&controller=Mensajes&panel=2" class="boton_bajomenu"><?php  echo ballom_echo("readMessages");?></a></p>

</div>

