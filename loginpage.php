<?php
session_start();
include('/includes/database.inc.php');
	include('/includes/header.inc.php');
?>

<div id="loginform" >
	<div id="loginmessage">
	<div class="messageheader">
	Welcome to Operation Evac!
	</div>
	</div>
	<form action="loginchecker.php" method="post" id="formbox">
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;">
		<b>Login</b>
		</div>
		<b>Username</b><br/>
		<input class="logininput" type="text" placeholder="Username" id = "username" name="username" value="<?php
		if(isset($_GET['error']) && !empty($_GET['error'])){
			switch($_GET['error']){
				case 'password': echo (isset($_GET['username'])) ? $_GET['username'] : ''; break;
				case 'nonexist': echo (isset($_GET['username'])) ? $_GET['username'] : ''; break;
			}
		}
		?>" maxlength="75" autofocus/><br/>
		<b>Password</b></br>
		<input class="logininput" type="password" placeholder="Password" id = "password" name="password" maxlength="75"/><br/>

		<input id="submit" class="button" type="submit" value="Log In"/>
		<a href="register.php" id="registerlink">Register</a>
	</form>
	<?php
		if(isset($_GET['error']) && !empty($_GET['error'])){
			$error=$_GET['error'];
			echo '<div id="errormessage" style="width:200px; float:right;">';
			switch($error){
				case 'username': echo 'Please enter a username.'; break;
				case 'password': echo 'Please enter a password.'; break;
				case 'both': echo 'Please enter a username and password.'; break;
				case 'nonexist': echo 'Invalid username or password.'; break;
				case 'accountpending': echo 'User account pending.Await confirmation.'; break;
				default: echo 'An error occurred. Please try again.'; break;
			}

			echo '</div>';
		}
	?>

	
</div>
<?php
	include('/includes/footer.inc.php');
?>
