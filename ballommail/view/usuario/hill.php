<div id="papiro">
	<?php
	if ($peticiones) {
		echo ballom_echo("contactRequestPending").":<br/><br/><br/>";
	}
	foreach ($peticiones as $key => $value) {
		echo $value['nombres']." ".$value['apellidos'] ;
		?>
		<a href="contenidoIndex.php?menuOption=aceptarContacto&idSolicitud=<?php echo $key;?>">Aceptar</a>
		<br/>
		<?php
	}
	?>
</div>