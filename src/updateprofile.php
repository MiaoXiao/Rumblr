<?php
require_once('connect.php');

function get_ProfileInfo($info)
{
	//echo $_SESSION['SESS_USERNAME'];
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//echo $_SESSION['SESS_LOGIN_ID'];
		if ($row['profileID'] == $_SESSION['SESS_LOGIN_ID'])
		{
			echo $row[$info];
		}
	}
}

$newpicture = $newnickname = $newinterests = $newblogdesc = "";

//text field
if(isset($_POST['update_profile'])) {
	
	//session_start();
	//session_id();
	$_SESSION['SESS_LOGIN_ID'] = 2;
	//set vaars to preexisting data from table
	if (empty($_POST["picture_update"])) get_ProfileInfo('photo');
	if (empty($_POST["nickname_update"])) get_ProfileInfo('nickname');
	if (empty($_POST["interests_update"])) get_ProfileInfo('interests');
	if (empty($_POST["blogdes_update"])) get_ProfileInfo('blogdesc');
	//set new data
	$newpicture = test_input($_POST["picture_update"]);
	$newnickname = test_input($_POST["nickname_update"]);
	$newinterests = test_input($_POST["interests_update"]);
	$newblogdesc = test_input($_POST["blogdes_update"]);
	
	
	//$sessionid = $_SESSION['SESS_LOGIN_ID'];
	//sql update profile
	$sql_addpost = "UPDATE profile SET nickname = '$newnickname', photo = '$newpicture', interests = '$newinterests', blogdesc = '$newblogdesc' WHERE profileID =  '$sessionid' ";
	
	echo $sql_addpost;
	
	//check_sql($sql_addpost, $conn);
	//header("Location:index.php");
	
}

?>
