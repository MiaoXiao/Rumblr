<?php

// define acc creation variables and set to empty values
$acc_username = $acc_login = $acc_password = $acc_vpassword = "";
//error messages
$err_username = $err_login = $err_password = $err_vpassword = "";


if(isset($_POST['createacc'])) {
	
	//set to false if there is an error in input
	$formsuccess = true;
	
	//check username input
	if (empty($_POST["username_enter"])) {
		$err_username = "A username is required!";
		$formsuccess = false;
	} else {
		$acc_username = test_input($_POST["username_enter"]);
	}

	//check login input
	if (empty($_POST["login_enter"])) {
		$err_login = "A login is required!";
		$formsuccess = false;
	} else {
		$acc_login = test_input($_POST["login_enter"]);
	}

	//check password input
	if (empty($_POST["password_enter"])) {
		$err_password = "A password is required!";
		$formsuccess = false;
	} else {
		$acc_password = test_input($_POST["password_enter"]);
	}

	//check if passwords match
	if (($_POST["password_enter"]) != ($_POST["passwordverify_enter"])) {
		$err_vpassword = "Passwords do not match!";
		$formsuccess = false;
	} else {
		$acc_vpassword = test_input($_POST["passwordverify_enter"]);
	}
	
	 
	if ($formsuccess)
	{
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		//sql statement
		$sql_newacc = "INSERT INTO login (login, password)
		VALUES ('$acc_login', '$acc_password')";
		
		header("Location:index.php");
		
		//check sql statement
		if ($conn->query($sql_newacc) === TRUE) {
			$last_id = $conn->insert_id;
			echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
			echo "Error: " . $sql_newacc . "<br>" . $conn->error;
		}
		
		$conn->close();
	}
}

?>
