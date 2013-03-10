<?php

function getRegistros($bd_base,$order){
	$result=mysql_db_query($bd_base,"select * from usuarios order by '$order' asc");
	return $result;
}

function getRegistro($bd_base,$id){
	$result=mysql_db_query($bd_base,"select * from usuarios where id='$id'");
	return $result;
}

function bajaRegistro($bd_base,$id){
	mysql_db_query($bd_base,"delete from usuarios where id=".$id);
}

function altaRegistro($bd_base, $nombreApellido, $email, $usuario,$password,$telefono,$email,$claveCodificada,$perfil){
	$squery="Insert into usuarios (nombreUsuario, clave, claveCodificada, perfil, nombreApellido, telefono, email,fechaAlta) values";
	$squery=$squery."('".$usuario."','".$password."', '".$claveCodificada."', '".$perfil."','".$nombreApellido."','".$telefono."','".$email."',now())";
	mysql_db_query($bd_base, $squery);
}


function editarRegistro($bd_base,$nombreApellido, $email, $usuario,$password,$telefono,$email,$claveCodificada,$perfil,$id){
	$squery="update usuarios set nombreUsuario='".$usuario."',clave='".$password."', claveCodificada='".$claveCodificada."', perfil='".$perfil."',";
	$squery= $squery."nombreApellido='".$nombreApellido."', telefono='".$telefono."', email='".$email."' where id=".$id;
	mysql_db_query($bd_base,$squery);
	
}

function getRegistroEmail($bd_base,$email){
	$result=mysql_db_query($bd_base,"select * from usuarios where email='$email'");
	return $result;
}

?>