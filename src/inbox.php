
<?php
require_once('connect.php');

//get curr user id
$sessionid;

//user id of who we are sending to
$sendto = $message = "";
$formsuccess = true;

//displays all of your messages
function displayMessages()
{
	//session_start();
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	
	//read all of your messages
	$query = "SELECT * from inbox";
	$result = mysql_query($query);
	$messagecount = 0;
	while ($row = mysql_fetch_array($result))
	{
		//if this message is meant to be sent to this user...
		if ($row['To_User_ID'] == $sessionid)
		{
			$messagecount++;
			echo '<br>';
			echo returnUser($row['From_User_ID']);
			echo '<br>';
			echo date("M d, Y", strtotime($row['Time_Stamp']));
			echo '<br>';
			echo date("g:i A", strtotime($row['Time_Stamp']));
			echo '<br>';
			echo $row['message'];
			echo '<br>';
		}
	}
	if ($messagecount == 0)
	echo "No messages to display!";
}

//add friend into friends table
function addFriend($id)
{
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	$sql_newfriend = "INSERT INTO friend (User_ID_1, User_ID_2)
	VALUES ('$sessionid', '$id')";
	check_sql($sql_newfriend, $conn);
	
	$sql_newfriend = "INSERT INTO friend (User_ID_1, User_ID_2)
	VALUES ('$id', '$sessionid')";
	check_sql($sql_newfriend, $conn);
}

//list all ids/usernames of friends
function displayFriendSelection()
{
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	//addFriend(14);
	echo '<option>Select Friend...</option>';
	//find all friends
	$query = "SELECT * from friends";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//find friends
		if ($row['User_ID_1'] == $sessionid)
		{
			echo '<option value=" ';
			echo $row['User_ID_2'];
			echo '">';
			echo returnUser($row['User_ID_2']);
			echo '</option>';
		}
	}
}
//addFriend(14);
//send message to friend
if(isset($_POST['send_message'])) {
	session_start();
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	//check if friend is selected
	if ($_POST["tofield"] == 'Select Friend...') 
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
		header("location: index.php");
	}
	header("location: index.php");
}
?>
