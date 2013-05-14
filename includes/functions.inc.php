<?php
	function redirectuser($page = 'index.php'){
		$url=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$url=rtrim($url, "/\\");
		$url='http://'.$url.'/'.$page;
		Header('Location: '.$url);
		exit();
	}
	function userlogin($userData=array()){
		$_SESSION['user_id']=$userData['user_id'];
		$_SESSION['username']=$userData['username'];
		$_SESSION['firstname']=$userData['firstname'];
		$_SESSION['lastname']=$userData['lastname'];
		$_SESSION['usertype']=$userData['type'];
		$_SESSION['add']=$userData['address'];
		$_SESSION['email']=$userData['email'];
		$_SESSION['telno']=$userData['telno'];
		$_SESSION['mobino']=$userData['mobinum'];
		$_SESSION['type']=$userData['type'];
		redirectuser();
	}

	function escapeString($dbconn, $string){
		$string = mysqli_real_escape_string($dbconn, trim($string));
		return $string;
	}

	
?>