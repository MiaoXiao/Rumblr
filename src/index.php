<!DOCTYPE html>
<script src="handling.js"></script>
<?php
	include('login.php');

	if(	isset($_SESSION['SESS_USERNAME']))
	{
		echo "I'm In";
		echo "<script src='handling.'>hide(2);</script>";
		session_destroy();
	}
	else
	{
		echo session_status();
	}
?>
<html>
<body style="background-color:DarkCyan">
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="handling.js"></script>
		<?php //include 'connect.php';?>
		<?php include 'createacc.php';?>
		<?php //include 'login.php';?>
	</head>
	<div id = "header">
		<header id = "title">
			<h1 >UCRumbler</h1>
		</header>
		<div id = "navi">
			<div class = "topSelect">
				<a onclick = "hide(2)"> Front Page </a>
			</div>
			<div class = "topSelect">
				<a onclick = "hide(3)"> Profile </a>
			</div>
			<div class = "topSelect">
				<a href="http://www.w3schools.com"> Inbox </a>
			</div>
			<div class = "topSelect">
				<a href="http://www.w3schools.com"> Settings </a>
			</div>	
		</div>
	</div>
	<br>
	<br>
	<br>
	
	<div id = "Body">
		<div id = "postBar">
			<a onclick = "posts()">Text</a><br>

			<a>Photo </a><br>

			<a onclick = "postQuote()">Quote </a><br>
			
			<a onclick = "postLink()">Link</a><br>

			<a onclick = "postChat()">Chat </a><br>

			<a>Audio </a><br>
			<a>Video </a><br>
			<a onclick = "hide(3)"> Welcome, User. </a><br>
			<a onclick = "logout()" >Sign out?</a>
		</div>




		<div id = "quote">
			<form>
				Create QUOTE post:<br>
				<input type="text" style="font-size:12pt;height:120px;width:200px;">
				<br><br>
				<input type="submit" value = "POST!">

			</form>
		</div>

		<div id = "posts">
			<form>
				Create TEXT post:<br>
				<input type="text" style="font-size:12pt;height:120px;width:200px;">
				<br><br>
				<input type="Submit" value = "POST!">

			</form>
		</div>

		<div id = "link">
			<form>
				Create LINK post:<br>
				<input type = "text" name="type here" size = "50">
				<br><br>
				<input type="Submit" value = "POST!">

			</form>
		</div>

		<div id = "chat">
			<form>
				Create CHAT post:<br>
				<input type="text" style="font-size:12pt;height:220px;width:200px;">
				<br><br>
				<input type="Submit" value = "POST!">

			</form>
		</div>


		
		<div id = "login">
			<form method="post" action="login.php">
				Username:<br>
				<input type="text" id = "userIn" name = "login"/>
				<br>
				Password: <br>
				<input type="password" id = "passIn" name = "password"/>
				<br> <br>
				<input type ="submit" onclick = "hide(2)" Value = "Login" name = "verifiedLogin"/>
				<input type ="button" onclick = "hide(1)" Value = "Create Account"/>
			</form>
		</div>
	
		<div id = "createAcc">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
				First Name: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "fnameAcc" name = "fname_enter"/>
				
				<br>
				Last Name: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "lnameAcc" name = "lname_enter"/>
				<br>
				
				Gender: <br>
				<span class="error"> <?php ?></span>
				<input type="radio" id = "genderAcc" name = "sex"  value="Male"> Male
				<input type="radio" id = "genderAcc" name = "sex"  value="Female"> Female
				<br>
				
				Birthday: <br>
				<span class="error"> <?php ?></span>
				<input type="date" id = "birthdayAcc" name = "birthday_enter"/>
				<br>
				
				Create Username: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "usernameAcc" name = "username_enter"/>
				<br>
				
				Create Login: <br>
				<span class="error"> <?php ?></span>
				<input type="text" id = "loginAcc" name = "login_enter"/>
				<br>
				
				Create Password: <br>
				<span class="error"> <?php ?></span>
				<input type="password" id = "passAcc" name = "password_enter"/> 
				<br>
				
				Verify Password: <br>
				<span class="error"> <?php ?></span>
				<input type="password" id = "passverifyAcc" name = "passwordverify_enter"/>
				<br>
				 
				<br>
				<input type ="submit" onclick = "verifyAcc()" name = "createacc" Value = "Create"/>
				<input type ="button" onclick = "logout()" Value = "Cancel"/>
			</form>
		</div>
		
		<div id = "posts"></div>
		
		<div id="profile">
			<img id="profPic" src ="http://freethoughtblogs.com/lousycanuck/files/2014/05/hqdefault.jpg"/>
			<p>Username:<b>FirstUser</b></p>
			<p>Gender: Questionable</p>
			<p>Created: As of 2 minutes from now</p>
			<p>Date of Birth: before the big Bang</p>
			<P>Interests: Elder gods, the secrets of time, getting an A on this project</P>
			<P>Description: A look into madness itself, with nights not filled with sleep, but code lines of poor syntax</P>
		</div>
	
	</div>
	<div id = "Footer"> 
		<footer>
			HUEHUEHUEHUHEHUEHUE
		</footer>
	</div>
</body>
</html>
