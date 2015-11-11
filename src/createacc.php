<?php
// define acc creation variables and set to empty values
$acc_lname = $acc_fname = $acc_gender = $acc_birthday = $acc_nickname = $acc_username = $acc_login = $acc_password = $acc_vpassword = "";
//error messages
$err_username = $err_login = $err_password = $err_vpassword = "";
//main error message
$err_main = "";

//default photo
$defphoto = "http://s7d4.scene7.com/is/image/TrekBicycleProducts/default-no-image?wid=1490&hei=1080&fit=fit,1&fmt=png&qlt=80,1&op_usm=0,0,0,0&iccEmbed=0&bgc=240,240,240";

if(isset($_POST['createacc'])) {
	//set to false if there is an error in input
	$formsuccess = true;
	
	//if username already exists, do not create account
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if ($row['username'] == $_POST["username_enter"])
		{
			$formsuccess = false;
		}
	}
	
	//if login already exists, do not create account
	$query = "SELECT * from login";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if ($row['login'] == $_POST["login_enter"])
		{
			$formsuccess = false;
		}
	}

	if (empty($_POST["username_enter"])) {
		//echo "login1";
		$err_main += "A username is required! <br>";
		$formsuccess = false;
	} else {
		$acc_username = test_input($_POST["username_enter"]);
	}
	
	//check login input
	$temp_login = $_POST["login_enter"];
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
		
		//PASSWORD ENCRYPTION
		// A higher "cost" is more secure but consumes more processing power
		$cost = 10;
		// Create a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		// Prefix information about the hash so PHP knows how to verify it later.
		// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		// Hash the password with the salt
		$acc_password = crypt($acc_password, $salt);
		
		//sql login
		$sql_newacc = "INSERT INTO login (login, password)
		VALUES ('$acc_login', '$acc_password')";
		check_sql($sql_newacc, $conn);	
		
		//sql profile
		$sql_newprofile = "INSERT INTO profile (lname, fname, gender, birthday, photo, username)
		VALUES ('$acc_lname', '$acc_fname', '$acc_gender', '$acc_birthday', '$defphoto', '$acc_username')";
		check_sql($sql_newprofile, $conn);
		
		header("Location:index.php");
	}
}

?>
