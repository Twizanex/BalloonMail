 <script  type="text/javascript">

 $(document).ready(function() {
    // Cuando carga el documento selecciona por defecto el tipo de globo 1 por defecto
	 $("#globo_1").css("background-image","url(../../imagenes/globo/selectBalloonMail.png)");
	 seleccion = 1;	 
	 $("#inputtipoGlobo").attr("value",seleccion);
	 
		}); 

 function DetectClickOnBalloonMail( val ){	 	 	

	//Pongo todos los globos sin seleccionar
	for (i=1; i<4; i++)
	 $("#globo_"+i).css("background-image","url(../../imagenes/globo/globoch.png)");
	 
	 //Pongo en seleccionado el que eligio el usuario
	 $("#globo_"+val).css("background-image","url(../../imagenes/globo/selectBalloonMail.png)");
	 seleccion=val;
	 $("#inputtipoGlobo").attr("value",seleccion);
	}

 
 </script>
 
 
 <style> 
a {text-decoration: none;} 
a:hover {text-decoration: underline;} 
 </style> 
 
 <div id="contenido_menu">
  <?php //print_r($globos);?>
   <div id="mensajes">
     <strong><?php echo ballom_echo("selectBalloon"); ?></strong>
     <div class="navi"></div>
	 <a class="prev browse left"></a>


<!-- root element for scrollable -->

<div class="scrollable" id="browsable">

   <!-- root element for the items -->
   <div class="items">

<?php
	 	 if (true)
	 {
$aux=$config->get('mensajesPorSlideInterval'); 
     for($i=0;$i<count($globos);$i++)
	 {
	  if ( $i % $config->get('mensajesPorSlideMax') == 0 )
	  	  {echo "<div>";}

	  echo "<a style='text-decoration:none;cursor:pointer' onClick='DetectClickOnBalloonMail(".$globos[$i]['idGlobo'].")'><div id='globo_".$globos[$i]['idGlobo']."' 
    style='margin: 0px 5px 0px 5px;
    height: 120px;
    width: 95px;
    font-family: Arial, Helvetica, sans-serif;
    text-decoration: none;
    display: block;
    line-height: 80%;
    text-align: center;
    background-image: url(../../imagenes/globo/globoch.png);
    padding-top: 8px;
    background-repeat: no-repeat;
    background-position: center;'	  >";
	echo "<img src='imagenes/globo/".$globos[$i]['imagen']."' width='75' height='75' class='perfil' />
	<br /><p style='color:#FFFFFF'>".$globos[$i]['nombre']."</p></div></a>";

	 if ( $aux == $i )
	 {echo "</div>";
		  $aux = $aux + $config->get('mensajesPorSlideMax');
		  }
	 }
	  echo "</div>";
	 }
	 ?>


    </div>
	 </div>

	<a class="next browse right"></a>
	<div class="naviPag">1 de <?php echo ceil(count($globos)/$config->get('mensajesPorSlideInterval')); ?></div>
 </div>



<script>
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
$(document).ready(function() {


$("#browsable").scrollable().navigator();
});
</script>



<!-- 
     <div><a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
<a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
	</div>

   <div><a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
<a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
	</div>

	<div><a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
     <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
    <a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
<a href="#"><div id="contenedorchico">
<img src="imagenes/globo/fotoperfil.png" width="75" height="75" class="perfil" /><h2>Maria Paula<br /></h2>
</div></a>
	</div>
     </div>
	 </div>

	<a class="next browse right"></a>
	<div class="naviPag">1 de 3</div>
  </div>
-->
