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
function multiexplode2 ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function return_ProfileInfo($info)
{
	//echo $_SESSION['SESS_USERNAME'];
	$query = "SELECT * from profile";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		//echo $_SESSION['SESS_LOGIN_ID'];
		if ($row['profileID'] == $_SESSION['SESS_LOGIN_ID'])
		{
			return $row[$info];
		}
	}
}

$newpicture = $newnickname = $newinterests = $newblogdesc = $newprivacy = $exploded2 = "";

//text field
if(isset($_POST['update_profile'])) {
	
	session_start();
	$sessionid = $_SESSION['SESS_LOGIN_ID'];
	
	if (empty($_POST["picture_update"])) $newpicture = return_ProfileInfo('photo');
	else $newpicture = test_input($_POST["picture_update"]);
	if (empty($_POST["nickname_update"])) $newnickname = return_ProfileInfo('nickname');
	else $newnickname = test_input($_POST["nickname_update"]);
	if (empty($_POST["interests_update"])) $newinterest = return_ProfileInfo('interests');
	else      //START ALGORITHM FOR THE RECOMMENDATION
	{ 
		$prevPost = "";
		$newinterests = test_input($_POST["interests_update"]);
		$tag_list = $newinterests;
		$exploded2 = multiexplode2(Array(",",".","|",":"," "),$tag_list);
		$query = "SELECT * FROM tags ORDER BY Tag_ID desc"; //You don't need a ; like you do in SQL
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result))
		{   //Creates a loop to loop through results

			foreach ($exploded2 as $tag_element)
			{
				if($tag_element != NULL)
				{
					//select from the posts list whatever has that key word and add a new 
					//tag onto that post called recommendation. Apply this to all posts
					$alreadyExists = "SELECT * FROM recommendations WHERE Post_ID=$row[Post_ID]";
					$result3 = mysql_query($alreadyExists);
					if (mysql_num_rows($result3) > 0) 
					{
						echo "NOT INSERTED: " . $result3['Post_ID'];
					}
					else
					{
						if($row['Tag_label'] == $tag_element && $row['Post_ID'] != $prevPost)
						{
							$sql_addrec = "INSERT INTO recommendations (User_ID, Post_ID)
							VALUES ($_SESSION[SESS_LOGIN_ID], $row[Post_ID])";
							$prevPost = $row['Post_ID'];
							check_sql($sql_addrec, $conn);
						}
					}
				}
			}
		}
		// $query = "SELECT * from tags";
		// 	$result = mysql_query($query);
		// 	while ($row = mysql_fetch_array($result))
		// 	{
		// 		if ($row['Post_ID'] == $postID)
		// 		{
		// 			echo $row['Tag_label'] . " ";
		// 		}
		// 	}
	}
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
