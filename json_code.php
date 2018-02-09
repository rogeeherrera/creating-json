<?php
//header('Content-Type: application/json');
require_once('StudentDB.php');

$json_data = json_decode('{"first_name" : "Dale"}');
var_dump($json_data);

class Address{

	public $street = "";
	public $city = "";
	public $state = "";

	function __construct($street,$city,$state){
		$this->street = $street;
		$this->city = $city;
		$this->state = $state;
	}
}

class Student{
	public $first_name = "";
	public $last_name = "";
	public $age = 0;
	public $enrolled = false;
	public $married = null;
	public $address;
	public $phone;

	function __construct($first_name, $last_name, $age, $enrolled,
		$married, $street, $city, $state, $ph_home, $ph_mobile){

		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->age = $age;
		$this->enrolled = $enrolled;
		$this->married = $married;
		$this->address = new Address($street, $city, $state);
		$this->phone = array("home"=>$ph_home,
							 "mobile"=>$ph_mobile);
	}
}

//using Student class
$rogee_herrera = new Student("John Rogee", "Herrera", 26, true, null, "186 Don Fabian Extension", "Quezon City", "PH", "none", "09273763060");

echo "<br /> <br />";

$rogee_data = json_encode($rogee_herrera);
echo $rogee_data . "<br /><br />";

require_once("mysql_connect.php");

if(mysqli_connect_errno()){

	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$query = "SELECT * FROM students WHERE student_id IN (1,2)";

$student_array = array();

if($result = $dbc->query($query)){

	echo "COLLECTED DATA FROM MYSQL <br /><br />";
	while ($obj = $result->fetch_object()) {
		printf("First Name: %s <br />
				Last Name: %s <br />
				Email: %s <br />
				Address: %s <br />
				City: %s <br />
				State: %s <br />
				Zip Code: %s <br />
				Phone Number: %s <br />
				Birth Date: %s <br />
				Gender: %s <br />
				Date Enrolled: %s <br />
				Allowance: %s <br />
				Student No: %s <br /><br />",

		$obj->first_name, $obj->last_name,
		$obj->email,$obj->street,$obj->city,$obj->state,
		$obj->zip,$obj->phone,$obj->birth_date,$obj->sex,
		$obj->date_entered,$obj->lunch_cost,$obj->student_id);

		$temp_student = new StudentDB($obj->first_name, $obj->last_name,
		$obj->email,$obj->street,$obj->city,$obj->state,
		$obj->zip,$obj->phone,$obj->birth_date,$obj->sex,
		$obj->date_entered,$obj->lunch_cost,$obj->student_id);
		$student_array[] = $temp_student;
	}

	echo "<br /><br />JSON ENCODED DATA<br /><br />";
	echo '{"students":[';
	$rogee_data = json_encode($student_array[0]);
	echo $rogee_data;
	echo ',<br />';
	$rogee_data = json_encode($student_array[1]);
	echo $rogee_data . "<br />";
	echo ']}';

	$result->close();
	$dbc->close();
}
?>