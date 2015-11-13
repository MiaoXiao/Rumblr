<?php
require_once('connect.php');

//get curr user id
session_start();
$sessionid = $_SESSION['SESS_LOGIN_ID'];

//user id of who we are sending to
$sendto = $message = "";
$formsuccess = true;

//displays all of your messages
function displayMessages()
{
	//read all of your messages
	$query = "SELECT * from inbox";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//if this message is meant to be sent to this user...
		if ($row['To_User_ID'] == $sessionid)
		{
			echo returnUser($row['From_User_ID']);
			echo '<br>';
			echo $row['message'];
			echo '<br>';
		}
	}
}

//add friend into friends table
function addFriend($id)
{
	$sql_newfriend = "INSERT INTO friend (User_ID_1, User_ID_2)
	VALUES ('$sessionid', '$id')";
	check_sql($sql_newfriend, $conn);
	
	$sql_newfriend = "INSERT INTO friend (User_ID_1, User_ID_2)
	VALUES ('$id', '$sessionid')";
	check_sql($sql_newfriend, $conn);
}

//list all ids/usernames of friends
function findFriends()
{
	//read all of your messages
	$query = "SELECT * from friends";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//if this message is meant to be sent to this user...
		if ($row['User_Id_1'] == $sessionid)
		{
			echo $row['User_ID_2'];
			echo returnUser($row['User_ID_2']);
			echo '<br>';
		}
	}
}

//send message to friend
if(isset($_POST['send_message'])) {
	//check if friend is selected
	if (empty($_POST["tofield"])) 
	{
		$formsuccess = false;
	} 
	else 
	{
		$sendto = test_input($_POST["tofield"]);
	}
	
	//check if message exists
	if (empty($_POST["messagefield"])) 
	{
		$formsuccess = false;
	} 
	else 
	{
		$message = test_input($_POST["messagefield"]);
	}
	
	//if success, send message to friend
	if ($formsuccess)
	{
		//sql login
		$sql_newmessage = "INSERT INTO inbox (From_User_ID, To_User_ID, message)
		VALUES ('$sessionid', '$sendto', '$message')";
		check_sql($sql_newmessage, $conn);
	}
}
?>
