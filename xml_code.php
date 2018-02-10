<?php
//header('Content-Type: text/xml');
require_once('StudentDB.php');

//using simple array
/*$rogee_herrera = array("John Rogee", "Herrera", "186 Don Fabian Extension", "Quezon City", "Philippines");

$xml = new SimpleXMLElement("<student />");

foreach($rogee_herrera as $info){
	$xml->addChild("data", $info);
}

$dom = dom_import_simplexml($xml)->ownerDocument;
$dom->formatOutput = true;
echo $dom->saveXML(); */

//using database
require_once('mysql_connect.php');

if(mysqli_connect_errno()){
	printf("Connect Failed: %s", mysqli_connect_errno());
	exit();
}

$query = "SELECT * FROM students WHERE student_id = 1";
$student_array = array();

if($result = $dbc->query($query)){
	while($obj = $result->fetch_object()){
		
				$temp_student = new StudentDB($obj->first_name, $obj->last_name,
				$obj->email,$obj->street,$obj->city,$obj->state,
				$obj->zip,$obj->phone,$obj->birth_date,$obj->sex,
				$obj->date_entered,$obj->lunch_cost,$obj->student_id);

				$student_array[] = $temp_student;
	}

	echo '<?xml version="1.0" encoding="UTF-8" ?>';
	echo '<students>';

	foreach ($student_array[0] as $key => $value) {
		echo '<'. $key. '>'. $value . '</' . $key . '>';
	}
	echo '</students>';
}
?>