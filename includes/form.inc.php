

	<form action="" method="post" id="formbox">
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;padding-left:10px">
		<b><?php echo $formTitle; ?></b>
		</div>
		
		<b>First Name</b></br>
		<input class="logininput" type="text" placeholder="First Name" id = "fname" name="firstname" maxlength="75" autofocus/><br/>
		<b>Last Name</b></br>
		<input class="logininput" type="text" placeholder="Last Name" id = "lname" name="lastname" maxlength="75"/><br/>
		<b>Address</b></br>
		<input class="logininput" type="text" placeholder="Address" id = "add" name="add" maxlength="150"/><br/>
		<b>E-mail</b></br>
		<input class="logininput" type="text" placeholder="E-mail" id = "email" name="email" maxlength="150"/><br/>
		<b>Telephone Number</b></br>
		<input class="logininput" type="text" placeholder="Telephone Number" id = "telno" name="telno" maxlength="75"/><br/>
		<b>Mobile Number</b></br>
		<input class="logininput" type="text" placeholder="Mobile Number" id = "mobino" name="mobino" maxlength="75"/><br/>
		<b>Username</b></br>
		<input class="logininput" type="text" placeholder="Username" id="username" name="username" maxlength="75" /><br/>
		<b>Password</b></br>
		<input class="logininput" type="password" placeholder="Password" id = "pass" name="password" maxlength="75"/><br/>
		<b>Retype Password</b></br>
		<input class="logininput" type="password" placeholder="Retype Password" id = "pass2" name="password2" maxlength="75"/><br/>
		
		<input id="submit" class="button" type="submit" value="<?php echo $submitText; ?>" onclick= "check()" />
	</form>
	
	
		