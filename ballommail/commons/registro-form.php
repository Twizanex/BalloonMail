
    <div id="midcontent">

      <h1 class="posthead">Registrarme</h1>

	  <p>Al registrarte en <span style="font-weight: bold">Proyecto Freelance </span>ten&eacute;s la oportunidad de formar parte de nuestro equipo de trabajo. Ingresando en el sistema con tu usuario y password pod&eacute;s indicarnos tu <span style="font-weight: bold">Perfil T&eacute;cnico</span>. Record&aacute; que es muy importante contar con esta informaci&oacute;n, necesitamos saber de tus conocimientos para que puedas participar en los proyectos. </p>

	 <form class="foorm" method="post" name="formRegistro" action="includes/registroABM.php" enctype="multipart/form-data" >



        <p>

          <label>Nombre y Apellido (*) </label>

          <input name="nombreApellido"  type="text" class=":required" value="<?php echo $row["nombreApellido"]; ?>" size="50" maxlength="50"/>

          <label>Email (*) </label>

          <input name="email" type="text" class=":email" value="<?php echo $row["email"]; ?>" size="50" maxlength="50"/>

          <label>Nombre de Usuario (*) </label>

          <input name="usuario" type="text"  class=":required" value="<?php echo $row["nombreUsuario"]; ?>" size="20" maxlength="20"/>		  <label>Password (*) </label>

		  <input name="password" type="password" class=":required" value="<?php echo $row["clave"]; ?>" size="20" maxlength="20"/>

		  <label>Tel&eacute;fono (*)</label>

          <input name="telefono" type="text"  class=":required" value="<?php echo $row["telefono"]; ?>" size="15" maxlength="15"/>


</p>

        <p><br />

            <input name="enviar" type="submit" class="button" value="Enviar" />

     		<input name="id" type="hidden" value="<?php echo $idusuario?>">

			<input name="action" type="hidden" value="<?php echo $action?>">

			<input name="perfil" type="hidden" value="<?php echo $_REQUEST['perfil']?>">

        </p>

	 </form>

    </div>


