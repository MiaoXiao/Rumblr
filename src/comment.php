<!DOCTYPE html>
<html>
<head>
<style>

	#commentPic
	{
		position:relative;
		height: 25px;
	    width: 25px;
		max-width: 100%;
	   	max-height: 100%;
		padding:0.5%;
		text-align:left;
		float:left;

	}

	#commentPosted 
	{ 
		border-bottom: 1px dotted #999999; 
		padding: 10px 0; 
	}

	#userinfo 
	{
		position:relative;
		text-align:left;
		font-size: 12px;
	}

	#commentContent
	{
		margin-left: 1cm;
		word-wrap: break-word;
		font-size: 12px;
		margin-right: 1cm;
	}
/*	#following {
		position:relative;
		text-align:right;
	}

	#postInfo{
		margin-left: 1cm;
		word-wrap: break-word;
		margin-right: 1cm;
		margin-bottom: 0.3cm;
	}

	#commenting{
		word-wrap: break-word;
		margin-bottom: 0.3cm;*/
	}

</style>
</head>
<body>

<?php
session_write_close();
session_start();

//main error message
$commenttext = $errPost = $posterID = "";

require_once('connect.php');

//follow field
// if(isset($_POST['comment_sub'])) {
// 	$followsuccess = true;
	
// 	$query = "SELECT * from profile";
// 	$result = mysql_query($query);
// 	while ($row = mysql_fetch_array($result))
// 	{
// 		if ($row['username'] == $_POST['follow_enter'])
// 		{
// 			$Temp_ID = $row['profileID'];
// 		}
// 	}
	
// 	//create new follow link
// 	if ($followsuccess)
// 	{
// 		$err_post = "Followed!";
		
// 		//sql following
// 		$sql_addfollower = "INSERT INTO following (User_ID, Followed_ID)
// 		VALUES ($_SESSION[SESS_LOGIN_ID], $Temp_ID)";
		
// 		check_sql($sql_addfollower, $conn);
// 	}
// 	header("Location:index.php");
// }

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        315360000 => 'year',
        25920000 => 'month',
        6048000 => 'week',
        864000 => 'day',
        36000 => 'hour',
        600 => 'minute',
        10 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
}

function postingComments($user_name, $comment_to_print, $commentTime, $posterID, $usererID) 
{
	?>
	<div id="commentPosted">
		<div id="userinfo">
			<img id="commentPic" src ="<?php get_ProfileInfo('photo', $usererID);?>"/>
			<!-- <strong><a href="hide(3)" > <?php //echo $user_name; ?> </a>  <?php// echo " " . humanTiming($commentTime). ' ago'; ?></strong> -->
			<strong><a onclick = <?php
					if ($_SESSION['SESS_LOGIN_ID']  == $usererID) echo "hide(3)";
					else
					{
						$_SESSION['PID'] = $usererID;
						echo "hide(5)";
					}
					?> > <?php echo $user_name; ?> </a><?php /*echo " " . humanTiming($commentTime). ' ago'; */?></strong>
		</div>

		<div id="commentContent">
			<?php echo $comment_to_print; ?> 
		</div>

	</div>
	<?php
}


if(isset($_POST['id_enter'])) 
{
	$post_id=$_POST['id_enter'];
}

//text field
if(isset($_POST['comment_sub'])) {
	$commentsuccess = true;
	
	if (empty($_POST["comment_enter"])) {
		$err_post += "Enter something! <br>";
		$commentsuccess = false;
	} else {
		$commenttext = test_input($_POST["comment_enter"]);
	}
	
	//create new login and profile if form success
	if ($commentsuccess)
	{
		//echo "Text created!";
		$err_post = "Submitted!";
		
		//sql login
		$sql_addpost = "INSERT INTO comments (Post_ID, User_ID, Comment)
		VALUES ($post_id, $_SESSION[SESS_LOGIN_ID], '$commenttext')";
		
		check_sql($sql_addpost, $conn);
		header("Location:index.php");
	}
}
// if(isset($_POST['text_sub'])) {
// 	$postsuccess = true;
	
// 	if (empty($_POST["text_enter"])) {
// 		$err_post += "Enter something! <br>";
// 		$postsuccess = false;
// 	} else {
// 		$text = test_input($_POST["text_enter"]);
// 	}
	
// 	//create new login and profile if form success
// 	if ($postsuccess)
// 	{
// 		//echo "Text created!";
// 		$err_post = "Submitted!";
		
// 		//sql login
// 		$sql_addpost = "INSERT INTO posts (postID, type, info)
// 		VALUES ($_SESSION[SESS_LOGIN_ID], 'text', '$text')";
		
// 		check_sql($sql_addpost, $conn);
// 		header("Location:index.php");
// 	}
// }

?>

</body>
</html>
