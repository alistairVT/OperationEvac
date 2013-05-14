<?php
session_start();
include('/includes/database.inc.php');
include('/includes/header.inc.php');
include('/includes/functions.inc.php');
if(isset($_SESSION ['user_id']))
{


?> 
<div class = "login pageheader">
 User Information
 </div>
 <br>
 <a id="editP" class="button" href="modifyprofile.php">Modify Profile</a>
 
<?php

echo 'Username: '.$_SESSION['username'].'<br/>';
echo 'Full Name: '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'<br/>';
echo 'Address: '.$_SESSION['add'].'<br/>';
echo 'Email address: '.$_SESSION['email'].'<br/>';
echo 'Telephone Number: '.$_SESSION['telno'].'<br/>';
echo 'Mobile Number: '.$_SESSION['mobino'].'<br/>';
echo 'User Type: '.$_SESSION['type'].'<br/>';
include('/includes/footer.inc.php');	
}
else redirectuser('loginpage.php');
?>