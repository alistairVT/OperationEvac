<?php

	session_start();
	include('/includes/database.inc.php');
	include('/includes/header.inc.php');
	include('/includes/functions.inc.php');
if(isset($_SESSION ['user_id']))
{
?>
<script type = "text/javascript">
function passchecker()
	{
	 
		var oldpass = document.forms["formbox"]["oldpass"].value;
		var pass = document.forms["formbox"]["pass"].value;
		var pass2 = document.forms["formbox"]["pass2"].value;
		
		var error = false;

		if(oldpass == null || oldpass == "" )
		{
			document.forms["formbox"]["oldpass"].style.borderColor = "red";
			document.forms["formbox"]["oldpass"].style.backgroundColor = "#E799A3";
			error = true;
		}
if(pass == null || pass == "" || pass.length < 6)
		{
			document.forms["formbox"]["pass"].style.borderColor = "red";
			document.forms["formbox"]["pass"].style.backgroundColor = "#E799A3";
			error = true;
		}
	if(pass != pass2)
		{
			document.forms["formbox"]["pass"].style.borderColor = "red";
			document.forms["formbox"]["pass"].style.backgroundColor = "#E799A3";
			document.forms["formbox"]["pass2"].style.borderColor="red";
			document.forms["formbox"]["pass2"].style.backgroundColor="#E799A3";
			error = true;
		}

if(pass2 == null || pass2 == "")
		{
			document.forms["formbox"]["pass2"].style.borderColor = "red";
			document.forms["formbox"]["pass2"].style.backgroundColor = "#E799A3";
			error = true;
		}	
		if(error)
		{
		    errorbox.innerHTML="Error sending form. Edit those in red.";
		    errorbox.style.display="block";
			error="";
			
			event.preventDefault();
			return false;
		}
	}
	window.onload = showNotif;

	function showNotif(){
		if(location.search.indexOf("success=true") > -1)
			alert("PASSWORD CHANGED");
	}

</script>


<form action="changepasschecker.php" method="post" id="formbox">
<b>Old Password</b></br>
		<input class="logininput" type="password" placeholder="Old Password" id = "oldpass" name="oldpass" maxlength="75"/><br/>
	
<b>New Password</b></br>
		<input class="logininput" type="password" placeholder="New Password" id = "pass" name="pass" maxlength="75"/><br/>
		
<b>Retype Password</b></br>
		<input class="logininput" type="password" placeholder="Retype Password" id = "pass2" name="pass2" maxlength="75"/><br/>
		
		<input id="submit" class="button" type="submit" value="Change" onclick = "passchecker()"/>
</form>



<?php

	echo '<div id="errormessage" style="display:none;"></div>';
	include('/includes/footer.inc.php');
}
	else redirectuser('loginpage.php');
?>