
<html>
<body>
<?php

require_once('Students.php');

$student_data = new Students();

if(isset($_POST['submit'])){
	switch ($_POST['request']) {
		case 'Get First Name':
			$student_info = $student_data->getStudentFirstName();
			break;
		case 'Get Last Name':
			$student_info = $student_data->getStudentLastName();
			break;
		default:
			http_response_code(400);
			break;
	}

	echo json_encode($student_info);
}
?>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

	Request:
	<select name="request">
			<option>Get First Name</option>
			<option>Get Last Name</option>
	</select>
	<input type="submit" name="submit">
</form>
</body>
</html>