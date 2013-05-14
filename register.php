<?php
	session_start();
	if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){ //if logged out
		$page = 'register'; 
		include('/includes/database.inc.php');
		include('/includes/header.inc.php');				
?>

<div id="errormessage" style="display:none; min-width:100px; text-align:center;"></div>
<div class="clear"></div><br>

<div id="registerform" ><div id="registermessage"><div class="messageheader">Registration </div> 
	<br>Public users no need to register</br> 
	<br><u>Guidelines for registration:</u>
	<ul type="circle">
		<li>Username should be at least 8 characters long.</li>
		<li>Password should be at least 6 characters long.</li>
		<li>Fill in all necessary fields</li>
	</ul>
	<pre>	* optional</pre>
	<i>After registration, the administrator will confirm your registration. Please wait for a text message within 5 working days for your confirmation message.</i>
	


</div>

	<form action="adduser.php" method="post" id="formbox" onsubmit="JavaScript:return check();">
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;padding-left:10px">
		<b>Register</b>
		</div>
		
		<b>First Name</b></br>
		<input class="logininput" type="text" placeholder="First Name" id = "fname" name="firstname" maxlength="75" autofocus/><br/>
		<b>Last Name</b></br>
		<input class="logininput" type="text" placeholder="Last Name" id = "lname" name="lastname" maxlength="75"/><br/>
		<b>Address</b></br>
		<input class="logininput" type="text" placeholder="Address" id = "add" name="add" maxlength="150"/><br/>
		<b>E-mail</b></br>
		<input class="logininput" type="text" placeholder="E-mail" id = "email" name="email" maxlength="150"/><br/>
		<b>*Telephone Number</b></br>
		<input class="logininput" type="text" placeholder="Telephone Number" id = "telno" name="telno" maxlength="75"/><br/>
		<b>Mobile Number</b></br>
		<input class="logininput" type="text" placeholder="Mobile Number" id = "mobino" name="mobino" maxlength="75"/><br/>
		<b>Username</b></br>
		<input class="logininput" type="text" placeholder="Username" id="username" name="username" maxlength="75" /><br/>
		<b>Password</b></br>
		<input class="logininput" type="password" placeholder="Password" id = "pass" name="password" maxlength="75"/><br/>
		<b>Retype Password</b></br>
		<input class="logininput" type="password" placeholder="Retype Password" id = "pass2" name="password2" maxlength="75"/><br/>
		
		<input id="submit" class="button" type="submit" value="Register"  />
	</form>
	<div class="clear"></div> </div> 
	<script type="text/javascript">

	function check(){

		var username = document.forms["formbox"]["username"].value;
		var pass = document.forms["formbox"]["pass"].value;
		var pass2 = document.forms["formbox"]["pass2"].value;
		var fname = document.forms["formbox"]["fname"].value;
		var lname = document.forms["formbox"]["lname"].value;
		var add = document.forms["formbox"]["add"].value;
		var mobi = document.forms["formbox"]["mobino"].value;
		var email = document.forms["formbox"]["email"].value;
		//var tel = document.forms["formbox"]["telno"].value;
		var errorbox=document.getElementById("errormessage");

		var error = false;

		if(pass != pass2)
		{
			document.forms["formbox"]["pass"].style.borderColor="red";
			document.forms["formbox"]["pass"].style.backgroundColor="#E799A3";
			document.forms["formbox"]["pass2"].style.borderColor="red";
			document.forms["formbox"]["pass2"].style.backgroundColor="#E799A3";
			error = true;
		}
		if(fname == null || fname == "")
		{
			document.forms["formbox"]["fname"].style.borderColor="red";
			document.forms["formbox"]["fname"].style.backgroundColor="#E799A3";
			error = true;
		}
		if(lname == null || lname == "")
		{
			document.forms["formbox"]["lname"].style.borderColor="red";
			document.forms["formbox"]["lname"].style.backgroundColor="#E799A3";
			error = true;
		}
		if(add == null || add == "")
		{
			document.forms["formbox"]["add"].style.borderColor="red";
			document.forms["formbox"]["add"].style.backgroundColor="#E799A3";
			error = true;
		}
		if(mobi == null || mobi == "")
		{
			document.forms["formbox"]["mobino"].style.borderColor="red";
			document.forms["formbox"]["mobino"].style.backgroundColor="#E799A3";
			error = true;
		}
		if(email == null || email == "")
		{
			document.forms["formbox"]["email"].style.borderColor="red";
			document.forms["formbox"]["email"].style.backgroundColor="#E799A3";
			error = true;
		}

		if((username == null || username == "") || (username.length < 8))
		{
			document.forms["formbox"]["username"].style.borderColor="red";
			document.forms["formbox"]["username"].style.backgroundColor="#E799A3";
			error = true;
		}
		if((pass == null || pass == "") || (pass.length < 6))
		{
			document.forms["formbox"]["pass"].style.borderColor="red";
			document.forms["formbox"]["pass"].style.backgroundColor="#E799A3";
			error = true;
		}
		if(pass2 == null || pass2 == "")
		{
			document.forms["formbox"]["pass2"].style.borderColor="red";
			document.forms["formbox"]["pass2"].style.backgroundColor="#E799A3";
			error = true;
		}

		if(email.match(/^.+@.+\.[a-zA-Z]+$/) == null){
			document.forms["formbox"]["email"].style.borderColor="red";
			document.forms["formbox"]["email"].style.backgroundColor="#E799A3";
			error=true;
		}
			

		if(error)
		{
		    errorbox.innerHTML += "Error sending form. Edit those in red.";
		    errorbox.style.display="block";
			error="";
			
			event.preventDefault();
			return false;
		}
		else
			return true;
	}

		window.onload = showNotif;

	function showNotif(){
		if(location.search.indexOf("success=true") > -1)
			alert("Registration successful! Wait for the confirmation text from the administrator after 5 working days!");	
		else if(location.href.indexOf("success=false") > -1) 
			alert("Database error. Enter a different Name and/or Username. If the message appears again, try again later.");	
}

	</script>
<?php
	
		include('/includes/footer.inc.php');
	}
	
?>