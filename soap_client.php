<?php 

$option = array("location" =>
				"http://localhost/webservices/soap_service.php",
				"uri" => "http://localhost");

try{
	$client = new SoapClient(null, $option);
	$students = $client->getStudentNames();
	print_r($students);
}
catch(SoapFault $ex){
	var_dump($ex);
}


 ?>