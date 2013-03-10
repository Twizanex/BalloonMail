<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="js/vanadium.js"></script>

<script type="text/javascript" src="MultipleSeleccion_archivos/jquery_002.js"></script>

<script type="text/javascript" src="MultipleSeleccion_archivos/jquery_003.js"></script>

<script type="text/javascript" src="MultipleSeleccion_archivos/jquery.js"></script>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

<script type="text/javascript">
/****************************FUNCIONES Y VARIABLES PARA LOS COMBOS**************************************/
//Declaración de componentes del formulario
$(document).ready(function(){
	cargar_paises();
	$("#idPais").change(function(){dependencia_estado();});
});

//Función que permite la carga de paises
	function cargar_paises()
	{
		$.get("view/combo-paises.php", function(resultado){
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$('#idPais').append(resultado);
			}
		});
	}

//Función que a partir del país seleccionado carga las ciudades o estados
	function dependencia_estado()
	{
		var code = $("#idPais").val();
		$.get("view/combo-estados.php", { code: code },
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

<form  method="post" name="formRegistro" action="index.php?action=guardarForm&controller=User&idForm=2" enctype="multipart/form-data" >
<div id="col_lat_log2">
<?php	echo $message; ?>
        <table width="320" border="0" cellpadding="3" cellspacing="5">
          <tr>
            <td width="49%" align="right">Nombres</td>
            <td width="51%" align="center" class="txt_login"><input name="nombres" type="text" class=":required" size="22" style="border:none" /></td>
          </tr>
          <tr>
            <td align="right">Apellidos</td>
            <td align="center" class="txt_login"><input name="apellidos" type="text" class=":required" size="22" style="border:none" /></td>
          </tr>
          <tr>
            <td align="right">E-mail</td>
            <td align="center" class="txt_login"><input name="email" type="text" class=":email" size="22" style="border:none" /></td>
          </tr>
          <tr>
            <td align="right">Contrase&ntilde;a</td>
            <td align="center" class="txt_login"><input name="contrasenia" type="password" class=":required" size="22" style="border:none" /></td>
          </tr>
          <tr>
            <td align="right">Confirmar Contrase&ntilde;a</td>
            <td align="center" class="txt_login"><input name="contrasenia2" type="password" class=":required" size="22" style="border:none" /></td>
          </tr>
          <tr>
            <td align="right">Fecha de nacimiento</td>
            <td align="center" class="txt_login"><table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
              <tr>
                <td align="left"><select name="diaNac" id="diaNac">
                  <option selected="selected" style="border:none">1</option>
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
                <td><select name="mesNac" id="mesNac">
                  <option selected="selected" style="border:none">1</option>
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
                  </select></td>
                <td><select name="anhoNac" id="anhoNac">
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
            <td align="right">Sexo</td>
            <td align="center" class="txt_login"><select name="sexo" id="sexo" style="border:none; width:160px">
              <option>Hombre</option>
              <option>Mujer</option>
            </select></td>
          </tr>
          <tr>
            <td align="right">Corrientes</td>
            <td align="center">
            <div class="scroll_checkboxes" id="scrolabeCheck">

  <label> </label>

  <?php
	foreach ($corrientes as $key=>$value) {



	?>
	 <label>

    <input type="checkbox" name="corrientes[]" value="<?php echo $key; ?>" <?php if ($value["checked"]) echo "checked" ?> />
    <?php echo $value["traduccion"]; ?>
    </label>
    <br />

	<?php }?>
              </div>

              </td>
          </tr>
          <tr>
            <td align="right">Pa&iacute;s</td>
            <td align="center" class="txt_login">
			<select name="idPais" id="idPais">
            <option value="0">Selecciona Uno...</option>
          </select>
			</td>
          </tr>
          <tr>
            <td align="right">Provincia/Estado</td>
            <td align="center" class="txt_login">
			<select name="idEstado" id="idEstado">
           		<option value="0">Selecciona Uno...</option>
            </select>
			</td>
          </tr>
          <tr>
            <td valign="middle">&nbsp;</td>
            <td valign="middle"><input name="button" type="submit" class="txt_login" id="button" value="Registrarse" /></td>
          </tr>
          <tr>
            <td colspan="2" align="right" valign="middle"><input type="checkbox" name="checkbox2" id="checkbox2" checked="checked" />
            <a href="#">He leido y acepto las condiciones de uso</a></td>
          </tr>
        </table>
      </div>

</form>