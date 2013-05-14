<?php
	session_start();
	include('/includes/functions.inc.php');

	if(isset($_SESSION['user_id'])){ //if logged in
		$page = 'register'; 
		include('/includes/database.inc.php');
		include('/includes/header.inc.php');
		
		$query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
		$result = @mysqli_query($dbconn, $query);
		if($result){
			if(mysqli_num_rows($result)>=1){
				$userInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

			}
		}
		
?>

	<form action="modifyprofilechecker.php" method="post" id="formbox">
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;padding-left:10px">
		<b>Modify Profile</b>
		</div>
		
		<b>First Name</b></br>
		<input class="logininput" type="text" placeholder="First Name" id = "fname" name="firstname" maxlength="75" value="<?php echo $userInfo['firstname']; ?>" autofocus/><br/>
		<b>Last Name</b></br>
		<input class="logininput" type="text" placeholder="Last Name" id = "lname" name="lastname" maxlength="75" value="<?php echo $userInfo['lastname']; ?>"/><br/>
		<b>Address</b></br>
		<input class="logininput" type="text" placeholder="Address" id = "add" name="address" maxlength="150" value="<?php echo $userInfo['address']; ?>"/><br/>
		<b>E-mail</b></br>
		<input class="logininput" type="text" placeholder="E-mail" id = "email" name="email" maxlength="150" value="<?php echo $userInfo['email']; ?>"/><br/>
		<b>Telephone Number</b></br>
		<input class="logininput" type="text" placeholder="Telephone Number" id = "telno" name="telno" maxlength="75" value="<?php echo $userInfo['telno']; ?>"/><br/>
		<b>Mobile Number</b></br>
		<input class="logininput" type="text" placeholder="Mobile Number" id = "mobino" name="mobino" maxlength="75" value="<?php echo $userInfo['mobinum']; ?>"/><br/>
		<b>Username</b></br>
		<input class="logininput" type="text" placeholder="Username" id="username" name="username" maxlength="75"  value="<?php echo $userInfo['username']; ?>"/><br/>
		<b>Password</b></br>
		<a href="changepass.php">Change</a>
		<input id="submit" class="button" type="submit" value="Save" onclick= "check()" />
	</form>
	
<?php
		echo '<div id="errormessage" style="display:none;"></div>';
		include('/includes/footer.inc.php');
	}
	else redirectuser('loginpage.php');
?>
