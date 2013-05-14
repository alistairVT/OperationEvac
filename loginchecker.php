<?php
	session_start();
	include('/includes/functions.inc.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
			redirectuser();
		else{
			$errors=array();
			if(isset($_POST['username']) && !empty($_POST['username']))
				$username=$_POST['username'];
			else $errors[]='username';
			if(isset($_POST['password']) && !empty($_POST['password']))
				$password=$_POST['password'];
			else $errors[]='password.';

			if(!empty($errors)){
				if(count($errors)==2)
					redirectuser('loginpage.php?error=both');
				else{
					if($errors[0]=='username')
						redirectuser('loginpage.php?error=username');
					else redirectuser('loginpage.php?error=password&username='.$username);
				}
			}
			else{
				include('/includes/database.inc.php');
				$oldUsername = $username;
				$username = mysqli_real_escape_string($dbconn, trim($username));
				$password = mysqli_real_escape_string($dbconn, trim($password));
				$query = "SELECT * FROM users WHERE username ='$username' AND password=SHA('$password')";
				$result = mysqli_query($dbconn, $query);
					if($result){
						if(mysqli_num_rows($result)){
							$userData=mysqli_fetch_array($result, MYSQLI_ASSOC);
							if($userData['type'] != 'pending')
								userlogin($userData);
							else redirectuser('loginpage.php?error=accountpending&username='.$oldUsername); 
													}	
						else redirectuser('loginpage.php?error=nonexist&username='.$oldUsername);
								}	
					else {
						redirectuser('loginpage.php?error=error'.$query);
						}
				}
			}
	}
	else redirectuser();
?>