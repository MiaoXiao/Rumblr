<?php
require_once('connect.php');

function get_ProfileInfo($info, $ID)
{
	//echo $_SESSION['SESS_USERNAME'];
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//echo $_SESSION['SESS_LOGIN_ID'];
		if ($row['profileID'] == $ID)
		{
			echo $row[$info];
		}
	}
}

function return_ProfileInfo($info, $ID)
{
	//echo $_SESSION['SESS_USERNAME'];
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//echo $_SESSION['SESS_LOGIN_ID'];
		if ($row['profileID'] == $ID)
		{
			return $row[$info];
		}
	}
}



$newpicture = $newnickname = $newinterests = $newblogdesc = $newprivacy = "";

//text field
if(isset($_POST['update_profile'])) {
	
	session_start();
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	
	if (empty($_POST["picture_update"])) $newpicture = return_ProfileInfo('photo');
	else $newpicture = test_input($_POST["picture_update"]);
	if (empty($_POST["nickname_update"])) $newnickname = return_ProfileInfo('nickname');
	else $newnickname = test_input($_POST["nickname_update"]);
	if (empty($_POST["interests_update"])) $newinterest = return_ProfileInfo('interests');
	else $newinterests = test_input($_POST["interests_update"]);
	if (empty($_POST["blogdes_update"])) $newblogdesc = return_ProfileInfo('blogdesc');
	else $newblogdesc = test_input($_POST["blogdes_update"]);
	if ($_POST["privacy_update"] == "Select") $newprivacy = return_ProfileInfo('privacy');
	else $newprivacy = test_input($_POST["privacy_update"]);
	//$sessionid = $_SESSION['SESS_LOGIN_ID'];
	//sql update profile
	$sql_addpost = "UPDATE profile SET nickname = '$newnickname', photo = '$newpicture', interests = '$newinterests', privacy = '$newprivacy', blogdesc = '$newblogdesc' WHERE profileID =  '$sessionid' ";
	
	echo $sql_addpost;
	
	check_sql($sql_addpost, $conn);
	header("Location:index.php");
	
}

?>
