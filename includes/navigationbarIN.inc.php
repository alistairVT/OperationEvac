		
<?php
			$query="SELECT * FROM users where user_id = {$_SESSION['user_id']} and type = 'admin'";
			$result=mysqli_query($dbconn, $query);
				if($result&& mysqli_num_rows($result)){
		   ?>
		   <div id="navigationbar">
	<div id="navigationbuttons">
		<div id="navigationtitle">
		<a href="index.php" style = "color:white">Operation Evac</a>
		
		</div>
		<div id="navigationlinks">
		<a href="profile.php" style="color:white">Profile</a>
		  <a href="addevac.php" style="color:white">Add Centers</a>
		  <a href="viewcenters.php" style="color:white">View Centers</a>
		  <a href="viewhistory.php" style="color:white">Action History</a>
	  	  <a href="account.php" style="color:white">Users</a>
	  	  <a href="logout.php">Logout</a> 
		</div>
		</div>
	</div>
</div>
	
		<?php
			}
			else
			{
		?>
<div id="navigationbar">
	<div id="navigationbuttons">
		<div id="navigationtitle">
		<a href="index.php" style = "color:white">Operation Evac</a>
		
		</div>
		<div id="navigationlinks">
		<a href="profile.php" style="color:white">Profile</a>
		  <a href="addevac.php" style="color:white">Add Centers</a>
		  <a href="viewcenters.php" style="color:white">View Centers</a>
		  <a href="viewhistory.php" style="color:white">Action History</a>
	  
	  	  <a href="logout.php">Logout</a> 
		</div>
		</div>
	</div>
</div>
		<?php
			}
		?>