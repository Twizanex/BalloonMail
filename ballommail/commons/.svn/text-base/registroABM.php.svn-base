<?php
session_start();
$bd_host = "localhost";
$bd_usuario = "mburiano_telete";
$bd_password = "telete1811";
$bd_base = "mburiano_telete";

mysql_connect($bd_host,$bd_usuario,$bd_password);
mysql_query("SET NAMES utf8");
/**********************************************************************************/

$perfil=$_REQUEST['perfil'];
$action=$_REQUEST['action'];
$nombreApellido=$_REQUEST['nombreApellido'];
$email=$_REQUEST['email'];
$usuario=$_REQUEST['usuario'];
$password=$_REQUEST['password'];
$telefono=$_REQUEST['telefono'];
$claveCodificada=md5($password);
$id=$_REQUEST['id'];

if ($action=='alta'){
	//validacion del email
		$query2 = mysql_db_query($bd_base,"select email from usuarios where email='$email'");
	if (mysql_num_rows($query2)>0) {
		mysql_free_result($query2);
		header("location: ../index.php?content=registro-form&perfil=profesional&action=alta&msg1=si&msg2=no");
	exit();
	}
	//validacion del nombre de usuairo
	$query1 = mysql_db_query($bd_base,"select nombreUsuario from usuarios where nombreUsuario='$usuario'");
	if (mysql_num_rows($query1)>0) {
		mysql_free_result($query1);
		header("location: ../index.php?content=registro-form&perfil=profesional&action=alta&msg1=no&msg2=si");
	exit();
	}
}else if($action=='edit' ){
	//validacion del email
	echo "select email from usuarios where email='$email' and id<>'$id'";
		$query2 = mysql_db_query($bd_base,"select email from usuarios where email='$email' and id<>'$id'");
	if (mysql_num_rows($query2)>0) {
		mysql_free_result($query2);
		header("location: ../intranet/profesional/index.php?content=registro-form&msg1=si&msg2=no");
	exit();
	}
	echo "select nombreUsuario from usuarios where nombreUsuario='$usuario' and id<>'$id'";
	//validacion del nombre de usuairo
	$query1 = mysql_db_query($bd_base,"select nombreUsuario from usuarios where nombreUsuario='$usuario' and id<>'$id'");
	if (mysql_num_rows($query1)>0) {
		mysql_free_result($query1);
		header("location: ../intranet/profesional/index.php?content=registro-form&msg1=no&msg2=si");

	exit();
	}
}

//si las validaciones estan ok seguir con el proceso de abm
if ($perfil=="profesional"){
	if($action=="alta"){//si es un alta
		if (!empty($_REQUEST['captcha'])) {
			if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
				header("location: ../index.php?content=registro-form&perfil=".$perfil."&action=".$action);
			} else {
				header("location: ../index.php?content=registro-confirm");
			}
		   unset($_SESSION['captcha']);
		}else{
			header("location: ../index.php?content=registro-form&perfil=".$perfil."&action=".$action);	}
	}else{//si estoy editando
		header("location: ../intranet/profesional/index.php?content=principal");	}
}else{//?¡??
	header("location: ../intranet/admin/index.php?content=usuarios");
	}

include("../comunes/funciones.php");
include("registro-funciones.php");


if ($action=='alta'){
	altaRegistro($bd_base, $nombreApellido, $email, $usuario,$password,$telefono,$email,$claveCodificada,$perfil);
}
else if ($action=='delete'){
	bajaRegistro($bd_base, $id);
}
else if ($action=='edit'){
	editarRegistro($bd_base,$nombreApellido, $email, $usuario,$password,$telefono,$email,$claveCodificada,$perfil,$id);
}else if ($action=='recordarpassword'){
	//recupero el usuario
	$result=getRegistro($bd_base,$id);
	$row=mysql_fetch_array($result);
	$clave=$row["clave"];
	//envio de mail recordando la password al usuario
	$username=$row['nombreUsuario'];
	$subject= "Proyecto Freelance - Recupero de Usuario y Clave";
	$email=$row['email'];
	$content= "Estimado/a ".$row['nombreApellido'].": \n Su usuario y clave para el ingreso a la web de Proyecto Freelance es: \n Usuario/Clave: $username/".$clave;
	$headers = "From: .ar\r\n";
	mail($email, $subject , $content, $headers);
	echo $content;
}

?>