
<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/header.inc.php');
	include('/includes/functions.inc.php');
if(isset($_SESSION ['user_id']))
{

?>

<div id = "VAHcontainer">
<?php
$query = "SELECT updatetype, CONCAT(firstname, ' ', lastname) AS fullname, DATE_FORMAT(date, '%M %e, %Y @ %l:%i %p') AS date from updates INNER JOIN users USING(user_id) order by idupdates DESC";
$result = mysqli_query($dbconn, $query);
if($result)

{
	if(mysqli_num_rows($result))
	{
		while($data = mysqli_fetch_array($result))
		{
			echo '<div style="padding:10px;border-bottom:1px solid #fff;">';
			switch($data['updatetype']){
				case 'add': echo "{$data['fullname']} added a new evacuation center."; break;
			}
			echo "<br/><i style=\"font-size:12px;\">{$data['date']}</i>";
			echo '</div>';
		}
	}
}
?>
</div>

<?php

	include('/includes/footer.inc.php');
}

else redirectuser('loginpage.php');
?>

