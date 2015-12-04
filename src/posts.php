
<!DOCTYPE html>
<html>
<head>
<style>

	#singlepost {
	background-color:LightBlue;
    margin: center;
    width: 80%;
    padding: 10px;
	}

	#profPic2 {
	position:relative;
	height: 64px;
    width: 64px;
	max-width: 100%;
   	max-height: 100%;
	padding:0.5%;
	text-align:left;
	float:left;
	}

	#userinfo {
	position:relative;
	text-align:left;
	}

	#following {
		position:relative;
		text-align:right;
	}

	#tags{
		margin-left: 1cm;
		word-wrap: break-word;
		margin-right: 2cm;
		margin-bottom: 0.3cm;
	}

	#postInfo{
		margin-left: 1cm;
		word-wrap: break-word;
		margin-right: 1cm;
		margin-bottom: 0.3cm;
	}

	#commenting{
		word-wrap: break-word;
		margin-bottom: 0.3cm;
	}

</style>
</head>
<body>
<?php

session_write_close();
session_start();


$text = $photo = $quote = $link = $chat = $audio = $video = "";
$temp_username = "";
//main error message
$err_post = "";

require_once('connect.php');

								//returns true if a label matches the search element
function checkLabels($searchelement, $id)
{
	if ($searchelement == '') return true;
	$query = "SELECT * from tags";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result))
	{
		if ($row['Post_ID'] == $id)
		{
			if ($row['Tag_label'] == $searchelement)
			{
				return true;
			}
		}
	}
	return false;
}

