   <div id="contenido_menu_contacto">

     <!-- javascript coding -->
<script>
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
$(document).ready(function() {

// initialize scrollable together with the navigator plugin
$("#browsable").scrollable().navigator();
});
</script>
 <?php if ($contactos) {?>
<div id="buscar"><form class="form" method="post" name="busquedaForm" action="contenidoIndex.php?menuOption=buscarContacto"><input name="claveBusqueda" size="15" style="background-color:transparent" /><input name="buscar" type="submit" class="button" value="Buscar"/></form></div>
<?php }?>
<div id="usuario_bloque">
   <?php if ($contactos) {?>


  <table width="565" border="0" align="center" cellpadding="0" cellspacing="0">
  	<?php foreach ($contactos as $key => $value) {
  		?>
  	 <tr>
      <td width="10%">
      <a href="contenidoIndex.php?menuOption=verHomeContacto&idContacto=<?php echo $key;?>"><img src="imagenes/user.jpg" alt="" width="60" height="61" border="0" class="usuario" /></a></td>
      <td width="90%"><div class="usuarios_caja"> <span class="titulo_usuario_caja"><a href="contenidoIndex.php?menuOption=verHomeContacto&idContacto=<?php echo $key;?>"><?php echo $value['nombres']?> </a></span><br />
        <span class="titulo_usuario_caja"><span class="usuario_eliminar">
        <a href="contenidoIndex.php?menuOption=deleteContacto&id=<?php echo $value['id'];?>"><?php echo ballom_echo("delete"); ?></a>
		<?php if ($value['bloqueado']) { ?>
		|<a href="contenidoIndex.php?menuOption=desbloquearContacto&id=<?php echo $value['id'];?>"><?php echo ballom_echo("unlock"); ?></a>
		<?php } else { //do nothing
		?>
		<?php }?>

<!--
<!--           <input type="reset" name="button" id="button" value="<?php echo ballom_echo("delete"); ?>" /> -->
          </span></span><?php echo $value['apellidos']?><br />
        <?php echo $value['lugarResidencia']?> </div></td>
    </tr>
  	<?php }?>
    </table>

     <?php }
    else {
    ?>
    <strong>
     <?php
      echo ballom_echo("withOutContacts"); }
      ?>
    </strong>
</div>
<p>&nbsp;</p>
     <p>&nbsp;</p>


   </div>