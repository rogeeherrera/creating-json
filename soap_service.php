<?php

require_once('Students.php');

$option = array("uri" => "http://localhost");
$server = new SoapServer(null, $option);
$server->setClass('Students');
$server->handle();

?>