<?php 
session_start();

$pathUrl = 'http://'.$_SERVER['HTTP_HOST'];
$fileName = array_filter(explode('/',$_SERVER['SCRIPT_NAME']));

$varPathLocal = $pathUrl.'/'.$fileName[1].'/'/*.$fileName[2].'/'*/;

?>