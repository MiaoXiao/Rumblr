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
			$From_User = $row['From_User_ID'];
			echo '<br>';
			echo date("M d, Y", strtotime($row['Time_Stamp']));
			echo '<br>';
			echo date("g:i A", strtotime($row['Time_Stamp']));
			echo '<br>';
			echo $row['message'];
			echo '<br>';
			
			$profileInfo= "SELECT * FROM profile WHERE profileID='$row[From_User_ID]'";
					$profileQ = mysql_query($profileInfo);
					//check if this is valid
					if($profileQ)
					{
						if(mysql_num_rows($profileQ) > 0)
						{
								$getProfile = mysql_fetch_assoc($profileQ);
								$username = $getProfile['username'];

						}
					}
			
			if($row['Is_FR'])
			{
				$friend_success = true;
				$query = "SELECT * from friends";
				$result = mysql_query($query);
				while ($row = mysql_fetch_array($result))
				{
					if ($row['User_ID_1'] == $_SESSION['SESS_LOGIN_ID'] && $row['User_ID_2'] == $From_User)
					{
						$friend_success = false;
					}
				}
				if($From_User != $_SESSION['SESS_LOGIN_ID'] && $friend_success == true)
				{
					?>
					<form action="follow.php" method="post">
						<div id = "friends">
							<input type = "hidden" value = "<?php echo $username ?>" name = "friend_enter"/>
							<input type="submit" value = "Friend" name =  "friend_sub"/>
						</div>
					</form>
					<?php
				}
			}
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
		$Friend_Request = false;
	//if success, send message to friend
	if ($formsuccess)
	{
		//sql login
		$sql_newmessage = "INSERT INTO inbox (From_User_ID, To_User_ID, message, Is_FR)
		VALUES ('$sessionid', '$sendto', '$message', '$Friend_Request')";
		check_sql($sql_newmessage, $conn);
		header("location: index.php");
	}
	header("location: index.php");
}

//friend request field
if(isset($_POST['FR_sub'])) {
	$followsuccess = true;
	session_start();
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if ($row['username'] == $_POST['FR_enter'])
		{
			$Temp_ID = $row['profileID'];
		}
	}
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	$sendto = $_POST['FR_sub'];
	$message = "You have recieved a friend request from this user!";
	$Friend_Request = true;
	
	//create new friend link
	if ($followsuccess)
	{
		$err_post = "Friended!";
		
		$sql_newmessage = "INSERT INTO inbox (From_User_ID, To_User_ID, message, Is_FR)
		VALUES ('$sessionid', '$Temp_ID', '$message', '$Friend_Request')";
		check_sql($sql_newmessage, $conn);
		//header("location: index.php");
	}
	header("Location:index.php");
}
?>
