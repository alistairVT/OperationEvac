<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/header.inc.php');
?>
<div class="messageheader">
	List Of User Accounts
	</div>

<?php
	
	$query="SELECT * FROM users where user_id != {$_SESSION['user_id']} ORDER BY type, lastname ";
	$result=mysqli_query($dbconn, $query);
	if($result){
		if(mysqli_num_rows($result)){
			echo '<table id="centerlist">';
			echo '<tr><td><b>Name</b></td><td><b>Username</b></td><td><b>Email</b></td><td>Confirm</td><td>Delete</td></tr>';
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo '<tr>';

				#fullname
				echo '<td width 100px>'.$row['lastname'].', '.$row['firstname'].'</td>';

				#username
				echo '<td>'.$row['username'].'</td>';

				#email
				echo '<td>'.$row['email'].'</td>';

				#confirm or do nothing
				if($row['type'] == 'pending')
					echo '<td><a href="confirmuser.php?userid='.$row['user_id'].'">Confirm</a></td>';
				else echo '<td>Confirmed</td>'; 

				#delete user
				echo '<td><a href="deleteuser.php?userid='.$row['user_id'].'">Delete</a></td>';
				echo '</tr>';
			}
			echo '</table>';
		}
	}

	include('/includes/footer.inc.php');
?>