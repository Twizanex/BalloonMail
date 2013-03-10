<?php 
$idUsuario=$_GET['idUsuario'];
?>
<h4 align="center"><b>¿Desea eliminar el usuario seleccionado?</b></h4>
<p align="center"><a href="contenidoIndexAdmin.php?menuOption=usuarios-bloqueoUsuario&contenido=eliminarUsuario&controller=AdministradorAdminUsuarios&idUsuario=<?php echo $idUsuario;?>" >Aceptar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""  onclick="parent.jQuery.fancybox.close();">Cancelar</a></p>