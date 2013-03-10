<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="../../js/vanadium.<?echo Session::getInstance()->__get('language');?>.js"></script>

<script type="text/javascript" src="MultipleSeleccion_archivos/jquery_002.js"></script>

<script type="text/javascript" src="MultipleSeleccion_archivos/jquery_003.js"></script>

<script type="text/javascript" src="MultipleSeleccion_archivos/jquery.js"></script>

<script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>

<script type="text/javascript">
/****************************FUNCIONES Y VARIABLES PARA LOS COMBOS**************************************/
//Declaración de componentes del formulario
$(document).ready(function(){
	cargar_combos();
	//cargar_estados();
	$("#idPais").change(function(){dependencia_estado();});
});





//Función que permite la carga de combos
	function cargar_combos()
	{
		$.get("../combo-paises.php", function(resultado){
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$('#idPais').append(resultado);
			}
		});
		$.get("../combo-estados.php", function(resultado){
			//alert("Resultado:"+ resultado);
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$('#idEstado').append(resultado);
			}
		});
	}

//Función que a partir del país seleccionado carga las ciudades o estados
//Función que a partir del país seleccionado carga las ciudades o estados
	function dependencia_estado()
	{
		var code = $("#idPais").val();
		$.get("../combo-estados.php", { code: code },
			function(resultado)
			{
				if(resultado == false)
				{
					alert("Error");
				}
				else
				{
					$("#idEstado").attr("disabled",false);
					document.getElementById("idEstado").options.length=1;
					$('#idEstado').append(resultado);
				}
			}

		);
	}



</script>
<style>
.vanadium-invalid
{
	color:red;
	font-weight:bold;
	display:block;
}
</style>

