        <div id="papiro">
          <table width="670" height="358" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="132" rowspan="3" valign="top" background="imagenes/papiro/papiro_01.png" style="background-position:right; background-repeat:no-repeat"><p>&nbsp;</p>
                <p><?php include_once 'contacto-menu.php';?></p>
                <p>&nbsp;</p></td>
              <td height="30" background="imagenes/papiro/papiro_02.png" style="background-position:bottom; background-repeat:no-repeat">&nbsp;</td>
              <td width="40" rowspan="3" background="imagenes/papiro/papiro_03.png" style="background-position:left; background-repeat:no-repeat">&nbsp;</td>
            </tr>
            <tr>
              <td height="270" valign="top" style="background-image:url(imagenes/papiro/papiro_03big.jpg); background-position:center"><div id="papiro_central">
                <div id="ficha"><span class="ficha_titulo"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><h1>Usuario:</h1></td>
    <td><p><?php echo $nombres;?></p></td>
  </tr>
  <tr>
    <td align="right"><h1>Nombre:</h1></td>
    <td><p><?php echo $apellidos;?> </p></td>
  </tr>
  <tr>
    <td align="right"><h1><?php echo ballom_echo("dateOfBirth"); ?> </h1></td>
    <td><p><?php echo $fechaNacimiento;?></p></td>
  </tr>
  <tr>
    <td align="right"><h1><?php echo ballom_echo("place"); ?>  </h1></td>
    <td><p><?php echo $lugarResidencia;?></p></td>
  </tr>
  <tr>
    <td align="right"><h1><?php echo ballom_echo("interestAirstream"); ?> </h1></td>
    <td><div id="ficha2">
      <p> <?php
	foreach ($corrientes as $key=>$value) {
	 	if ($value["checked"]) {
			echo $value["traduccion"].",";
	 	}

	}

		?> </p>
    </div></td>
  </tr>
</table>
                </span></div>
              </div></td>
            </tr>
            <tr>
              <td width="480" height="47" background="imagenes/papiro/papiro_05.png" style="background-position:top; background-repeat:no-repeat">&nbsp;</td>
            </tr>
          </table>
        </div>