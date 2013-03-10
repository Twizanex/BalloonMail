<?php
include ('../../commons/Session.php');
$session=Session::getInstance();
$session->destroy();

/*Volver a empezar*/
header('Location: index.php');
?>