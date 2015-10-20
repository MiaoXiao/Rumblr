<!DOCTYPE html>
<html>
<body style="background-color:DarkCyan">
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="handling.js"></script>
		<?php include 'connect.php';?>
		<?php include 'createacc.php';?>
	</head>
	<div id = "header">
		<header id = "title">
			<h1 onclick = "createPost()" >UCRumbler</h1>
		</header>
		<div id = "navi">
			<div class = "topSelect">
				<a href="http://www.w3schools.com"> Front Page </a>
			</div>
			<div class = "topSelect">
				<a href="http://www.w3schools.com"> Profile </a>
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
	
	<div id = "Body">
		<div id = "postBar">
			<a>Text</a><br>
			<a>Photo </a><br>
			<a>Quote </a><br>
			<a>Link</a><br>
			<a>Chat </a><br>
			<a>Audio </a><br>
			<a>Video </a><br>
			<a> Welcome, User. </a><br>
			<a onclick = "logout()" >Sign out?</a>
		</div>

		<div id = "posts">
		</div>
		
		<div id = "login">
			<form>
				Username:<br>
				<input type="text" id = "userIn" name = "login"/>
				<br>
				Password: <br>
				<input type="password" id = "passIn" name = "password"/>
				<br> <br>
				<input type ="button" onclick = "loginButton()" Value = "Login"/>
				<input type ="button" onclick = "createAcc()" Value = "Create Account"/>
			</form>
		</div>
	
		<div id = "createAcc">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				Create Username: <br>
				<span class="error"> <?php echo $err_username;?></span>
				<input type="text" id = "usernameAcc" name = "username_enter"/>
				<br>
				Create Login: <br>
				<span class="error"> <?php echo $err_login;?></span>
				<input type="text" id = "loginAcc" name = "login_enter"/>
				<br>
				Create Password: <br>
				<span class="error"> <?php echo $err_password;?></span>
				<input type="password" id = "passAcc" name = "password_enter"/> <br>
				Verify Password: <br>
				<span class="error"> <?php echo $err_vpassword;?></span>
				<input type="password" id = "passverifyAcc" name = "passwordverify_enter"/>
				<br> <br>
				<input type ="submit" onclick = "verifyAcc()" name = "createacc" Value = "Create"/>
				<input type ="button" onclick = "logout()" Value = "Cancel"/>
			</form>
		</div>
	
	</div>
	<div id = "Footer"> 
		<footer>
			HUEHUEHUEHUHEHUEHUE
		</footer>
	</div>
</body>
</html>
