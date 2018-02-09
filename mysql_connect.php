<?php

DEFINE ('DB_HOST','localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '120633');
DEFINE ('DB_NAME', 'rogee-ws');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
		OR die('could not connect to MySQL' . mysqli_connect_error());

/*$sql = "INSERT INTO students (first_name, last_name, email, street, city, state, zip, phone, birth_date, sex, date_entered, lunch_cost)
VALUES ('John Rogee', 'Herrera', 'rogeeherrera@gmail.com', '186 Don Fabian Extension', 'Quezon City', 'PH', 1121, '09273763060', '1992-01-31', 'M', '2018-02-10', 300)";

if ($dbc->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
}*/
?>