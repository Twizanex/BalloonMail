<!-- Pestañas Principales de arriba: Estadisticas,Usuarios y Corrientes -->
<ul id="top-navigation">
	<li><a href="contenidoIndexAdmin.php?menuOption=estadistica-conexionesUsuarios&contenido=getUsuariosConexiones&controller=AdministradorEstadisticas"
	class="<?php if ($_REQUEST['menuOption']=='estadisticas') echo "active"; elseif ($_REQUEST['menuOption']=='') echo "active";?>">
	Estad&iacute;sticas</a></li>
    <li><a href="contenidoIndexAdmin.php?menuOption=usuarios-listadoUsuarios&contenido=getListadoUsuarios&controller=AdministradorAdminUsuarios" class="<?php if ($_REQUEST['menuOption']=='usuarios') echo "active"; elseif ($_REQUEST['menuOption']=='') echo "active";?>">Usuarios</a></li>
    <li><a href="contenidoIndexAdmin.php?menuOption=corrientes-listadoCorrientes&contenido=getListadoCorrientes&controller=AdministradorAdminCorrientes" class="<?php if ($_REQUEST['menuOption']=='corrientes') echo "active"; elseif ($_REQUEST['menuOption']=='') echo "active";?>">Corrientes</a></li>
    <li><a href="logout.php" class="<?php if ($_REQUEST['menuOption']=='corrientes') echo "active"; elseif ($_REQUEST['menuOption']=='') echo "active";?>">Log Out</a></li>