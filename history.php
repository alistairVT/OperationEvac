<?php
include('/includes/database.inc.php');
	include('/includes/header.inc.php');
?>
<div id="table">
	<table border="1">
		<tr>
			<th>Actions Performed</th>
			<th>Date-Time</th>
		</tr>
		<tr>
			<th>Evacuation Center Deleted</th>
			<th class="movingtime">Date</th>
		</tr>
		<tr>
			<th>Evacuation Center Edited</th>
			<th class="movingtime">Date</th>
		</tr>
		<tr>
			<th>Evacuation Center Added</th>
			<th class="movingtime">Date</th>
		</tr>
		<tr>
			<th>Dummy account deleted</th>
			<th class="movingtime">Date</th>
		</tr>
		<tr>
			<th>julianshimay account created</th>
			<th class="movingtime">Date</th>
		</tr>
	</table>
</div>
<script>
var thList=document.getElementsByTagName("th");
var changeThisList=new Array();
var date=new Date();
for(var ctr=0;ctr<thList.length;ctr++){
	if(thList[ctr].getAttribute('class')!=undefined && thList[ctr].getAttribute('class')=='movingtime')
		changeThisList[changeThisList.length]=thList[ctr];
}

(function changeTime(){
	setInterval(changeTime, 1000);
	for(var ctr2=0;ctr2<changeThisList.length;ctr2++){
		changeThisList[ctr2].innerHTML=new Date().getSeconds();
	}
}());
</script>
<?php
	include('/includes/footer.inc.php');
?>