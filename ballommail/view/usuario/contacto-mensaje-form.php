<script type="text/javascript">

var numero = 0; //Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado
   return (!evt) ? event : evt;
}

//Aqui se hace lamagia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function () {
if (numero < 2){
//Creamos un nuevo div para que contenga el nuevo campo
   nDiv = document.createElement('div');
//con esto se establece la clase de la div
   nDiv.className = 'archivo';
//este es el id de la div, aqui la utilidad de la variable numero
//nos permite darle un id unico
   nDiv.id = 'file' + (++numero);
//creamos el input para el formulario:
   nCampo = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampo.name = 'archivos[]';
//Establecemos el tipo de campo
   nCampo.type = 'file';
//Ahora creamos un link para poder eliminar un campo que ya no deseemos
   a = document.createElement('a');
//El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
   a.name = nDiv.id;
//Este link no debe ir a ningun lado
   a.href = '#';
//Establecemos que dispare esta funcion en click
   a.onclick = elimCamp;
//Con esto ponemos el texto del link
   a.innerHTML = 'Eliminar';
//Bien es el momento de integrar lo que hemos creado al documento,
//primero usamos la función appendChild para adicionar el campo file nuevo
   nDiv.appendChild(nCampo);
//Adicionamos el Link
   nDiv.appendChild(a);
//Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
//con esta función obtenemos una referencia a ella para usar de nuevo appendChild
//y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
   container = document.getElementById('adjuntos');
   container.appendChild(nDiv);
   }
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function (evt){
   evt = evento(evt);
   nCampo = rObj(evt);
   div = document.getElementById(nCampo.name);
   div.parentNode.removeChild(div);
   numero = numero - 1;
}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) {
   return evt.srcElement ?  evt.srcElement : evt.target;
}



</script>

<style type="text/css" >
.file_input_textbox
{
	float: left;
        background-color: transparent;
        width: 100px;
        border: none;
        float:left;
        font-size:small;
}

.file_input_div
{
	position: relative;
	width: 80px;
	height: 20px;
	overflow: hidden;
        float:left;
}

.file_input_button
{
	width: 60px;
	position: absolute;
	top: 0px;
	color:blueviolet;
        background-color: transparent;
	border-style: none;
        float:left;
        font-size:small;
}

.file_input_hidden
{
	font-size: 45px;
	position: absolute;
	right: 0px;
	top: 0px;
	opacity: 0;
        width: 60px;
        float:left;

	filter: alpha(opacity=0);
	-ms-filter: "alpha(opacity=0)";
	-khtml-opacity: 0;
	-moz-opacity: 0;
}
</style>

<div id="papiro">
	 <form class="form" method="post" name="mensajeForm" action="contenidoIndex.php?menuOption=enviarMensajeContacto" enctype="multipart/form-data" >
          <table width="670" height="358" border="0" cellpadding="0" cellspacing="0">

            <tr>
			 <td width="132" rowspan="3" valign="top" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
                <p><?php include_once 'contacto-menu.php';?></p>
                <p>&nbsp;</p></td>
              <td height="30" background="imagenes/papiro/papiro_02enviar.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="91" rowspan="3" valign="top" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','imagenes/cerrar2.png',1)"><img src="imagenes/cerrar.png" alt="" name="cerrar" width="9" height="9" border="0" class="cerrar_msj" id="cerrar" /></a></td>
            </tr>
            <tr>
              <td height="266" valign="top" style="background-image:url(imagenes/papiro/papiro_03enviar.jpg); background-position:center"><table width="100%" border="0" cellpadding="0" cellspacing="2">
                <tr>
                  <td colspan="2"><h1>
				   <?php
                  		$labelAnswer= ballom_echo("writeTitle");
                  ?>
                    <input name="asunto" style="width:98%;background-color:transparent; overflow-x:hidden; overflow-y:auto; border: solid thin #999999;" value="<?php echo $labelAnswer; ?>" onfocus="if(this.value == '<?php echo $labelAnswer; ?>') this.value=''" onblur="if(this.value == '') this.value='<?php echo $labelAnswer; ?>'"/></input>
                  </h1></td>
                  <td width="64%" align="right" class="fecha"><?php echo $estado.", ".$pais." ".date('M/d/Y');?></td>
                  <td width="1%" colspan="2" align="right">&nbsp;</td>
                </tr>
                </table>
                <div id="papiro_central_enviar">
                <table width="100%" border="0" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="200%" height="190" colspan="4" valign="top"><textarea label name="mensaje" style="width:98%; height:90%; background-color:transparent; overflow-x:hidden; overflow-y:auto; border: solid thin #999999;"  onfocus="this.value=''"/><?php  echo ballom_echo("typeTheMessagesIntoBallon");?></textarea></td>
                  </tr>
                  </table>
              </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="30%" rowspan="2" valign="middle" class="anotacion"><p>
                      <input type="checkbox" class="anotacion" name="checkboxPublicarBitacora" id="checkboxPublicarBitacora" value="1" />
                      <?php  echo ballom_echo("notToPublishInBitacora");?><br />
                      <input type="checkbox" name="aceptaRespuestasDefecto"   <?php if ($aceptaRespuestasDefecto) { echo "checked"; } ?>/>
                      <?php  echo ballom_echo("acceptResponses");  ?></p>
					</td>

                     <td width="31%" rowspan="2" align="center">
					<?php
                    				$buttonName= ballom_echo("ballondrop");
                    		?>
					 <input id="enviar_globo" name="enviar" type="submit" class="button"
                    value="<?php echo $buttonName; ?>" onclick="ObtenerTipoGlobo()" />
					<?php
						echo "<td width='20%' align='center' rowspan='2'>";
                  		echo $msjDirigido;
                  		echo "</td>";
					?>
                    </td>
                    <td width="31%" align="center" >
                    <?php if ($tipoMsj==4)  {?>

                    <select name="selectCorriente" class="bajo_soltar" id="select3" style="border:none; width:80px; background-color:transparent">
                    <?php
                    	foreach ($corrientes as $key=>$value)
	 					{ if ($value["checked"]){
							echo '<option value='.$key.'>'.$value["traduccion"].'</option>';
	 					  }
					    }
					?>
                    </select>

                    <?php } ?>
                    </td>


                  </tr>
                   <tr>
                      <td align="center" valign="middle" colspan="2"><div id="adjuntos"></div><label><?php if (($tipoMsj!=1) && ($tipoMsj!=3) ){?><a href="#" onClick="addCampo()">Adjuntar archivo</a><?php }?></label>
                      </td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td width="504" height="47" background="imagenes/papiro/papiro_05enviar.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>

          <?php
//Verifico si va a responder o es un globo nuevo, si es una respuesta añado el mensaje al que va a responder
	echo "<input name='idTipoMensaje' type='hidden' value=5>";
?>
 <!-- Campo que se utiliza para guardar el id del tipo de globo que selecciono el usuario -->
    <input type="hidden" value="" id="inputtipoGlobo" name="inputtipoGlobo" />
    <input type="hidden" value="<?php echo $_GET['idContacto'];?>" id="idContacto" name="idContacto" />
                      <!--------------------------------------------------------------->
          </form>

        </div>