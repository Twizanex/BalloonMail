<?php

/**
 *
 * Método mágico invocado en forma automática.
 * TODO mejorar idem Problema UserFrontController para ubicar las vistas
 *
 * @param unknown_type $className
 */
function __autoload($className) {
	$possibilities = array(
	    '../../commons/'.$className.'.php',
        '../../controller/'.$className.'.php',
        '../../model/'.$className.'.php',
        '../../view/'.$className.'.php',
        '../../controller/usuario'.$className.'.php',
        '../../model/usuario'.$className.'.php',
        '../../view/usuario'.$className.'.php',
        '../../'.$className.'.php'
    );
    foreach ($possibilities as $file) {
        if (file_exists($file)) {
            require_once($file);
            return true;
        }
    }
    return false;
}


?>
