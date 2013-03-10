<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>


	<!-- standalone page styling (can be removed) -->
<script src="../admin/js/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<link href="../admin/js/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../admin/js/jquery.filestyle.js" type="text/javascript" ></script>


<style type="text/css">
div.fileinputs {
	position: relative;
}

div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
}

input.file {
	position: relative;
	text-align: right;
	background-image: url("./imagenes/Add 1.png");
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}
</style>


<script type="text/javascript">



function verifica()
{	
if ($("#divsubmit").css("display")=='none')
	$("#divsubmit").css("display","block");
else
	$("#divsubmit").css("display","none");
}


function OnSubmitForm()
{
  if(document.pressed == '+')
  {
	  document.formPerfil.action ="contenidoIndex.php?menuOption=SubirFotoPerfil&controller=Header";
  }
  else
  if(document.pressed == '-')
  {
	  document.formPerfil.action ="contenidoIndex.php?menuOption=eliminarPerfil&controller=Header";
  }
  return true;
}

function appearDiv()
{
$("#divInput").css("visibility","visible");
}

function clickSubmitAdd()
{
$("#submitClickAdd").click();
}

function clickSubmitDelete()
{
$("#submitClickDelete").click();
}

function clickArchivosOpen()
{
	$("#archivos").click();
	}


</script>




    <div id="nube_login">
      <table width="280" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td colspan="3" align="left"><h1><?php
			echo $nombresHill;
		?>'s Hill</h1></td>
        </tr>
        <tr>
          <td width="70%" align="right" valign="top"><a href="../../logout.php"><?php  echo ballom_echo("closeSession");?>
</a></td>
          <td width="118" colspan="2" align="center">
			<?php if ($idContacto) {?>
				<img src="<?php echo $foto;?>" width="60" height="61" />

			 <?php } 
			 else {
			 ?>
				 <a href="#" onClick="verifica();">
			    <img src="<?php echo $foto;?>" width="60" height="61" />
			    </a>			    
<form class="FotoPerfilform" method="post" name="formPerfil"  enctype="multipart/form-data" 
id="formPerfil" onsubmit="OnSubmitForm();">
<div id="divsubmit"  style="display:none;width:100px;" >
<a href="#" onclick="appearDiv();" ><img src="./imagenes/Add 1.png" style="border:none;"  /></a>

<a href="#" onclick="clickSubmitDelete();"><img src="./imagenes/Delete.png" style="border:none;" /></a>
<input name="operation" type="submit" value="-" id="submitClickDelete" onclick="document.pressed=this.value" src="./imagenes/Delete.png" style="visibility:hidden;" />

<div style="visibility:hidden;width:100px;" id="divInput">



	<input name="archivos" type="file" id="archivos" size="28" style="border:none;width:50px;" value=""   />





<a href="#" onclick="clickSubmitAdd();"><img src="./imagenes/Up.png" style="border:none;" /></a>
<input name="operation" type="submit" value="+" id="submitClickAdd" onclick="document.pressed=this.value" src="./imagenes/Up.png" style="visibility:hidden;" />
</div>
</div>   
</form>

			    <?php }?>


          </td>
        </tr>
      </table>
    </div>