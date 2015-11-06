<?php
// define variables and set to empty values
$password1 = $login1 =  "";

session_start();

//connect to the database
require_once('connect.php');

//WHY?!
function test_input1($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

//if logged in then do stuff
if(isset($_POST['verifiedLogin'])) 
{
	//check for login from html if not then return an error
	if (empty($_POST["login"])) 
	{
		echo "login1";
		$err_main += "A username is required! <br>";
		header("Location:index.php");
	} 
	else 
	{
		$login1 = test_input1($_POST["login"]);
		echo "I' passed login";
	}

	//check for password from html if not then return an error
	if (empty($_POST["password"])) 
	{
		echo "login2";
		$err_main += "A password is required! <br>";
		header("Location:index.php");
	} 
	else 
	{
		$password1 = test_input1($_POST["password"]);
	}

	$qry="SELECT * FROM login WHERE login='$login1' AND password='$password1'";
	$result = mysql_query($qry);

	if($result) 
	{
		if(mysql_num_rows($result) > 0) 
		{
			//Login Successful
			//session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_LOGIN_ID'] = $member['loginID'];
			$_SESSION['SESS_USERNAME'] = $member['login'];
			$_SESSION['SESS_PASSWORD'] = $member['password'];
			//session_write_close();
			echo '<script>check();</script>';
			header("location: index.php");

			exit();
		}
		else 
		{
			//Login failed
			echo "user name and info";
			//$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) 
			{
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: index.php");
				exit();
			}
		}
	}
	else 
	{
		die("Query failed");
	}
}

//returns true if passwords match
function checkpassword($pass, $passvalid) 
{
	return ($pass == $passvalid);
}
?>