<?php	echo $message; ?>
<form  method="post" name="formRegistro"  id="formRegistro"  action="contenidoIndex.php?action=guardarForm&controller=Perfil&menuOption=perfil" enctype="multipart/form-data" >
<div id="papiro_perfil">
          <table width="640" height="358" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="99" rowspan="3" valign="top" background="imagenes/papiro/papirotrans_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
              <p>&nbsp;</p></td>
              <td width="508" height="34" background="imagenes/papiro/papirotrans_02.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
              <td width="33" rowspan="3" background="imagenes/papiro/papirotrans_03.png" style="background-position:left; background-repeat:no-repeat">&nbsp;</td>
            </tr>
            <tr>
              <td width="508" height="361" valign="top" style="background-image:url(imagenes/papiro/papirotrans_04.png); background-position:center; ba"><div id="papiro_central_perfil">
                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="3">
                  <tr>
                    <td width="25%" align="right"><?php  echo ballom_echo("user");?></td>
                    <td width="40%" align="center" class="txt_login"><input name="email" type="text" id="email" class=":required :email" size="28" style="border:none" value="<?php echo $usuario['email'];?>"/></td>
                    <td width="35%" align="left" valign="middle"><?php  echo ballom_echo("languagesRead");?></td>
                  </tr>
                  <tr>
                    <td align="right"><?php  echo ballom_echo("name");?></td>
                    <td align="center" class="txt_login"><input name="nombres" type="text" id="nombres" class=":required" size="28" style="border:none" value="<?php echo $usuario['nombres'];?>" /></td>
                    <td rowspan="3" align="left" valign="top"><div class="scroll_checkboxes" id="scrolabeCheck">
                      <label> </label>
                       <?php
						foreach ($idiomas as $key=>$value) {
					  ?>
                      <label>
                        <input type="checkbox" name="idiomas[]" value="<?php echo $key; ?>"
                        <?php if ($value["checked"]) echo "checked" ?> />
    						<?php echo $value["traduccion"]; ?>
    						</label>
                      <br />
                       <?php }?>
                      </div></td>
                  </tr>
                  <tr>
                    <td align="right"><?php  echo ballom_echo("surname");?></td>
                    <td align="center" class="txt_login"><input name="apellidos" type="text" id="apellidos" class=":required" size="28" style="border:none" value="<?php echo $usuario['apellidos'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><?php  echo ballom_echo("dateOfBirth");?></td>
                    <td align="center" class="txt_login"><table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
                      <tr>
                        <td align="left"><select name="diaNac" class="txt_formulario" id="diaNac">
                          <option selected="selected" style="border:none"><?php echo date('d', strtotime($usuario['fechaNacimiento']));?></option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                          <option>31</option>
                          </select></td>
                        <td><select name="mesNac" class="txt_formulario" id="mesNac">
                          <option selected="selected" style="border:none"><?php echo date('m', strtotime($usuario['fechaNacimiento']));?></option>
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                          <option>04</option>
                          <option>05</option>
                          <option>06</option>
                          <option>07</option>
                          <option>08</option>
                          <option>09</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          </select></td>
                        <td><select name="anhoNac" class="txt_formulario" id="anhoNac">
                          <option selected="selected" style="border:none"><?php echo date('Y', strtotime($usuario['fechaNacimiento']));?></option>
                          <option>1940</option>
                          <option>1941</option>
                          <option>1942</option>
                          <option>1943</option>
                          <option>1944</option>
                          <option>1945</option>
                          <option>1946</option>
                          <option>1947</option>
                          <option>1948</option>
                          <option>1949</option>
                          <option>1950</option>
                          <option>1951</option>
                          <option>1952</option>
                          <option>1953</option>
                          <option>1954</option>
                          <option>1955</option>
                          <option>1956</option>
                          <option>1957</option>
                          <option>1958</option>
                          <option>1959</option>
                          <option>1960</option>
                          <option>1961</option>
                          <option>1962</option>
                          <option>1963</option>
                          <option>1964</option>
                          <option>1965</option>
                          <option>1966</option>
                          <option>1967</option>
                          <option>1968</option>
                          <option>1969</option>
                          <option>1970</option>
                          <option>1971</option>
                          <option>1972</option>
                          <option>1973</option>
                          <option>1974</option>
                          <option>1975</option>
                          <option>1976</option>
                          <option>1977</option>
                          <option>1978</option>
                          <option>1979</option>
                          <option>1980</option>
                          <option>1981</option>
                          <option>1982</option>
                          <option>1983</option>
                          <option>1984</option>
                          <option>1985</option>
                          <option>1986</option>
                          <option>1987</option>
                          <option>1988</option>
                          <option>1989</option>
                          <option>1990</option>
                          <option>1991</option>
                          <option>1992</option>
                          <option>1993</option>
                          <option>1994</option>
                          <option>1995</option>
                          <option>1996</option>
                          <option>1997</option>
                          <option>1998</option>
                          <option>1999</option>
						  <option>2000</option>
                          <option>2001</option>
                          <option>2002</option>
                          <option>2003</option>
                          <option>2004</option>
                          <option>2005</option>
                          <option>2006</option>
                          <option>2007</option>
                          <option>2008</option>
                          <option>2009</option>
                          <option>2010</option>
                          <option>2011</option>
                          </select></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td rowspan="2" align="right" valign="top"><?php  echo ballom_echo("interestAirstream");?></td>
                    <td align="center">&nbsp;</td>
                    <td align="left" valign="middle"><?php  echo ballom_echo("defaultWrite");?></td>
                  </tr>

                  <tr>
                    <td rowspan="4" align="center" class="txt_login"><div class="scroll_checkboxes" id="scrolabeCheck2">
                      <label> </label>
                      <?php
						foreach ($corrientes as $key=>$value) {
					  ?>
                      <label>
                            <input type="checkbox" name="corrientes[]" value="<?php echo $key; ?>"
                            <?php if ($value["checked"]) echo "checked" ?> />
    						<?php echo $value["traduccion"]; ?>					</label>
                      <br />

                      <?php }?>

                    </div></td>
                    <td align="center" valign="top" class="txt_login">
                    <select name="idIdiomaEscrituraDefecto" style="border:none; width:100px;">
                    <?php


                    	foreach ($idiomas as $key=>$value) {
							if ($key == $usuario['idIdiomaEscrituraDefecto']) {
								$select=' selected="selected"';
							}
							echo '<option'.$select.' value="'.$key.'">'.$value["traduccion"].'</option>';
							$select='';
						}
					  ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td align="left" valign="middle"><?php  echo ballom_echo("password");?></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;
						<span class="txt_login">
							<input name="contrasenia" type="password" id="contrasenia" class=":required :min_length;6 :format;/\d.*?\d/;contrasenia_format" size="28" style="border:none" value="default00"/>
							<div id="contrasenia_format" style="display:none"><?php  echo ballom_echo("contrasenia_format");?></div>
						</span>
					</td>
                  </tr>

                  <tr>
                    <td align="right"><?php  echo ballom_echo("country");?></td>
                    <td align="left" class="txt_login">
                    <select name="idPais" id="idPais" size="1">
            			<!-- <option value="0">Selecciona Uno...</option> -->
          			</select></td>
                    <td align="left" valign="middle"><?php  echo ballom_echo("checkPassword");?></td>
                  </tr>
                  <tr>
                    <td align="right"><?php  echo ballom_echo("state");?></td>
                    <td align="left" class="txt_login">
                    <select name="idEstado" id="idEstado" size="1" >
           				<!--<option value="0">Selecciona Uno...</option> -->
            		</select>
                    </td>
                    <td align="center" valign="top" >
						<span class="txt_login">
						<input name="contrasenia2" type="password"
								class=":required :min_length;6 :same_as;contrasenia;contrasenia2_same_as"
								size="28" style="border:none" value="default00"/>
						<div id="contrasenia2_same_as" style="display:none"><?php  echo ballom_echo("contrasenia2_same_as");?></div>
						</span>
					</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top">&nbsp;</td>
                    <td colspan="2" rowspan="2" align="right"><table width="100%" border="0" cellpadding="0" cellspacing="3">
                      <tr>
                        <td align="left"><a href="contenidoIndex.php?menuOption=sugerirCorriente"><?php  echo ballom_echo("currentSugest");?>
</a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="62%" align="right"><?php  echo ballom_echo("acceptResponsesDefault");?></td>
                        <td width="9%"><label>
                          <input type="checkbox" name="aceptaRespuestasDefecto"    <?php if ($usuario['aceptaRespuestasDefecto']) { echo "checked"; } ?>/>
                          </label></td>
                        <td width="29%">&nbsp;</td>
                        </tr>
                      <tr>
                        <!-- <td align="right"><?php  echo ballom_echo("receiveMessages");?></td>
                        <td><label>
                          <input type="checkbox" name="recibeMensajesCorrientes"  <?php if ($usuario['recibeMensajesCorrientes']) { echo "checked"; } ?>/>
                          </label></td>
                        <td>&nbsp;</td>-->
                        </tr>
                      <tr>
                        <td align="right"><?php  echo ballom_echo("receiveGeneralMessages");?>

                          <label> </label></td>
                        <td><label>
                          <input type="checkbox" name="recibeMensajesGenerales"  <?php if ($usuario['recibeMensajesGenerales']) { echo "checked"; }?>/>
                          </label></td>
                        <td><input name="button" type="submit" class="txt_login" id="button" value="Guardar" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top"><a href="#"></a></td>
                    </tr>
                </table>
              </div></td>
            </tr>
            <tr>
              <td width="508" height="47" background="imagenes/papiro/papirotrans_05.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>
        </div>

        </form>