if(isset($_POST['search'])) 
{
	$searchvar = $_POST["search_enter"];
	if (empty($searchvar)) {
		$_SESSION['SEARCHV'] = '';
	} else {
		$_SESSION['SEARCHV'] = test_input($_POST["search_enter"]);
	}
	echo $_SESSION['SEARCHV'];
	header("Location:index.php");
	exit();
}
	//----------------------------------------------------------------------------------------------------//
	//							FUNCTION FOR POSTING ONTO THE MAIN PAGE
	//----------------------------------------------------------------------------------------------------//
	function posting($type_of_post, $toPrint, $username, $privacy, $datePosted, $timePosted, $User_ID, $postID) 
	{
	?>
		<div id="singlepost">
			<?php
			$follow_success = true;
			
			//check to see if the individual is already being followed
			$query = "SELECT * from following";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result))
			{
				if ($row['User_ID'] == $_SESSION['SESS_LOGIN_ID'] && $row['Followed_ID'] == $User_ID)
				{
					$follow_success = false;
				}
			}
			
			//Display the Follow button on post if valid
			if($User_ID != $_SESSION['SESS_LOGIN_ID'] && $follow_success == true)
			{
			?>
			<form action="follow.php" method="post">
				<div id = "following">
					<input type = "hidden" value = "<?php echo $username ?>" name = "follow_enter"/>
					<input type="submit" value = "Follow" name =  "follow_sub"/>
				</div>
			</form>
			<?php
			}
			
			$Repost_success = true;
			if($User_ID != $_SESSION['SESS_LOGIN_ID'] && $Repost_success == true)
			{
			?>
			<form action="repost.php" method="post">
				<div id = "Reposting">
					<input type = "hidden" value = "<?php echo $postID ?>" name = "repost_enter"/>
					<input type="submit" value = "Repost" name =  "repost_sub"/>
				</div>
			</form>
			<?php
			}
			
			//repost check
			$query = "SELECT * from posts";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result))
			{
				if($row['postID'] == $postID)
				{
					$rpost = $row['IsRepost'];
				}
			}
			?>

			
				<div id="userinfo">
					<img id="profPic2" src ="<?php get_ProfileInfo('photo', $User_ID)?>"/>
					<strong><a onclick = <?php
					if ($_SESSION['SESS_LOGIN_ID']  == $User_ID) echo "hide(3)";
					else
					{
						$_SESSION['PID'] = $User_ID;
						echo "hide(5)";
					}
					?> > <?php echo $username; ?> </a> 
					
					<?php
					if($rpost)
					{
						echo "- <b>REPOST</b>";
					}
					?>
					
					<br> <?php echo $datePosted;?><br> <?php echo $timePosted;?></strong>
				</div>

			<div id = "postInfo">
				<?php if($type_of_post == 'photo')
				{ ?>
					<br><strong>PHOTO: </strong><br>
					<td bgcolor='#F8F7F1'><img height = '200px' width = '200px' src ="<?php echo $toPrint; ?>"/></td>
							<?php
				}
				else if ($type_of_post == 'link')
				{
				?>
					<br><strong>LINK: <strong><br>
					<td bgcolor='#F8F7F1'><a href="<?php echo $toPrint;?>"> Link </a></td>
				<?php
				}
				else if ($type_of_post == 'quote')
				{
				?>
					<br><strong>QUOTE: </strong><br>
					<td bgcolor='#F8F7F1'><?php echo " \"" . $toPrint . "\" "; ?></td>
				<?php	
				}
				else if ($type_of_post == 'chat')
				{
				?>
					<strong>CHAT: <br></strong><br>
					<?php echo " \"" . $toPrint . "\" "; ?>
				<?php	
				}
				else if ($type_of_post == 'audio')
				{
				?>
					<br><strong>AUDIO: </strong><br>
					<audio controls>
					  <source src="<?php echo $toPrint;?>" type="audio/ogg">
					  <source src="<?php echo $toPrint;?>" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				<?php	
				}
				else if ($type_of_post == 'video')
				{
				?>
					<br><strong>VIDEO: </strong><br>
					<iframe width="420" height="315"
					src="<?php echo $toPrint; ?>">
					</iframe>
				<?php	
				}
				else
				{
				?>

					<br><strong>TEXT: </strong><br>
					<?php echo $toPrint; ?> 
				<?php
				}
				?>
				<br><br>

				TAGS:
				<div id = "tags">

					<?php
					//SHOW TOP 3 MOST RECENT COMMENTS

					//check to see if the individual is already being followed
					$query = "SELECT * from tags";
					$result = mysql_query($query);
					while ($row = mysql_fetch_array($result))
					{
						if ($row['Post_ID'] == $postID)
						{
							echo $row['Tag_label'] . " ";
						}
					}				

					?>

				</div>

				<?php

					$query2 = "SELECT * FROM comments ORDER BY Timestamp DESC"; //You don't need a ; like you do in SQL
					$result2 = mysql_query($query2);
					$comments_counter = 0;

					while(($row2 = mysql_fetch_array($result2)) &&  $comments_counter < 3)
					{   //Creates a loop to loop through results

						$profileInfo2= "SELECT * FROM profile WHERE profileID='$row2[User_ID]'";
						$profileQ2 = mysql_query($profileInfo2);
						//check if this is valid
						if($profileQ2)
						{
							if(mysql_num_rows($profileQ2) > 0)
							{
								if($row2['Post_ID'] == $postID)
								{
									$getProfile2 = mysql_fetch_assoc($profileQ2);
									$printComment = $row2['Comment'];
									$usererID = $row2['User_ID'];
									$postTime2 = strtotime($row2['Timestamp']);
									$username2 = $getProfile2['username'];
									//$date2 = date('m-d-Y', $postTime2);
									//$time2 = date('h:i:s:a', $postTime2);
									postingComments($username2, $printComment, $postTime2, $postID, $usererID);
									$comments_counter = $comments_counter + 1;
								}
							}
						}
					}				

				?>
				<br>
				<form action="comment.php" method="post">
					<div id = "commenting">
						<textarea rows="2" cols="50" name = "comment_enter"/></textarea> <br>
						<input type = "hidden" value = "<?php echo $postID ?>" name = "id_enter"/>
						<input type="submit" value = "Comment" name =  "comment_sub"/>
					</div>
				</form>

			</div>
		</div>
		</tr>
		</table></td>
		</tr>
		</table><br>
		
				<?php
	}

