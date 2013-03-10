
<?php
if (!$page)		$page=1;?>

 <div id="midcontent">
<h1 class="posthead">Proyectos</h1>
<table>
	<tbody>
        <tr>

          <th>N&deg;</th>
          <th>Nombre</th>
          <th>Estado</th>
          <th width="120">Acciones</th>
        </tr>
        <?php
//Mostramos los registros

$linea= 1;
while ($row=mysql_fetch_array($proyectosPage))
{
if ($linea%2==0){$class="rowlight";}else{$class="rowdark";};
echo '<tr class='.$class.'><td>'.$row["id"].'</td>';
echo '<td>'.$row["nombre"].'</td>';
echo '<td>'.$row["nombreEstado"].'</td>';
echo '<td> <a href="index.php?content=proyectos-form&action=edit&id='.$row['id'].'"><img src="../images/editar.gif" title="Editar Proyecto"/></a> Editar
<a href="includes/proyectos-ABM.php?action=delete&id='.$row['id'].'"><img src="../images/action_delete.gif" title="Eliminar Proyecto"/></a> Eliminar</td>';



echo '</tr>';

$linea++;
}
mysql_free_result($proyectosPage)
?>
</tbody>
</table>
<?php
//echo paginar($page, $size, 10, "index.php?content=proyectos&page=", $maxpags=0);
?>
</div>