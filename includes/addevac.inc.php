<?php
	include('/includes/header.inc.php');
?>
<div id="addevacform" >
	<div id="registermessage">
		<div class="messageheader">
	Add Evacuation Center
	</div>
	</div>
	<form action="" method="post" id="formbox">
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;">
		<b>Add Evacuation Center</b>
		</div>
		
		<b>Name of Evacuation Center</b></br>
		<input class="logininput" type="text" placeholder="Evac Name" name="evacname" maxlength="75"/><br/>
		<b><u>Address: <br/></u></b>
		<b>No, Street</b></br>
		<input class="logininput" type="text" placeholder="No. Street" name="numstreet" maxlength="75"/><br/>
		<b>Barangay</b></br>
		<input class="logininput" type="text" placeholder="Barangay" name="brgy" maxlength="150"/><br/>
		<b>City</b></br>
		<input class="logininput" type="text" placeholder="City" name="city" maxlength="150"/><br/>
		<b>Province</b></br>
		<input class="logininput" type="text" placeholder="Province" name="province" maxlength="75"/><br/>
		
		<input id="submit" class="button" type="submit" value="Add Evacuation Center" onclick = "check()"/>
	</form>
<input id="editEC" class="button" type="submit" value="Edit Evacuation Center" onclick = "?" />
<input id="deleteEC" class="button" type="submit" value="Delete Evacuation Center" onclick = "?"/>
<script type="text/javascript">

	function check(){

		var evacname = document.forms["formbox"]["evacname"].value;
		var numstreet = document.forms["formbox"]["numstreet"].value;
		var brgy = document.forms["formbox"]["brgy"].value;
		var city = document.forms["formbox"]["city"].value;
		var province = document.forms["formbox"]["province"].value;
		var errorbox=document.getElementById("errormessage");

		var error = "";

		if(evacname == null || evacname == "")
		{
			error += "Enter name of evacuation center<br/>";
		}
		if(numstreet == null || numstreet == "")
		{
			error += "Enter No. street<br/>";
		}
		if(brgy == null || brgy == "")
		{
			error += "Enter Barangay <br/>";
		}
		if(city == null || city == "")
		{
			error += "Enter city <br/>";
		}
		if(province == null || province == "")
		{
			error += "Enter province<br/>";
		}

<?php
	include('/includes/footer.inc.php');
?>