//tag parser
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function notifiy_friends($conn2)
{
	$query1 = "SELECT * from profile";
	$result1 = mysql_query($query1);
	while ($row = mysql_fetch_array($result1))
	{
		if ($row['profileID'] == $_SESSION['SESS_LOGIN_ID'])
		{
			$Temp_ID = $row['profileID'];
		}
	}
	$query2 = "SELECT * from friends";
	$result2 = mysql_query($query2);
	while ($row = mysql_fetch_array($result2))
	{
		if ($row['User_ID_1'] == $Temp_ID)
		{
			$Temp_ID_2 = $row['User_ID_2'];
			$followsuccess = true;
			$message = "Your friend has made a post!";
			$Friend_Request = false;
			
			//create new friend link
			if ($followsuccess)
			{
				$err_post = "Friended!";
				
				$sql_newmessage = "INSERT INTO inbox (From_User_ID, To_User_ID, message, Is_FR)
				VALUES ('$Temp_ID', '$Temp_ID_2', '$message', '$Friend_Request')";
				check_sql($sql_newmessage, $conn2);
				//header("location: index.php");
			}
			header("Location:index.php");
		}
	}
	
	
}
//text field
if(isset($_POST['text_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["text_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$text = test_input($_POST["text_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		//echo "Text created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'text', '$text')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_text'])) 
		{
			$tag_list = test_input($_POST["tags_text"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

//photo field
if(isset($_POST['pic_sub'])) {
	$postsuccess = true;
	if (empty($_POST["pic_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$photo = test_input($_POST["pic_enter"]);
	}
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		//echo "Photo created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'photo', '$photo')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_photo'])) 
		{
			$tag_list = test_input($_POST["tags_photo"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

//quote field
if(isset($_POST['quote_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["quote_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$quote = test_input($_POST["quote_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'quote', '$quote')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_quote'])) 
		{
			$tag_list = test_input($_POST["tags_quote"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

//link field
if(isset($_POST['link_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["link_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$link = test_input($_POST["link_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'link', '$link')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_link'])) 
		{
			$tag_list = test_input($_POST["tags_link"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

//chat field
if(isset($_POST['chat_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["chat_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$chat = test_input($_POST["chat_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'chat', '$chat')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_chat'])) 
		{
			$tag_list = test_input($_POST["tags_chat"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

//audio field
if(isset($_POST['audio_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["audio_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$audio = test_input($_POST["audio_enter"]);
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		echo"I'm being posted";
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'audio', '$audio')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_audio'])) 
		{
			$tag_list = test_input($_POST["tags_audio"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

//video field
if(isset($_POST['vid_sub'])) {
	$postsuccess = true;
	
	if (empty($_POST["vid_enter"])) {
		$err_post += "Enter something! <br>";
		$postsuccess = false;
	} else {
		$video = test_input($_POST["vid_enter"]);
		$equal = "=";
		
		$position = stripos($video,$equal);
		
		if($position){
			$offset = $position + 1;
			$Parse = substr($video,$offset,$offset);
		}
		else{
			$err_post = "Incorrect video link!<br>";
			//$postsuccess = false;
		}
		$total="http://www.youtube.com/embed/".$Parse;
	}
	
	//create new login and profile if form success
	if ($postsuccess)
	{
		notifiy_friends($conn);
		//echo "Link created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO posts (User_ID, type, info)
		VALUES ($_SESSION[SESS_LOGIN_ID], 'video', '$total')";
		
		check_sql($sql_addpost, $conn);

		$last_post = $conn->insert_id;

		//check for tags------------------------------------------------------
		if(isset($_POST['tags_video'])) 
		{
			$tag_list = test_input($_POST["tags_video"]);
			$exploded = multiexplode(Array(","," "),$tag_list);

			foreach ($exploded as $tag_element)
			{
				if($tag_element != NULL)
				{
					$sql_addpost2 = "INSERT INTO tags (Post_ID, Tag_label)
							VALUES ($last_post, '$tag_element')";

					check_sql($sql_addpost2, $conn);
				}
			}		
		}
		header("Location:index.php");
	}
}

?>

</body>
</html>
