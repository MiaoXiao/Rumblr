<?php

// define acc creation variables and set to empty values
$acc_username = $acc_login = $acc_password = $acc_vpassword = "";
if(isset($_POST['createacc']))
{
	$acc_username = test_input($_POST["username_enter"]);
	$acc_login = test_input($_POST["login_enter"]);
	$acc_password = test_input($_POST["password_enter"]);
	$acc_vpassword = test_input($_POST["passwordverify_enter"]);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	//sql statement
	$sql_newacc = "INSERT INTO login (login, password)
	VALUES ('$acc_login', '$acc_password')";

	//check sql statement
	if ($conn->query($sql_newacc) === TRUE) {
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $last_id;
	} else {
		echo "Error: " . $sql_newacc . "<br>" . $conn->error;
	}
	$conn->close();

	 header("Location:index.php");
}



?>
