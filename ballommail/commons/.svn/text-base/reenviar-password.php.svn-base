<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/vanadium.js"></script>
<?php
session_start();
include("registro-funciones.php");

if($action=="edit"){
	$idusuario= getIdUsuario($bd_base, $_SESSION["usuario"]);}
else{
	$idusuario='';
}
$result=getRegistro($bd_base,$idusuario);
$row=mysql_fetch_array($result);
?>
    <div id="midcontent">
      <h1 class="posthead">¿Olvidaste tu contraseña?</h1>
	  <p>Por favor, escribe tu <strong>correo electrónico</strong>:</p>
	 <form class="foorm" method="post" name="formRegistro" action="includes/reenviarpasswordABM.php" enctype="multipart/form-data">
        
        <p>
          <label>Email (*) </label>
          <input name="email" type="text" class=":email" value="<?php echo $row["email"]; ?>" size="50" maxlength="50"/>
       <p>
<img src="includes/captcha.php" name="captcha" id="captcha" /><br/>
<label>Ingrese el texto de la imagen:(*)</label>
<input type="text" name="captcha" class=":required"  id="captcha-form" /><a href="#" onclick="document.getElementById('captcha').src='includes/captcha.php?'+Math.random();" id="change-image">&nbsp;Recargar imagen</a>
</p>
</p>
        <p><br />
            <input name="enviar" type="submit" class="button" value="Enviar" />
     		<input name="id" type="hidden" value="<?php echo $idusuario?>"> 
			<input name="action" type="hidden" value="<?php echo $action?>"> 
			<input name="perfil" type="hidden" value="<?php echo $_REQUEST['perfil']?>"> 
        </p>	
	 </form>
    </div>

