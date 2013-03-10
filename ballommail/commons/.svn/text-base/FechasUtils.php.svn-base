<?php


class FechasUtils {

/**
* Formatea a un string con formato d/m/Y con el formato de salida (d/m/Y)
 * @param unknown_type $cad
 */
public static function fentrada($cad){
	$uno=substr($cad, 0, 2);
	$dos=substr($cad, 3, 2);
	$tres=substr($cad, 6, 4);
	$cad2 = ($tres."/".$dos."/".$uno);
	return $cad2;
}

/**
 * Formatea a un string con formato Y/m/a con el formato de salida (d/m/Y)
 * @param unknown_type $cad
*/
public static function fsalida($cad2){
	if ($cad2){
		$tres=substr($cad2, 0, 4);
		$dos=substr($cad2, 5, 2);
		$uno=substr($cad2, 8, 2);
		$cad = ($uno."/".$dos."/".$tres);
	}
	return $cad;
}

}