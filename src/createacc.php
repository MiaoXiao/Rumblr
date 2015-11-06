<?php

// define acc creation variables and set to empty values
$acc_lname = $acc_fname = $acc_gender = $acc_birthday = $acc_username = $acc_login = $acc_password = $acc_vpassword = "";
//error messages
$err_username = $err_login = $err_password = $err_vpassword = "";
//main error message
$err_main = "";

if(isset($_POST['createacc'])) {
	//set to false if there is an error in input
	$formsuccess = true;
	
	/*
	//check username input
	$temp_username = $_POST["username_enter"];
	$checkusername = "SELECT username FROM profile WHERE username = '$temp_username'";
	
	check_sql($checkusername, $conn);*/
	
	/*
	if($checkusername) $numrows = mysql_num_rows($checkusername);
	else die("error with finding username: " . mysql_error());*/
	
	if (empty($_POST["username_enter"])) {
		//echo "login1";
		$err_main += "A username is required! <br>";
		$formsuccess = false;
	} else {
		$acc_username = test_input($_POST["username_enter"]);
	}
	
	//check login input
	$temp_login = $_POST["login_enter"];
	//$checklogin = mysql_query("SELECT * FROM login WHERE login = '$temp_un'");
	if (empty($temp_login)) {
		//echo "login2";
		$err_main += "A login is required! <br>";
		$formsuccess = false;
	} else {
		$acc_login = test_input($_POST["login_enter"]);
	}

	//check password input
	if (empty($_POST["password_enter"])) {
		//echo "login3";
		$err_main += "A password is required! <br>";
		$formsuccess = false;
	} else {
		$acc_password = test_input($_POST["password_enter"]);
	}

	//check if passwords match
	if (($_POST["password_enter"]) != ($_POST["passwordverify_enter"])) {
		//echo "login4";
		$err_main += "Passwords do not match! <br>";
		$formsuccess = false;
	} else {
		$acc_vpassword = test_input($_POST["passwordverify_enter"]);
	}
	
	//check fname and lname
	if ((empty($_POST["fname_enter"])) || (empty($_POST["lname_enter"]))) {
		//echo "login5";
		$err_main += "A full name is required! <br>";
		$formsuccess = false;
	} else {
		$acc_fname = test_input($_POST["fname_enter"]);
		$acc_lname = test_input($_POST["lname_enter"]);
	}
	
	//check gender
	if (empty($_POST["sex"])){
		//echo "login6";
		$err_main += "Gender is required! <br>";
		$formsuccess = false;
	} else {
		$acc_gender = test_input($_POST["sex"]);
	}
	
	//check birthday
	if (empty($_POST["birthday_enter"])){
		//echo "login7";
		$err_main += "Birthdate is required! <br>";
		$formsuccess = false;
	} else {
		$acc_birthday = test_input($_POST["birthday_enter"]);
	}
	
	//create new login and profile if form success
	if ($formsuccess)
	{
		$err_main = "Account created!";
		
		//sql login
		$sql_newacc = "INSERT INTO login (login, password)
		VALUES ('$acc_login', '$acc_password')";
		
		check_sql($sql_newacc, $conn);
		
		//sql profile
		$sql_newprofile = "INSERT INTO profile (lname, fname, gender, birthday, username)
		VALUES ('$acc_lname', '$acc_fname', '$acc_gender', '$acc_birthday', '$acc_username')";
		
		check_sql($sql_newprofile, $conn);
		
		header("Location:index.php");
	}
}

?>
